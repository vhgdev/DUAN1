<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FUNPHONE</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"> +868882950</a></li>
					<li><a href="#"></i> fptedu@email.com</a></li>
					<li><a href="#"></i> Trịnh Văn Bô</a></li>
					<li><a href="#"></i> Trịnh Văn Bô</a></li>
				</ul>
				<ul class="header-links pull-right" style="color: white;">
					<?= $_SESSION['user']['fullname'] ?? ''  ?>
					<?php if (isset($_SESSION['user'])) : ?>
						<li><a href="<?= ROOT_URL_ . '?ctl=logout' ?>" style="margin-left: 30px"></i> Đăng xuất</a></li>
						<li><a href="<?= ROOT_URL_ . '?ctl=list-order' ?>"></i> Lịch sử đơn hàng</a></li>
					<?php else : ?>

						<li>
							<a href="<?= ROOT_URL_ . '?ctl=login' ?>"></i> Đăng nhập</a>
						</li>

						<li><a href="<?= ROOT_URL_ . '?ctl=register' ?>"></i> Đăng ký</a>
						</li>

					<?php endif	?>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="<?= ROOT_URL_ ?>" class="logo">
								<img src="images/logo.png" alt="" width="290px" height="65px">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">

						<div class="header-search">
							<form>
								<input class="input" type="search" aria-label="Search" placeholder="Tìm kiếm sản phẩm" id="keyword">
								<button class="search-btn" type="button" id="btnSearch">Tìm kiếm</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">


							<div class="dropdown">
								<a class="dropdown-toggle" aria-expanded="true" href="<?= ROOT_URL_ . '?ctl=view-cart' ?>">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ hàng</span>
									<div class="qty"><?= $_SESSION['totalQuantity'] ?? '0' ?></div>
								</a>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->
<style>
    @keyframes popup {
        0% {
            transform: scale(0); 
            opacity: 0;         
        }
        50% {
            transform: scale(1.2);
            opacity: 1;           
        }
        100% {
            transform: scale(1);  
        }
    }

    /* Căn giữa nội dung */
    .center-content {
        display: flex;
        justify-content: center;  
        align-items: center;     
        height: 80vh;             
        text-align: center;       
        padding: 10px;           
    }

    .popup {
        display: inline-block;
        animation: popup 1s ease-out forwards; 
    }

 
    body {
        margin: 0;
    }

    .container {
        padding-top: 5px;   
        padding-bottom: 5px; 
    }
</style>

<div class="container mt-5">
    <div class="center-content">
        <div>
            <h1 class="mb-4 popup">Thanh toán thành công</h1>
            <p>
                <a href="<?= ROOT_URL_ ?>">Quay trở lại trang chủ </a><br>
            </p>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "./views/clients/footer.php" ?>
