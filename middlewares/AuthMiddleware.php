<?php
function check_admin() {
    // KHÔNG cần session_start nữa
    $user = $_SESSION['user'] ?? null;

    if (!$user || $user['role'] != 'admin') {
        header("Location: " . ROOT_URL_);
        exit;
    }
}
