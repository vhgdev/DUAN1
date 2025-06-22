<?php

class OrderController
{
    // Danh sách đơn hàng cho admin
    public function index()
    {
        $orders = (new Order)->all();
        return view("admin.orders.list", compact('orders'));
    }

    // Chi tiết đơn hàng cho admin
    public function showOrder()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'];
            (new Order)->updateStatus($id, $status);
        }

        // Đảm bảo các biến luôn được gán
        $order = (new Order)->find($id);
        $order_details = (new Order)->listOrderDetail($id);
        $status = (new Order)->status_details;

        return view("admin.orders.detail", compact('order', 'order_details', 'status'));
    }

    // Hiển thị danh sách đơn hàng của user
    public function showOrderUser()
    {
        $user_id = $_SESSION['user']['id'];
        $orders = (new Order)->findOrderUser($user_id);
        $user = $_SESSION['user'];
        $categories = (new Category)->all();

        return view("clients.users.list-order", compact('orders', 'categories', 'user'));
    }

    // Chi tiết đơn hàng của user
    public function detailOrderUser()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new Order)->updateStatus($id, 4);
        }

        // Luôn luôn gán biến cho view
        $order = (new Order)->find($id);
        $order_details = (new Order)->listOrderDetail($id);
        $status = (new Order)->status_details;
        $categories = (new Category)->all();

        return view("clients.users.detail-order", compact('order', 'order_details', 'status', 'categories'));
    }
}
