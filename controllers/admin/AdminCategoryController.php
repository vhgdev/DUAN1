
<?php
require_once __DIR__ . '/../../env.php';

class AdminCategoryController
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
        //Lấy session thông báo
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']); //xóa session
        $categories = (new Category)->all();
        return view('admin.categories.list', compact('categories', 'message'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function store()
    {
        $data = $_POST;

        // Lưu dữ liệu vào bảng Category
        (new Category)->create($data);

        $_SESSION['message'] = "Thêm dữ liệu thành công";

        header('location: ' . ADMIN_URL . '?ctl=listdm');
        die;
    }

    public function edit()
    {
        $id = $_GET['id'];

        // Lấy thông tin danh mục theo ID
        $category = (new Category)->find($id);

        //Lấy session thông báo
        $message = $_SESSION['message'] ?? '';

        unset($_SESSION['message']); // Xóa session

        return view('admin.categories.edit', compact('category', 'message'));
    }
    public function update()
    {
        $data = $_POST;

        // Cập nhật dữ liệu trong CSDL
        (new Category)->update($data['id'], $data);

        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header('location: ' . ADMIN_URL . '?ctl=editdm&id=' . $data['id']);
        die;
    }
    public function delete()
    {
        $id = $_GET['id'];

        // Xóa bản ghi trong bảng Categories
        (new Category)->delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listdm");
        die;
    }
}