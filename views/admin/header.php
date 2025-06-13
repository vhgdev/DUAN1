<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>QUẢN LÝ WEBSITE - ADMIN</h1>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= ROOT_URL_ . '' ?>">Trang bán hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listdm' ?>">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listsp' ?>">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listuser' ?>">Tài khoản</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=list-order' ?>">Đơn hàng</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=list-coupon' ?>">Mã giảm giá</a>
                        </li>


                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search"
                         placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
</body>
</html>