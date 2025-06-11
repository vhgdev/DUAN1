<?php include_once ROOT_DIR . "views/admin/header.php" ?>


<h1>Trang dashboard admin</h1>


<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <h3 class="text-center mb-4" style="color: #D10024;">Đăng ký</h3>
        <form action="<?= ADMIN_URL . '?ctl=updateuser'?>" method="POST">
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="fullname">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" <?= $user['fullname'] ?> />
            </div>


            <!-- address -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="address">Địa chỉ:</label>
                <input type="text" name="address" class="form-control" <?= $user['fullname'] ?>/>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="background-color: #D10024;">
                <span>Đăng ký</span>
            </button>

            <!-- Login redirect -->
            <div class="text-center">
                <p>Đã có tài khoản? <a href="index.php?ctl=login">Đăng nhập</a></p>
                
            </div>
        </form>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php";
