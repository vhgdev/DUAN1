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
					<h3 class="title">iPhone</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Sản phẩm -->

			<?php
			// Giới hạn hiển thị 4 sản phẩm
			$phonesToDisplay = array_slice($phones, 0, 4);
			?>
			<div class="container mt-5">
				<div class="row g-4">
					<?php foreach ($phonesToDisplay as $phone) : ?>
						<!-- Box Sản Phẩm -->
						<div class="col-md-3">
							<div class="product-box">
								<div class="product-img">
									<img src="<?= ROOT_URL_ . $phone['image'] ?>" alt="<?= $phone['name'] ?>" loading="lazy">
								</div>
								<div class="product-body">
									<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $phone['id'] ?>">
										<h5 class="product-name"><?= $phone['name'] ?></h5>
									</a>
									<div>
										<span class="product-price"><?= number_format($phone['price']) ?> ₫</span>
									</div>
									<div class="product-buttons">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $phone['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
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
						<h3 class="title">PHỤ KIỆN</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Sản phẩm phụ kiện -->

				<?php
				// Giới hạn hiển thị 4 sản phẩm
				$productsToDisplay = array_slice($products, 0, 4);
				?>
				<div class="container mt-5">
					<div class="row g-4">
						<?php foreach ($productsToDisplay as $product) : ?>
							<!-- Box Sản Phẩm -->
							<div class="col-md-3">
								<div class="product-box">
									<div class="product-img">
										<img src="<?= ROOT_URL_ . $product['image'] ?>" alt="<?= $product['name'] ?>" loading="lazy">
									</div>
									<div class="product-body">
										<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $product['id'] ?>">
											<h5 class="product-name"><?= $product['name'] ?></h5>
										</a>
										<div>
											<span class="product-price"><?= number_format($product['price']) ?> ₫</span>
										</div>
										<div class="product-buttons">
											<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $product['id'] ?>" class="btn btn-outline-success">Chi tiết sản phẩm</a>
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