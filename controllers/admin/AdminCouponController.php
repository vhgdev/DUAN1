<?php
require_once __DIR__ . '/../../env.php';

class AdminCouponController
{
    protected $coupon;

    public function __construct()
    {
        $this->coupon = new Coupon();
    }

    public function index()
    {
        try {
            $coupons = $this->coupon->getAll();
            return view("admin.coupon.index", ['coupons' => $coupons]);
        } catch (Exception $e) {
            // Xử lý lỗi, có thể log hoặc hiển thị thông báo
            return view("admin.coupon.index", ['error' => 'Không thể tải danh sách mã giảm giá']);
        }
    }

    public function create()
    {
        try {
            return view("admin.coupon.add");
        } catch (Exception $e) {
            // Xử lý lỗi
            return view("admin.coupon.add", ['error' => 'Không thể tải trang tạo mã']);
        }
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'code' => $_POST['code'] ?? '',
                    'discount_type' => $_POST['discount_type'] ?? '',
                    'discount_value' => $_POST['discount_value'] ?? 0,
                    'expiry_date' => $_POST['expiry_date'] ?? date('Y-m-d')
                ];
                // Kiểm tra dữ liệu cơ bản
                if (empty($data['code']) || empty($data['discount_type']) || empty($data['expiry_date'])) {
                    return view("admin.coupon.create", ['error' => 'Vui lòng điền đầy đủ thông tin']);
                }
                $this->coupon->insert($data);
                header("Location: index.php?ctl=list-coupon");
                exit;
            } catch (Exception $e) {
                return view("admin.coupon.add", ['error' => 'Lỗi khi tạo mã: ' . $e->getMessage()]);
            }
        }
        return view("admin.coupon.add");
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            return view("admin.coupon.index", ['error' => 'ID không hợp lệ']);
        }
        try {
            $coupon = $this->coupon->find($id);
            if (!$coupon) {
                return view("admin.coupon.index", ['error' => 'Mã giảm giá không tồn tại']);
            }
            return view("admin.coupon.edit", ['coupon' => $coupon]);
        } catch (Exception $e) {
            return view("admin.coupon.edit", ['error' => 'Không thể tải mã để chỉnh sửa']);
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = $_POST['id'] ?? null;
                if (!$id) {
                    return view("admin.coupon.edit", ['error' => 'ID không hợp lệ']);
                }
                $data = [
                    'code' => $_POST['code'] ?? '',
                    'discount_type' => $_POST['discount_type'] ?? '',
                    'discount_value' => $_POST['discount_value'] ?? 0,
                    'expiry_date' => $_POST['expiry_date'] ?? date('Y-m-d')
                ];
                if (empty($data['code']) || empty($data['discount_type']) || empty($data['expiry_date'])) {
                    return view("admin.coupon.edit", ['coupon' => $data, 'error' => 'Vui lòng điền đầy đủ thông tin']);
                }
                $this->coupon->updateData($id, $data);
                header("Location: index.php?ctl=list-coupon");
                exit;
            } catch (Exception $e) {
                return view("admin.coupon.edit", ['error' => 'Lỗi khi cập nhật: ' . $e->getMessage()]);
            }
        }
        return view("admin.coupon.edit");
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?ctl=list-coupon");
            exit;
        }
        try {
            $this->coupon->deleteData($id);
            header("Location: index.php?ctl=list-coupon");
            exit;
        } catch (Exception $e) {
            // Xử lý lỗi, có thể redirect với thông báo lỗi
            header("Location: index.php?ctl=list-coupon");
            exit;
        }
    }
}
?>