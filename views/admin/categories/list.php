<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">DANH SÁCH DANH MỤC</h2>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm danh mục..." id="searchInput">
                        <a href="<?= ADMIN_URL . '?ctl=adddm' ?>" class="btn btn-light btn-sm">Thêm danh mục</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($message != '') : ?>
                        <div class="alert alert-success text-center p-3">
                            <?= htmlspecialchars($message) ?>
                        </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <?php if (empty($categories)): ?>
                            <div class="alert alert-warning text-center p-3">Không có danh mục nào để hiển thị.</div>
                        <?php else: ?>
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center">#ID</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Loại sản phẩm</th>
                                        <th scope="col" class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $cate): ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= htmlspecialchars($cate['id']) ?></th>
                                            <td><?= htmlspecialchars($cate['cate_name']) ?></td>
                                            <td><?= htmlspecialchars($cate['type'] ? 'Điện thoại' : 'Phụ kiện') ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?= ADMIN_URL . '?ctl=editdm&id=' . htmlspecialchars($cate['id']) ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> Sửa
                                                    </a>
                                                    <a href="<?= ADMIN_URL . '?ctl=deletedm&id=' . htmlspecialchars($cate['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                                        <i class="bi bi-trash"></i> Xóa
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
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