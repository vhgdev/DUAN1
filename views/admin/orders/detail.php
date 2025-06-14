    <?php
    if (!isset($order) || empty($order)) {
        echo "Dữ liệu đơn hàng không khả dụng.";
        exit;
    }
    $orderDate = !empty($order['created_at']) ? date('d-m-Y H:i:s', strtotime($order['created_at'])) : "Không xác định";
    $total = 0;
    ?>

    <?php include_once ROOT_DIR . "views/admin/header.php" ?>

    <?php if ($message != "") : ?> 
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>



<div class="content">
    <div class="col-md-20 p4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2>CHI TIẾT ĐƠN HÀNG</h2>

                </div>
            </div>
        </div>
    </div>
</div>



    <div class="container mt-10">
            <div class="card-body">
                <div class="table-responsive">

                </div>

                <!-- Thông tin đơn hàng -->
                <div class="mb-4">
                    <h5>Mã đơn hàng: #<?= $order['id'] ?></h5>
                    <p><strong>Ngày đặt hàng: </strong> <?= $orderDate ?></p>
                </div>

                    <!-- Thông tin khách hàng -->
                <div class="mb-4">
                    <h5>Thông tin khách hàng</h5>
                    <p><strong>Họ tên: </strong> <?= $order['fullname'] ?? 'Không xác định' ?></p>
                    <p><strong>Email: </strong> <?= $order['email'] ?? 'Không xác định' ?></p>
                    <p><strong>Điện thoại: </strong> <?= $order['phone'] ?? 'Không xác định' ?></p>
                    <p><strong>Địa chỉ: </strong> <?= $order['address'] ?? 'Không xác định' ?></p>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="mb-4">
                    <h5>Danh sách sản phẩm</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($order_details as $stt => $detail) : ?>
                                    <tr>
                                        <td><?= $stt+1 ?></td> <!-- Tăng thứ tự sau mỗi vòng lặp -->
                                        <td><?= $detail['name'] ?></td>
                                        <td>
                                            <img src="<?= ROOT_URL_ . $detail['image'] ?>" width="60" alt="Hình sản phẩm">
                                        </td>
                                        <td><?= number_format($detail['price']) ?></td>
                                        <td><?= $detail['quantity'] ?></td>
                                        <td><?= number_format($detail['quantity'] * $detail['price']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-end">Tổng cộng: </th>
                                <th><?= number_format($order['total_price']) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mb-4">
                    <h5>Cập nhật trạng thái đơn hàng</h5>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="orderStatus" class="form-label">Trạng thái đơn hàng</label>
                            <select name="status" id="orderStatus" class="form-select">
                                <?php foreach ($status as $key => $value) : ?>
                                    <option value="<?= $key ?>"
                                        <?= $order['status'] == $key ? 'selected' : '' ?>
                                        <?php
                                        if ($order['status'] == 2 && in_array($key, [1, 4])) {
                                            echo "disabled";
                                        } elseif ($order['status'] == 3 && in_array($key, [1, 2, 4])) {
                                            echo "disabled";
                                        } elseif ($order['status'] == 4 && in_array($key, [1, 2, 3])) {
                                            echo "disabled";
                                        }
                                        ?>>
                                        <?= $value ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once ROOT_DIR . "views/admin/footer.php" ?>
