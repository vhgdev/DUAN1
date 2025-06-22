<?php
if (!isset($order) || empty($order)) {
    echo "Dữ liệu đơn hàng không khả dụng.";
    exit;
}

$orderDate = !empty($order['created_at']) ? date('d-m-Y H:i:s', strtotime($order['created_at'])) : "Không xác định";

include_once ROOT_DIR . "views/clients/header.php";
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h4>CHI TIẾT ĐƠN HÀNG #<?= $order['id'] ?></h4>
        </div>

        <div class="card-body">

            <!-- Thông tin đơn hàng -->
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Ngày đặt hàng:</strong> <?= $orderDate ?></p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>
                            <strong>Trạng thái:</strong>
                            <span class="badge 
                                <?= $order['status'] == 0 ? 'bg-warning' : ($order['status'] == 1 ? 'bg-info' : ($order['status'] == 2 ? 'bg-success' : 'bg-danger')) ?>">
                                <?= getOrderStatus($order['status']) ?>
                            </span>
                        </p>
                    </div>
                </div>
                <hr>
            </div>

            <!-- Thông tin khách hàng -->
            <div class="mb-4">
                <h5 class="text-primary">Thông tin khách hàng</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Họ tến:</strong> <?= $order['fullname'] ?? 'Không xác định' ?></p>
                        <p><strong>Email:</strong> <?= $order['email'] ?? 'Không xác định' ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Điện thoại:</strong> <?= $order['phone'] ?? 'Không xác định' ?></p>
                        <p><strong>Địa chỉ:</strong> <?= $order['address'] ?? 'Không xác định' ?></p>
                    </div>
                </div>
                <hr>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="mb-4">
                <h5 class="text-primary">Sản phẩm đã đặt</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>SL</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($order_details as $index => $detail): ?>
                                <tr class="text-center">
                                    <td><?= $index + 1 ?></td>
                                    <td class="text-start"><?= $detail['name'] ?></td>
                                    <td><img src="<?= ROOT_URL_ . $detail['image'] ?>" width="60" class="img-thumbnail"></td>
                                    <td><?= number_format($detail['price']) ?> VNĐ</td>
                                    <td><?= $detail['quantity'] ?></td>
                                    <td><?= number_format($detail['price'] * $detail['quantity']) ?> VNĐ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-end">Tổng cộng:</th>
                                <th><?= number_format($order['total_price']) ?> VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Nút quay lại và hủy đơn -->
            <div class="d-flex justify-content-between">
                <a href="?ctl=list-order" class="btn btn-outline-secondary"> Quay lại danh sách đơn hàng</a>

                <?php if ($order['status'] == 1): ?>
                    <form method="post" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">
                        <button type="submit" class="btn btn-outline-danger">Hủy đơn hàng</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php"; ?>
