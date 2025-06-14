<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function changePassword() {
        session_start();
        $error = '';
        $success = '';

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $userModel = new User();
            $userId = $_SESSION['user_id'];
            $user = $userModel->find($userId);

            if (!$user) {
                $error = "Người dùng không tồn tại.";
            } elseif (!password_verify($currentPassword, $user['password'])) {
                $error = "Mật khẩu hiện tại không đúng.";
            } elseif ($newPassword !== $confirmPassword) {
                $error = "Mật khẩu mới không khớp.";
            } else {
                $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
                $userModel->updatePassword($userId, $hashed);
                $success = "Đổi mật khẩu thành công!";
            }
        }

        // Tải view
        require_once __DIR__ . '/../views/user/change_password.php';
    }
}
