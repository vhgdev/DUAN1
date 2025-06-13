<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<h2>Sửa mã giảm giá</h2>
<form action="<?= ADMIN_URL . '?ctl=update-coupon' ?>" method="post">
    <input type="hidden" name="id" value="<?= $coupon['id'] ?>">
    <div class="mb-3">
        <label for="code" class="form-label">Mã giảm giá</label>
        <input type="text" class="form-control" id="code" name="code" value="<?= $coupon['code'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="discount_type" class="form-label">Loại giảm</label>
        <select class="form-control" id="discount_type" name="discount_type" required>
            <option value="percent" <?= $coupon['discount_type'] == 'percent' ? 'selected' : '' ?>>Phần trăm (%)</option>
            <option value="fixed" <?= $coupon['discount_type'] == 'fixed' ? 'selected' : '' ?>>Số tiền cố định</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="discount_value" class="form-label">Giá trị</label>
        <input type="number" class="form-control" id="discount_value" name="discount_value" value="<?= $coupon['discount_value'] ?>" min="0" required>
    </div>
    <div class="mb-3">
        <label for="expiry_date" class="form-label">Hạn sử dụng</label>
        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?= $coupon['expiry_date'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="<?= ADMIN_URL . '?ctl=list-coupon' ?>" class="btn btn-secondary">Quay lại</a>
</form>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>