<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">DANH SÁCH MÃ GIẢM GIÁ</h2>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm mã giảm giá..." id="searchInput">
                        <a href="<?= ADMIN_URL . '?ctl=add-coupon' ?>" class="btn btn-light btn-sm">Tạo mã giảm giá</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (isset($coupons) && is_array($coupons) && !empty($coupons)): ?>
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center">#ID</th>
                                        <th scope="col">Mã giảm giá</th>
                                        <th scope="col">Loại giảm</th>
                                        <th scope="col">Giá trị</th>
                                        <th scope="col">Hạn sử dụng</th>
                                        <th scope="col" class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($coupons as $coupon): ?>
                                        <tr>
                                            <td class="text-center"><?= htmlspecialchars($coupon['id'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($coupon['code'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($coupon['discount_type'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($coupon['discount_value'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($coupon['expiry_date'] ?? '') ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?= ADMIN_URL . '?ctl=edit-coupon&id=' . htmlspecialchars($coupon['id'] ?? '') ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> Sửa
                                                    </a>
                                                    <a href="<?= ADMIN_URL . '?ctl=delete-coupon&id=' . htmlspecialchars($coupon['id'] ?? '') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này?')">
                                                        <i class="bi bi-trash"></i> Xoá
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-warning text-center p-3">Không có mã giảm giá nào để hiển thị.</div>
                        <?php endif; ?>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger text-center p-3"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let value = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
        });
    });
</script>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>