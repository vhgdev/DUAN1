<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px 10px;
            transition: background-color 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #3498db;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar-top {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 10px 20px;
        }
        .navbar-top .form-control {
            border-radius: 20px;
        }
        .navbar-top .btn {
            border-radius: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2c3e50;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .sidebar .nav-link span {
                display: none;
            }
            .sidebar .nav-link i {
                margin-right: 0;
            }
            .content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center text-white mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="<?= ROOT_URL_ . '' ?>">
                    <i class="fas fa-home"></i><span>Trang bán hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listdm' ?>">
                    <i class="fas fa-list"></i><span>Danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listsp' ?>">
                    <i class="fas fa-box"></i><span>Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listuser' ?>">
                    <i class="fas fa-users"></i><span>Tài khoản</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ADMIN_URL . '?ctl=list-order' ?>">
                    <i class="fas fa-shopping-cart"></i><span>Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ADMIN_URL . '?ctl=list-coupon' ?>">
                    <i class="fas fa-tags"></i><span>Mã giảm giá</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <nav class="navbar navbar-top">
            <div class="container-fluid">
                <h1>QUẢN LÝ WEBSITE - ADMIN</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </nav>
        <div class="container-fluid mt-4">
            <div class="card p-4">
                <h3 class="mb-3">Tổng quan</h3>
                <p>Chào mừng bạn đến với bảng điều khiển quản trị. Chọn một mục từ menu bên trái để bắt đầu.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>