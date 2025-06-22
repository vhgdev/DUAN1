<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">DANH SÁCH ĐƠN HÀNG</h2>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm..." id="searchInput">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (empty($orders)): ?>
                            <div class="alert alert-warning text-center p-3">Không có đơn hàng nào để hiển thị.</div>
                        <?php else: ?>
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center">#ID</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th scope="col" class="text-center">Trạng thái</th>
                                        <th scope="col" class="text-end">Tổng tiền</th>
                                        <th scope="col">Ngày mua</th>
                                        <th scope="col" class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= htmlspecialchars($order['id']) ?></th>
                                            <td><?= htmlspecialchars($order['fullname']) ?></td>
                                            <td><?= htmlspecialchars($order['phone']) ?></td>
                                            <td><?= htmlspecialchars($order['payment_method']) ?></td>
                                            <td class="text-center">
                                                <span class="badge <?= $order['status'] ? 'bg-success' : 'bg-danger' ?>">
                                                    <?= htmlspecialchars(getOrderStatus($order['status'])) ?>
                                                </span>
                                            </td>
                                            <td class="text-end"><?= number_format($order['total_price'], 0, ',', '.') ?> VNĐ</td>
                                            <td><?= htmlspecialchars($order['created_at']) ?></td>
                                            <td class="text-center">
                                                <a href="<?= ADMIN_URL . '?ctl=detail-order&id=' . htmlspecialchars($order['id']) ?>" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil"></i> Cập nhật
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>