<?php include_once "views/clients/header.php" ?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%; border-radius: 10px;">

        <!-- Thông báo đăng nhập thành công -->
        <?php if ($message != '') : ?>

            <div class="alert alert-success">
                <?= $message ?>
            </div>

        <?php endif ?>

        <!-- Thông báo đăng nhập thất bại -->

        <?php if ($error != '') : ?>

            <div class="alert alert-danger">
                <?= $error ?>
            </div>

        <?php endif ?>



        <!-- Form đăng nhập -->
        
        <br><h3 class="text-center mb-4" style="color: #D10024;">Đăng nhập</h3>

        <form action="<?= ROOT_URL_ . '?ctl=login' ?>" method="POST">

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" name="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" class="form-control" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox" checked />
                        <label class="form-check-label" for="form2Example31"> Nhớ mật khẩu </label>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="background-color: #D10024;">
                <span>Đăng nhập</span>
            </button><br>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Không phải thành viên ? <a href="index.php?ctl=register">Đăng ký</a></p>

            </div>
        </form>
    </div>
</div>

<?php include_once "views/clients/footer.php" ?>