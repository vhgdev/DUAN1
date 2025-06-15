<?php require_once 'views/clients/header.php'; ?>

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;"><br>
        <h3 class="text-center mb-4">Đổi mật khẩu</h3>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if (!empty($message)) : ?>
            <div class="alert alert-success"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST" action="?ctl=handle-change-password">
            <div class="mb-3">
                <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div><br>
            <div class="mb-3">
                <label for="new_password" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div><br>
            <div class="mb-4">
                <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div><br>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color: #D10024;">Cập nhật mật khẩu</button>
            </div>
        </form>
    </div>
</div>

<?php require_once 'views/clients/footer.php'; ?>
