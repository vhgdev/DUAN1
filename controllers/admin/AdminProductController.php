<?php
//Controller điều khiển phần product trong admin
require_once __DIR__ . '/../../env.php';


class AdminProductController
{

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

    // Hàm hiển thị form thêm/
    public function create()
    {
        $categories = (new Category)->all();

        return view('admin.products.add', compact('categories'));
    }

    // Hàm thêm dữ liệu vào database
    public function store()
    {
        $data = $_POST;

        //Nếu người dùng không nhập ảnh
        $image = "";
         
        //Nếu người dùng nhập ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            //upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        $data['image'] = $image;

        // Lưu vào CSDL 
        (new Product)->create($data);

        $_SESSION['message'] = "Thêm dữ liệu thành công";

        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }


    // Hiển thị form cập nhật

    public function edit()
    {
        $id = $_GET['id'];

        // Lấy thông tin sản phẩm theo id
        $product = (new Product)->find($id);
        // Lấy danh sách danh mục
        $categories = (new Category)->all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update()
    {   
        // Lấy thông tin từ form
        $data = $_POST;

        //Lấy thông tin sản phẩm cũ
        $product = new Product;

        // Lấy thông tin sản phẩm cũ
        $item = $product->find($data['id']);

        //Nếu người dùng không nhập ảnh thì lấy lại ảnh cũ
        $image = $item['image'];

        // Nếu người dùng nhập ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            //upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        $data['image'] = $image;

        //Update
        $product->update($data['id'], $data);

        //di chuyển về lại trang edit
        header("location: " . ADMIN_URL . "?ctl=editsp&id=" . $data['id']);
        die;
    }


    //Xóa sản phẩm
    public function delete()
    {   
        // Lấy ID sản phẩm
        $id = $_GET['id'];

        (new Product)->delete($id);

        // Lưu thông tin session
        $_SESSION['message'] = "Xóa dữ liệu thành công";

        // Chuyển trang về list
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }
}
