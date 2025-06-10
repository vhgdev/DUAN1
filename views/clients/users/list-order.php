<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Phương thức thanh toán</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Ngày mua</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <th scope="row"><?= $order['id'] ?></th>
          <td><?= $order['payment_method'] ?></td>
          <td><?= getOrderStatus($order['status']) ?></td>
          <td><?= number_format($order['total_price']) ?>VNĐ</td>
          <td><?= $order['created_at'] ?></td>
          <td>
            <a href="<?= ROOT_URL_ . '?ctl=order-detail-user&id=' . $order['detail'] ?>" class="btn btn-primary ">chi tiết</a>
            Hủy
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php";
