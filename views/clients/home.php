<?php include_once ROOT_DIR . "views/clients/header.php" ?>


<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success_message']; ?>
        <?php unset($_SESSION['success_message']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error_message']; ?>
        <?php unset($_SESSION['error_message']); ?>
    </div>
<?php endif; ?>


<!-- NỘI DUNG TRANG CHỦ -->
<!-- Ví dụ: slide, danh sách sản phẩm,... -->


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row" >
<div class="section">
  <style>
    .banner-container {
      position: relative;
      width: 100%;
      height: 400px;
      overflow: hidden;
    }

    .banner-slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      transition: opacity 1s ease-in-out;
      object-fit: cover;
      z-index: 0;
    }

    .banner-slide.active {
      opacity: 1;
      z-index: 1;
    }
  </style>

  <div class="row banner-container">
    <div class="banner-container">
      <img class="banner-slide" src="./images/banner1.jpg" alt="Banner 1">
      <img class="banner-slide" src="./images/banner2.jpg" alt="Banner 2">
      <img class="banner-slide" src="./images/banner3.jpg" alt="Banner 3">
    </div>
  </div>
</div>



			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">iphone</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Sản phẩm -->

			<?php
			// Giới hạn hiển thị 4 sản phẩm
			$iphoneToDisplay = array_slice($iphones, 0, 4);
			?>
			<div class="container mt-5">
				<div class="row g-4">
					<?php foreach ($iphoneToDisplay as $iphone) : ?>
						<!-- Box Sản Phẩm -->
						<div class="col-md-3">
							<div class="product-box">
								<div class="product-img">
									<img src="<?= ROOT_URL_ . $iphone['image'] ?>" alt="<?= $iphone['name'] ?>" loading="lazy">
								</div>
								<div class="product-body">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $iphone['id'] ?>">
										<h5 class="product-name"><?= $iphone['name'] ?></h5>
									</a>
									<div>
										<span class="product-price"><?= number_format($iphone['price']) ?> ₫</span>
									</div>
									<div class="product-buttons">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $iphone['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>


			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Ipad</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Sản phẩm -->

			<?php
			// Giới hạn hiển thị 4 sản phẩm
			$iPadToDisplay = array_slice($ipads, 0, 4);
			?>
			<div class="container mt-5">
				<div class="row g-4">
					<?php foreach ($iPadToDisplay as $ipad) : ?>
						<!-- Box Sản Phẩm -->
						<div class="col-md-3">
							<div class="product-box">
								<div class="product-img">
									<img src="<?= ROOT_URL_ . $ipad['image'] ?>" alt="<?= $ipad['name'] ?>" loading="lazy">
								</div>
								<div class="product-body">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $ipad['id'] ?>">
										<h5 class="product-name"><?= $ipad['name'] ?></h5>
									</a>
									<div>
										<span class="product-price"><?= number_format($ipad['price']) ?> ₫</span>
									</div>
									<div class="product-buttons">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $ipad['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>


			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Tai nghe</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Sản phẩm phụ kiện -->

				<?php
				// Giới hạn hiển thị 4 sản phẩm
				$headphoneToDisplay = array_slice($headphones, 0, 4);
				?>
				<div class="container mt-5">
					<div class="row g-4">
						<?php foreach ($headphoneToDisplay as $headphone) : ?>
							<!-- Box Sản Phẩm -->
							<div class="col-md-3">
								<div class="product-box">
									<div class="product-img">
										<img src="<?= ROOT_URL_ . $headphone['image'] ?>" alt="<?= $headphone['name'] ?>" loading="lazy">
									</div>
									<div class="product-body">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $headphone['id'] ?>">
											<h5 class="product-name"><?= $headphone['name'] ?></h5>
										</a>
										<div>
											<span class="product-price"><?= number_format($headphone['price']) ?> ₫</span>
										</div>
										<div class="product-buttons">
											<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $headphone['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

		<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Macbooks</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Sản phẩm phụ kiện -->

				<?php
				// Giới hạn hiển thị 4 sản phẩm
				$macbookToDisplay = array_slice($macbooks, 0, 4);
				?>
				<div class="container mt-5">
					<div class="row g-4">
						<?php foreach ($macbookToDisplay as $macbook) : ?>
							<!-- Box Sản Phẩm -->
							<div class="col-md-3">
								<div class="product-box">
									<div class="product-img">
										<img src="<?= ROOT_URL_ . $macbook['image'] ?>" alt="<?= $macbook['name'] ?>" loading="lazy">
									</div>
									<div class="product-body">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $macbook['id'] ?>">
											<h5 class="product-name"><?= $macbook['name'] ?></h5>
										</a>
										<div>
											<span class="product-price"><?= number_format($macbook['price']) ?> ₫</span>
										</div>
										<div class="product-buttons">
											<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $macbook['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<?php include_once ROOT_DIR . "views/clients/footer.php" ?>

	<script src="js/banner.js"></script>
