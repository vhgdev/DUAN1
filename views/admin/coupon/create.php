<a href="index.php?ctl=add-coupon" class="btn btn-success">Thêm mã</a>
<table class="table">
  <tr>
    <th>#</th><th>Mã</th><th>Loại</th><th>Giá trị</th><th>Hết hạn</th><th>Hành động</th>
  </tr>
  <?php foreach ($coupons as $c) : ?>
    <tr>
      <td><?= $c['id'] ?></td>
      <td><?= $c['code'] ?></td>
      <td><?= $c['discount_type'] ?></td>
      <td><?= $c['discount_value'] ?></td>
      <td><?= $c['expiry_date'] ?></td>
      <td>
        <a href="?ctl=edit-coupon&id=<?= $c['id'] ?>">Sửa</a> |
        <a href="?ctl=delete-coupon&id=<?= $c['id'] ?>">Xóa</a>
      </td>
    </tr>
  <?php endforeach ?>
</table>
