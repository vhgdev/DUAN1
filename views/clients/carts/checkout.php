<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>LAPTOP 8386</title>

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
								<img src="images/logo-removebg-preview (1).png" alt="" width="290px" height="65px">
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

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li class="active">Checkout</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<form action="<?= ROOT_URL_ . '?ctl=checkout' ?>" method="POST">
				<div class="row">
					<!-- Order Details -->
					<div class="col-md-12 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Tên sản phẩm</th>
										<th scope="col">Giá</th>
										<th scope="col">Số lượng</th>
										<th scope="col">Thành tiền</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($carts as $id => $cart) : ?>
										<tr>
											<th scope="row"><?= $id ?></th>
											<td>
												<img src="<?= $cart['image'] ?>" alt="<?= $cart['name'] ?>" class="img-thumbnail" style="width: 80px; height: auto;">
											</td>
											<td><?= $cart['name'] ?></td>
											<td><?= number_format($cart['price']) ?> VNĐ</td>
											<td><?= $cart['quantity'] ?></td>
											<td><?= number_format($cart['price'] * $cart['quantity']) ?> VNĐ</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="order-col">
							<div>
								<h4><strong>Tổng tiền</strong></h4>
							</div><br>
							<div>
								<h2 style="color: #D9534F"><?= number_format($sumPrice) ?> VNĐ</h2><strong class="order-total"></strong>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment_method" id="bank" value="bank" required>
								<label for="bank">
									<span></span>
									Chuyển khoản ngân hàng
								</label>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment_method" id="cod" value="cod" required>
								<label for="cod">
									<span></span>
									Thanh toán khi nhận hàng (COD)
								</label>
							</div>
						</div>
						<button type="submit" class="primary-btn order-submit">Thanh toán</button>
					</div>
					<!-- /Order Details -->

					<!-- Billing Details -->
					<div class="col-md-12">
						<div class="billing-details">
							<div class="section-title">
								<br>
								<h3 class="title">Billing Address</h3>
							</div>
							<input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id'] ?? '') ?>">
							<div class="form-group">
								<label for="fullName" class="form-label">Họ và tên</label>
								<input class="input" type="text" name="fullname" placeholder="Họ và tên" value="<?= htmlspecialchars($user['fullname'] ?? '') ?>" required>
							</div>
							<div class="form-group">
								<label for="email" class="form-label">Email</label>
								<input class="input" type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
							</div>
							<div class="form-group">
								<label for="address" class="form-label">Địa chỉ</label>
								<input class="input" type="text" name="address" placeholder="Địa chỉ" value="<?= htmlspecialchars($user['address'] ?? '') ?>" required>
							</div>
							<div class="form-group">
								<label for="phone" class="form-label">Số điện thoại</label>
								<input class="input" type="tel" name="phone" placeholder="Số điện thoại" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" required>
							</div>
						</div>
					</div>
					<!-- /Billing Details -->
				</div>
			</form>
		</div>
	</div>
	<!-- /SECTION -->

	<?php include_once "views/clients/footer.php" ?>