<?php
//Controller điều khiển phần product trong admin
class AdminProductController
{

    

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
        (new Product) -> create($data);

        $_SESSION['message'] = "Thêm dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }

        //Hiển thị form cập nhật
    public function edit()
    {
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        $categories = (new Category)->all();
        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
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
