<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<h2>Danh sách mã giảm giá</h2>

<!-- Form có thể được sử dụng cho tìm kiếm hoặc lọc sau này -->
<form action="" method="post">
    <label for="search"></label>
    <input type="text" id="search" name="search" class="form-control mb-3" placeholder="Tìm kiếm mã giảm giá..." style="max-width: 300px;">
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th>Mã giảm giá</th>
            <th>Loại giảm</th>
            <th>Giá trị</th>
            <th>Hạn sử dụng</th>
            <th>Hành động</th>
            <th scope="col">
                <a href="<?= ADMIN_URL . '?ctl=add-coupon' ?>" class="btn btn-primary">Tạo mã giảm giá</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($coupons) && is_array($coupons) && !empty($coupons)): ?>
            <?php foreach ($coupons as $coupon): ?>
                <tr>
                    <td><?= htmlspecialchars($coupon['id'] ?? '') ?></td>
                    <td><?= htmlspecialchars($coupon['code'] ?? '') ?></td>
                    <td><?= htmlspecialchars($coupon['discount_type'] ?? '') ?></td>
                    <td><?= htmlspecialchars($coupon['discount_value'] ?? '') ?></td>
                    <td><?= htmlspecialchars($coupon['expiry_date'] ?? '') ?></td>
                    <td>
                        <a href="?ctl=edit-coupon&id=<?= htmlspecialchars($coupon['id'] ?? '') ?>" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="?ctl=delete-coupon&id=<?= htmlspecialchars($coupon['id'] ?? '') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn?')">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Không có mã giảm giá nào.</td>
            </tr>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <tr>
                <td colspan="7" class="text-center text-danger"><?= htmlspecialchars($error) ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>