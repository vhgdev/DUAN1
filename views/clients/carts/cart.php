<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <h1 class="mb-4">Giỏ hàng của bạn</h1>
    <form action="<?= ROOT_URL_ . '?ctl=update_cart'?>" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dòng sản phẩm 1 -->
                    <?php foreach ($carts as $id => $cart) : ?>
                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td>
                                <img src="<?= $cart['image'] ?>" alt="<?= $cart['name'] ?>" class="img-thumbnail"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td><?= $cart['name'] ?></td>
                            <td><?= number_format($cart['price']) ?> VNĐ</td>
                            <td>
                                <input type="number" name="quantity[<?= $id ?>]" class="form-control" value="<?= $cart['quantity'] ?>" min="1"
                                    style="width: 80px;">
                            </td>
                            <td><?= number_format($cart['price'] * $cart['quantity']) ?> VNĐ</td>
                            <td>
                                <a href="<?= ROOT_URL_ . '?ctl=delete-cart&id=' . $id ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <!-- Tổng tiền -->
               <tfoot class="table-light">
    <tr>
        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
        <td colspan="2" class="fw-bold text-danger"><?= number_format($totalPrice) ?> VNĐ</td>
    </tr>

    <?php
    $discount = 0;
    if (isset($_SESSION['coupon'])) {
        $coupon = $_SESSION['coupon'];
        if ($coupon['discount_type'] === 'percent') {
            $discount = $totalPrice * ($coupon['discount_value'] / 100);
        } else {
            $discount = $coupon['discount_value'];
        }
    ?>
    <tr>
        <td colspan="5" class="text-end text-success">Giảm giá (<?= $coupon['code'] ?>):</td>
        <td colspan="2" class="text-success">-<?= number_format($discount) ?> VNĐ</td>
    </tr>
    <tr>
        <td colspan="5" class="text-end fw-bold">Tổng thanh toán:</td>
        <td colspan="2" class="fw-bold text-danger"><?= number_format($totalPrice - $discount) ?> VNĐ</td>
    </tr>
    <?php } ?>
</tfoot>

            </table>
        </div>
        <!-- Nút hành động -->
        <div class="d-flex justify-content-between mt-4">
            <form method="POST" action="<?= ROOT_URL_ . '?ctl=apply-coupon' ?>">
  <input type="text" name="coupon_code" placeholder="Nhập mã giảm giá">
  <button type="submit">Áp dụng</button>
</form>

            <a href="<?= ROOT_URL_ ?>" class="btn btn-danger btn-sm">
                <i class="bi bi-arrow-clockwise"></i> Tiếp tục mua sắm
            </a>
            <div>
                <br>
                <a href="<?= ROOT_URL_ . '?ctl=update-cart' ?>" type="button" class="btn btn-success">
                    <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                </a>
                <a href="<?= ROOT_URL_ . '?ctl=view-checkout' ?>" type="button" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div><br>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>