<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">DANH SÁCH TÀI KHOẢN</h2>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm..." id="searchInput">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (empty($users)): ?>
                            <div class="alert alert-warning text-center p-3">Không có tài khoản nào để hiển thị.</div>
                        <?php else: ?>
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center">#ID</th>
                                        <th scope="col">Họ tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Vai trò</th>
                                        <th scope="col" class="text-center">Hoạt động</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col" class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $user['id'] ?></th>
                                            <td><?= htmlspecialchars($user['fullname']) ?></td>
                                            <td><?= htmlspecialchars($user['email']) ?></td>
                                            <td><?= htmlspecialchars($user['phone']) ?></td>
                                            <td><?= htmlspecialchars($user['role']) ?></td>
                                            <td class="text-center">
                                                <span class="badge <?= $user['active'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                    <?= $user['active'] == 1 ? 'Hoạt động' : 'Khóa' ?>
                                                </span>
                                            </td>
                                            <td><?= htmlspecialchars($user['address']) ?></td>
                                            <td class="text-center">
                                                <?php if ($user['role'] != 'admin'): ?>
                                                    <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                        <input type="hidden" name="active" value="<?= $user['active'] ?>">
                                                        <?php if ($user['active'] == 1): ?>
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn khóa tài khoản này?')">
                                                                <i class="bi bi-lock-fill"></i> Khóa
                                                            </button>
                                                        <?php else: ?>
                                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Bạn có chắc muốn kích hoạt tài khoản này?')">
                                                                <i class="bi bi-unlock-fill"></i> Kích hoạt
                                                            </button>
                                                        <?php endif ?>
                                                    </form>
                                                <?php else: ?>
                                                    <span class="text-muted">Không thể chỉnh sửa</span>
                                                <?php endif ?>
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