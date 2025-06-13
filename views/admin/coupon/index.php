<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<h2>Danh sách mã giảm giá</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Mã giảm giá</th>
        <th>Loại giảm</th>
        <th>Giá trị</th>
        <th>Hạn sử dụng</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($coupons as $coupon): ?>
        <tr>
            <td><?= $coupon['id'] ?></td>
            <td><?= $coupon['code'] ?></td>
            <td><?= $coupon['discount_type'] ?></td>
            <td><?= $coupon['discount_value'] ?></td>
            <td><?= $coupon['expiry_date'] ?></td>
            <td>
                <a href="?ctl=edit-coupon&id=<?= $coupon['id'] ?>">Sửa</a> |
                <a href="?ctl=delete-coupon&id=<?= $coupon['id'] ?>" onclick="return confirm('Bạn có chắc chắn?')">Xoá</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p><a href="?ctl=add-coupon">➕ Thêm mã giảm giá</a></p>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>



