<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<h2>Danh sách mã giảm giá</h2>
<form action="" method="post"></form>
<label for=""></label>
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
        </tbody>
    </table>



<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>