<?php include_once ROOT_DIR . "views/clients/header.php"; ?>

<div class="container mt-5"><br>
    <h1 class="mb-4 text-center">Giỏ hàng của bạn</h1><br>

    <!-- Hiển thị thông báo -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center"><?= htmlspecialchars($_SESSION['success']);
                                                        unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($_SESSION['error']);
                                                    unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Form nhập mã giảm giá -->
    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="<?= htmlspecialchars(ROOT_URL_ . '?ctl=apply-coupon') ?>" class="d-flex">
                <input type="text" name="coupon_code" class="form-control me-2" placeholder="Nhập mã giảm giá" required><br>
                <button type="submit" class="btn btn-primary">Áp dụng</button>
            </form>
        </div>
    </div>

    <!-- Form cập nhật giỏ hàng -->
    <form action="<?= htmlspecialchars(ROOT_URL_ . '?ctl=update-cart') ?>" method="POST">
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
                    <?php foreach ($carts as $id => $cart): ?>
                        <tr>
                            <th scope="row"><?= htmlspecialchars($id) ?></th>
                            <td>
                                <img src="<?= htmlspecialchars($cart['image']) ?>" alt="<?= htmlspecialchars($cart['name']) ?>" class="img-thumbnail"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($cart['name']) ?></td>
                            <td><?= number_format($cart['price']) ?> VNĐ</td>
                            <td>
                                <input type="number" name="quantity[<?= htmlspecialchars($id) ?>]" class="form-control" value="<?= htmlspecialchars($cart['quantity']) ?>" min="1"
                                    style="width: 80px;">
                            </td>
                            <td><?= number_format($cart['price'] * $cart['quantity']) ?> VNĐ</td>
                            <td>
                                <a href="<?= htmlspecialchars(ROOT_URL_ . '?ctl=delete-cart&id=' . $id) ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                        <td colspan="2" class="fw-bold text-danger"><?= number_format($totalPrice) ?> VNĐ</td>
                    </tr>

                    <?php if (!empty($coupon)): ?>
                        <tr>
                            <td colspan="5" class="text-end text-success">Giảm giá (<?= htmlspecialchars($coupon['code']) ?>):</td>
                            <td colspan="2" class="text-success">-<?= number_format($discount) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tổng thanh toán:</td>
                            <td colspan="2" class="fw-bold text-danger"><?= number_format($finalPrice) ?> VNĐ</td>
                        </tr>
                    <?php endif; ?>
                </tfoot>
            </table>
        </div>


        <!-- Nút hành động -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="<?= htmlspecialchars(ROOT_URL_) ?>" class="btn btn-danger btn-sm">
                <i class="bi bi-arrow-clockwise"></i> Tiếp tục mua sắm
            </a>
            
            <div class="d-flex gap-2"><br>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-repeat"></i> Cập nhật giỏ hàng
                </button>
                <a href="<?= htmlspecialchars(ROOT_URL_ . '?ctl=view-checkout') ?>" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div>
        </div>


    </form>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php"; ?>