<?php


class DashboardController {

    public function __construct()
    {   
        $user = $_SESSION['user'] ?? [];
        if (!$user || $user['role'] != 'admin') {
            return header("location: " . ROOT_URL_);
        }
    }

    public function index() 
    {
        return view('admin.dashboard');
    }
    
}