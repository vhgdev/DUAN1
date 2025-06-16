<?php
require_once __DIR__ . "/../../env.php";


class AdminCouponController
{
    protected $coupon;

    public function __construct()
    {
        $this->coupon = new Coupon();
    }

    public function index()
    {
        $coupons = $this->coupon->getAll();
        return view("admin.coupon.index", ['coupons' => $coupons]);
    }

    public function create()
    {
        return view("admin.coupon.create");
    }

    public function store()
    {
        $data = [
            'code' => $_POST['code'],
            'discount_type' => $_POST['discount_type'],
            'discount_value' => $_POST['discount_value'],
            'expiry_date' => $_POST['expiry_date']
        ];
        $this->coupon->insert($data);
        header("Location: index.php?ctl=list-coupon");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $coupon = $this->coupon->find($id);
        return view("admin.coupon.edit", ['coupon' => $coupon]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $data = [
            'code' => $_POST['code'],
            'discount_type' => $_POST['discount_type'],
            'discount_value' => $_POST['discount_value'],
            'expiry_date' => $_POST['expiry_date']
        ];
        $this->coupon->updateData($id, $data);
        header("Location: index.php?ctl=list-coupon");
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->coupon->deleteData($id);
        header("Location: index.php?ctl=list-coupon");
    }
}
