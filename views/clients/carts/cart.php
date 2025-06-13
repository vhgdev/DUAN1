<div class="container mt-5">
    <h1 class="mb-4">Giỏ hàng của bạn</h1>

    <!-- Hiển thị thông báo -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Form nhập mã giảm giá -->
    <form method="POST" action="<?= ROOT_URL_ . '?ctl=apply-coupon' ?>" class="d-flex mb-3" style="max-width: 400px;">
        <input type="text" name="coupon_code" class="form-control me-2" placeholder="Nhập mã giảm giá" required>
        <button type="submit" class="btn btn-primary">Áp dụng</button>
    </form>

    <!-- Form cập nhật giỏ hàng -->
    <form action="<?= ROOT_URL_ . '?ctl=update-cart' ?>" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $id => $cart) : ?>
                        <tr>
                            <th><?= $id ?></th>
                            <td><img src="<?= $cart['image'] ?>" alt="<?= $cart['name'] ?>" class="img-thumbnail" style="width: 80px;"></td>
                            <td><?= $cart['name'] ?></td>
                            <td><?= number_format($cart['price']) ?> VNĐ</td>
                            <td>
                                <input type="number" name="quantity[<?= $id ?>]" class="form-control" value="<?= $cart['quantity'] ?>" min="1" style="width: 80px;">
                            </td>
                            <td><?= number_format($cart['price'] * $cart['quantity']) ?> VNĐ</td>
                            <td>
                                <a href="<?= ROOT_URL_ . '?ctl=delete-cart&id=' . $id ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
                        $discount = ($coupon['discount_type'] === 'percent') ? $totalPrice * ($coupon['discount_value'] / 100) : $coupon['discount_value'];
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
            <a href="<?= ROOT_URL_ ?>" class="btn btn-danger btn-sm">
                <i class="bi bi-arrow-clockwise"></i> Tiếp tục mua sắm
            </a>
            <div>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-repeat"></i> Cập nhật giỏ hàng
                </button>
                <a href="<?= ROOT_URL_ . '?ctl=view-checkout' ?>" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div>
        </div>
    </form>
</div>
