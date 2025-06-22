<?php
//Controller điều khiển phần product trong admin
require_once __DIR__ . '/../../env.php';


class AdminProductController
{

    // public function __construct()
    // {   
    //     $user = $_SESSION['user'] ?? [];
    //     if (!$user || $user['role'] != 'admin') {
    //         return header("location: " . ROOT_URL_);
    //     }
    // }
    public function __construct()
{   
    $user = $_SESSION['user'] ?? [];
    if (!$user || $user['role'] != 'admin') {
        header("Location: " . ROOT_URL_);
        exit; // Dừng chương trình ngay lập tức
    }
}


    public function index()
    {
        $products = (new Product)->all();
        

        return view('admin.products.list', compact('products'));
    }

        //Hàm hiển thị form thêm
    public function create()
    {
        $categories = (new Category)->all();
        return view('admin.products.add', compact('categories'));
    }

        //Hàm thêm dữ liệu vào database
    public function store()
{
    $data = $_POST;

    $image = "";

    // Kiểm tra nếu người dùng đã upload file
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file = $_FILES['image'];
        $image = "images/" . $file['name'];
        move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
    }

    $data['image'] = $image;

    (new Product)->create($data);

    $_SESSION['message'] = "Thêm dữ liệu thành công";
    header("location: " . ADMIN_URL . "?ctl=listsp");
    die;
}


    // Hiển thị form cập nhật

    public function edit()
    {
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        $categories = (new Category)->all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update()
{
    $data = $_POST;

    $product = new Product;
    $item = $product->find($data['id']);

    $image = $item['image']; // Giữ ảnh cũ

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file = $_FILES['image'];
        $image = "images/" . $file['name'];
        move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
    }

    $data['image'] = $image;

    $product->update($data['id'], $data);
    header("location: " . ADMIN_URL . "?ctl=editsp&id=" . $data['id']);
    die;
}


    //Xóa sản phẩm
    public function delete()
    {
        $id = $_GET['id'];
        (new Product)->delete($id);

        $_SESSION['message'] = "Xóa dữ liệu thành công";
        //chuyển trang về list
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }
}
