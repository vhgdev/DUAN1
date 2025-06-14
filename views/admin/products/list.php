    <?php include_once ROOT_DIR . "views/admin/header.php" ?>

    <div class="content">
        <div class="col-md-20 p-4">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                        <h2 class="mb-0">Danh Sách Sản Phẩm</h2>
                        <div class="d-flex">
                            <input type="text" class="form-control me-2" placeholder="Tìm kiếm..." id="searchInput">
                            <a href="<?= ADMIN_URL . '?ctl=addsp' ?>" class="btn btn-light btn-sm">Thêm Sản Phẩm</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if (empty($products)): ?>
                                <div class="alert alert-warning text-center p-3">Không có sản phẩm nào để hiển thị.</div>
                            <?php else: ?>
                                <table class="table table-hover table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="text-center">#ID</th>
                                            <th scope="col">Tên Sản Phẩm</th>
                                            <th scope="col" class="text-center">Hình Ảnh</th>
                                            <th scope="col" class="text-end">Giá</th>
                                            <th scope="col" class="text-center">Số Lượng</th>
                                            <th scope="col" class="text-center">Trạng Thái</th>
                                            <th scope="col">Danh Mục</th>
                                            <th scope="col" class="text-center">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $pro) : ?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $pro['id'] ?></th>
                                                <td><?= htmlspecialchars($pro['name']) ?></td>
                                                <td class="text-center">
                                                    <img src="<?= ROOT_URL_ . $pro['image'] ?>"
                                                        class="img-thumbnail"
                                                        style="max-width: 80px; height: auto;"
                                                        alt="<?= htmlspecialchars($pro['name']) ?>">
                                                </td>
                                                <td class="text-end">
                                                    <?= number_format($pro['price'], 0, ',', '.') ?> VNĐ
                                                </td>
                                                <td class="text-center"><?= $pro['quantity'] ?></td>
                                                <td class="text-center">
                                                    <span class="badge <?= $pro['status'] ? 'bg-success' : 'bg-danger' ?>">
                                                        <?= $pro['status'] ? 'Đang kinh doanh' : 'Ngừng kinh doanh' ?>
                                                    </span>
                                                </td>
                                                <td><?= htmlspecialchars($pro['cate_name']) ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="<?= ADMIN_URL . '?ctl=editsp&id=' . $pro['id'] ?>"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="bi bi-pencil"></i> Sửa
                                                        </a>
                                                        <a href="<?= ADMIN_URL . '?ctl=deletesp&id=' . $pro['id'] ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                                            <i class="bi bi-trash"></i> Xóa
                                                        </a>
                                                    </div>
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