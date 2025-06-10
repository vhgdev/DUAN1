<?php include_once ROOT_DIR . "views/clients/header.php" ?>


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">phones</h3>
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
								<div class="product-info">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $iphone['id'] ?>">
										<h5 class="product-name"><?= $iphone['name'] ?></h5>
									</a>
									<div>
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
					<h3 class="title">Samsung</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Sản phẩm -->

			<?php
			// Giới hạn hiển thị 4 sản phẩm
			$SamsungToDisplay = array_slice($samsungs, 0, 4);
			?>
			<div class="container mt-5">
				<div class="row g-4">
					<?php foreach ($SamsungToDisplay as $samsung) : ?>
						<!-- Box Sản Phẩm -->
						<div class="col-md-3">
							<div class="product-box">
								<div class="product-img">
									<img src="<?= ROOT_URL_ . $samsung['image'] ?>" alt="<?= $samsung['name'] ?>" loading="lazy">
								</div>
								<div class="product-info">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $samsung['id'] ?>">
										<h5 class="product-name"><?= $samsung['name'] ?></h5>
									</a>
									<div>
								<div class="product-body">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $samsung['id'] ?>">
										<h5 class="product-name"><?= $samsung['name'] ?></h5>
									</a>
									<div>
										<span class="product-price"><?= number_format($samsung['price']) ?> ₫</span>
									</div>
									<div class="product-buttons">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $samsung['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
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
						<h3 class="title">Bàn phím</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Sản phẩm phụ kiện -->

				<?php
				// Giới hạn hiển thị 4 sản phẩm
				$keyboardToDisplay = array_slice($keyboards, 0, 4);
				?>
				<div class="container mt-5">
					<div class="row g-4">
						<?php foreach ($keyboardToDisplay as $keyboard) : ?>
							<!-- Box Sản Phẩm -->
							<div class="col-md-3">
								<div class="product-box">
									<div class="product-img">
										<img src="<?= ROOT_URL_ . $keyboard['image'] ?>" alt="<?= $keyboard['name'] ?>" loading="lazy">
									</div>
									<div class="product-body">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $keyboard['id'] ?>">
											<h5 class="product-name"><?= $keyboard['name'] ?></h5>
										</a>
										<div>
											<span class="product-price"><?= number_format($keyboard['price']) ?> ₫</span>
										</div>
										<div class="product-buttons">
											<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $keyboard['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
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