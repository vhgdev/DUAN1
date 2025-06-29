<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">SỬA MÃ GIẢM GIÁ</h2>
                    <a href="<?= ADMIN_URL . '?ctl=list-coupon' ?>" class="btn btn-light btn-sm">Quay lại danh sách</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= ADMIN_URL . '?ctl=update-coupon' ?>" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($coupon['id']) ?>">
                                <div class="mb-3">
                                    <label for="code" class="form-label fw-bold">Mã giảm giá</label>
                                    <input type="text" class="form-control" id="code" name="code" value="<?= htmlspecialchars($coupon['code']) ?>" placeholder="Nhập mã giảm giá" required>
                                </div>
                                <div class="mb-3">
                                    <label for="discount_type" class="form-label fw-bold">Loại giảm</label>
                                    <select class="form-select" id="discount_type" name="discount_type" required>
                                        <option value="" disabled>Chọn loại giảm</option>
                                        <option value="percent" <?= $coupon['discount_type'] == 'percent' ? 'selected' : '' ?>>Phần trăm (%)</option>
                                        <option value="fixed" <?= $coupon['discount_type'] == 'fixed' ? 'selected' : '' ?>>Số tiền cố định</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="discount_value" class="form-label fw-bold">Giá trị</label>
                                    <input type="number" class="form-control" id="discount_value" name="discount_value" value="<?= htmlspecialchars($coupon['discount_value']) ?>" placeholder="Nhập giá trị giảm" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label fw-bold">Hạn sử dụng</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?= htmlspecialchars($coupon['expiry_date']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                    <a href="<?= ADMIN_URL . '?ctl=list-coupon' ?>" class="btn btn-secondary btn-sm">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>