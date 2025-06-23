<?php include_once ROOT_DIR . "views/clients/header.php"; ?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h4>LỊCH SỬ ĐƠN HÀNG</h4>
        </div>

        <div class="card-body">

            <!-- Thông tin khách hàng -->
            <div class="mb-4">
                <h5 class="text-primary">Thông tin khách hàng</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Họ tên:</strong> <?= $user['fullname'] ?></p>
                        <p><strong>Email:</strong> <?= $user['email'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Điện thoại:</strong> <?= $user['phone'] ?></p>
                        <p><strong>Địa chỉ:</strong> <?= $user['address'] ?></p>
                    </div>
                </div>
                <hr>
            </div>

            <!-- Danh sách đơn hàng -->
            <div>
                <h5 class="text-primary">Danh sách đơn hàng</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>#ID</th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Ngày mua</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders)) : ?>
                                <?php foreach ($orders as $order) : ?>
                                    <tr class="text-center">
                                        <td>#<?= $order['id'] ?></td>
                                        <td><?= htmlspecialchars($order['payment_method']) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= $order['status'] == 0 ? 'bg-warning' : ($order['status'] == 1 ? 'bg-info' : ($order['status'] == 2 ? 'bg-success' : 'bg-danger')) ?>">
                                                <?= getOrderStatus($order['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= number_format($order['total_price']) ?> VNĐ</td>
                                        <td><?= date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></td>
                                        <td>
<a href="<?= ROOT_URL_ . '?ctl=order-detail-user&id=' . $order['id'] ?>" class="btn btn-sm btn-primary">
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div> <!-- end container -->

<?php include_once ROOT_DIR . "views/clients/footer.php"; ?>
