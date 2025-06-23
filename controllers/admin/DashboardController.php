<?php
require_once __DIR__ . '/../../env.php';


class DashboardController {

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
        return view('admin.dashboard');
    }
    
}