<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">DANH SÁCH BÌNH LUẬN</h2>
                    <div class="d-flex">
                        <form action="<?= ADMIN_URL . '?ctl=index' ?>" method="GET" class="d-flex">
                            <input type="hidden" name="ctl" value="index">
                            <input type="text" name="keyword" class="form-control me-2" placeholder="Tìm kiếm bình luận..." id="searchInput" value="<?= htmlspecialchars($keyword ?? '') ?>">
                            <button type="submit" class="btn btn-light btn-sm">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (isset($success)): ?>
                            <div class="alert alert-success text-center p-3"><?= htmlspecialchars($success) ?></div>
                        <?php endif; ?>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger text-center p-3"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>
                        
                        <?php if (!empty($comments)): ?>
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center">#ID</th>
                                        <th scope="col">Người dùng</th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Đánh giá</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col" class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $c): ?>
                                        <tr>
                                            <td class="text-center"><?= htmlspecialchars($c['id']) ?></td>
                                            <td><?= htmlspecialchars($c['fullname'] ?? $c['user_id'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($c['product_name'] ?? $c['product_id'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($c['content']) ?></td>
                                            <td><?= htmlspecialchars($c['rating'] ?? 'N/A') ?> sao</td>
                                            <td><?= htmlspecialchars(date('Y-m-d H:i:s', strtotime($c['created_at']))) ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?= ADMIN_URL . '?ctl=delete-comment&id=' . htmlspecialchars($c['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                                        <i class="bi bi-trash"></i> Xóa
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        <?php else: ?>
                            <div class="alert alert-warning text-center p-3">Không có bình luận nào để hiển thị.</div>
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

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>