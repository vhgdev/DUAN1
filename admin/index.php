<?php
session_start();

// Require files
require_once __DIR__ . "/../env.php";
require_once __DIR__ . "/../common/function.php";

// Require models
require_once __DIR__ . "/../models/BaseModel.php";
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Order.php";
require_once __DIR__ . "/../models/Coupon.php";

// Require controllers
require_once __DIR__ . "/../controllers/admin/AdminProductController.php";
require_once __DIR__ . "/../controllers/admin/AdminCategoryController.php";
require_once __DIR__ . "/../controllers/admin/DashboardController.php";
require_once __DIR__ . "/../controllers/admin/AdminCouponController.php";
require_once __DIR__ . "/../controllers/AuthController.php";
require_once __DIR__ . "/../controllers/OrderController.php";

// Lấy tham số điều hướng từ URL, mặc định là dashboard
$ctl = $_GET['ctl'] ?? 'dashboard';

// Xử lý điều hướng
try {
    match ($ctl) {
        'dashboard' => view('admin.dashboard'),
        'listsp' => (new AdminProductController())->index(),
        'addsp' => (new AdminProductController())->create(),
        'storesp' => (new AdminProductController())->store(),
        'editsp' => (new AdminProductController())->edit(),
        'updatesp' => (new AdminProductController())->update(),
        'deletesp' => (new AdminProductController())->delete(),

        'listdm' => (new AdminCategoryController())->index(),
        'adddm' => (new AdminCategoryController())->add(),
        'storedm' => (new AdminCategoryController())->store(),
        'editdm' => (new AdminCategoryController())->edit(),
        'updatedm' => (new AdminCategoryController())->update(),
        'deletedm' => (new AdminCategoryController())->delete(),

        'listuser' => (new AuthController())->index(),
        'updateuser' => (new AuthController())->updateActive(),

        'list-order' => (new OrderController())->index(),
        'detail-order' => (new OrderController())->showOrder(),

        'list-coupon' => (new AdminCouponController())->index(),
        'add-coupon' => (new AdminCouponController())->create(),
        'store-coupon' => (new AdminCouponController())->store(),
        'edit-coupon' => (new AdminCouponController())->edit(),
        'update-coupon' => (new AdminCouponController())->update(),
        'delete-coupon' => (new AdminCouponController())->delete(),

        default => view('admin.404'), // Trang lỗi 404 nếu không khớp
    };
} catch (Exception $e) {
    // Xử lý lỗi chung, có thể log hoặc hiển thị thông báo
    error_log("Lỗi: " . $e->getMessage());
    view('admin.error', ['message' => 'Có lỗi xảy ra. Vui lòng thử lại sau.']);
}