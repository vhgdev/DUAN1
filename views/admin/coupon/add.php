<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<h2>Thêm mã giảm giá</h2>
<form action="<?= ADMIN_URL . '?ctl=store-coupon' ?>" method="post">
    <div class="mb-3">
        <label for="code" class="form-label">Mã giảm giá</label>
        <input type="text" class="form-control" id="code" name="code" required>
    </div>
    <div class="mb-3">
        <label for="discount_type" class="form-label">Loại giảm</label>
        <select class="form-control" id="discount_type" name="discount_type" required>
            <option value="percent">Phần trăm (%)</option>
            <option value="fixed">Số tiền cố định</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="discount_value" class="form-label">Giá trị</label>
        <input type="number" class="form-control" id="discount_value" name="discount_value" min="0" required>
    </div>
    <div class="mb-3">
        <label for="expiry_date" class="form-label">Hạn sử dụng</label>
        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mã</button>
    <a href="<?= ADMIN_URL . '?ctl=list-coupon' ?>" class="btn btn-secondary">Quay lại</a>
</form>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>