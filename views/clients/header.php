<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Điện thoại hay</title>

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
					<li><a href="#"> fptedu@email.com</a></li>
					<li><a href="#"> Trịnh Văn Bô</a></li>
				</ul>
				<div class="dropdown pull-right">
					<button class="btn btn-link dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; text-decoration: none;">
						<?= $_SESSION['user']['fullname'] ?? 'Tài khoản' ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="userMenu">
						<?php if (isset($_SESSION['user'])) : ?>
							<?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') : ?>
								<li><a href="<?= ADMIN_URL ?>"> Trang quản trị</a></li>
							<?php endif; ?>
							<li><a href="<?= ROOT_URL_ . '?ctl=list-order' ?>"> Lịch sử đơn hàng</a></li>
							<li><a href="<?= ROOT_URL_ . '?ctl=change-password' ?>"> Đổi mật khẩu</a></li>
							<li><a href="<?= ROOT_URL_ . '?ctl=logout' ?>"> Đăng xuất</a></li>
						<?php else : ?>
							<li><a href="<?= ROOT_URL_ . '?ctl=login' ?>"> Đăng nhập</a></li>
							<li><a href="<?= ROOT_URL_ . '?ctl=register' ?>"> Đăng ký</a></li>
						<?php endif; ?>
					</ul>
				</div>
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

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="index.php">Trang chủ</a></li>
					<li>
						<?php foreach ($categories as $cate) : ?>
					<li>
						<a href="<?= ROOT_URL_ . '?ctl=category&id=' . $cate['id'] ?>">
							<?= $cate['cate_name'] ?></a>
					</li>


				<?php endforeach ?></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->