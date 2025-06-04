

<?php

class AdminCategoryController
{

    // public function __construct()
    // {   
    //     $user = $_SESSION['user'] ?? [];
    //     if (!$user || $user['role'] != 'admin') {
    //         return header("location: " . ROOT_URL_);
    //     }
    // }
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
        (new Category)->create($data);
        $_SESSION['message'] = "Thêm dữ liệu thành công";
        header('location: ' . ADMIN_URL . '?ctl=listdm');
        die;
    }

    public function edit()
    {
        $id = $_GET['id'];
        $category = (new Category)->find($id);
        //Lấy session thông báo
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']); //xóa session
        return view('admin.categories.edit', compact('category', 'message'));
    }
    public function update()
    {
        $data = $_POST;
        (new Category)->update($data['id'], $data);

        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header('location: ' . ADMIN_URL . '?ctl=editdm&id=' . $data['id']);
        die;
    }
    public function delete()
    {
        $id = $_GET['id'];
        (new Category)->delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listdm");
        die;
    }
}