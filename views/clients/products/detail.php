<?php include_once ROOT_DIR . "./views/clients/header.php" ?>
<!-- Thêm Bootstrap Icons vào header.php nếu chưa có -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div id="breadcrumb" class="section">
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div>
				<h1>Chi tiết sản phẩm</h1>
			</div>

			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2 col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
						<div class="product-preview">
							<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
						</div>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?= htmlspecialchars($product['name']) ?></h2>
						<div class="rating-card p-2">
							<div class="star-rating" style="display: inline-block;">
								<?php
								$avgRating = round($stats['avg_rating']);
								for ($i = 5; $i >= 1; $i--) {
									echo '<input type="radio" id="prod-star' . $i . '" name="prod-rating" value="' . $i . '" ' . ($i <= $avgRating ? 'checked' : '') . ' style="display: none;">';
									echo '<label for="prod-star' . $i . '" class="bi ' . ($i <= $avgRating ? 'bi-star-fill' : 'bi-star') . '" style="color: ' . ($i <= $avgRating ? '#ffc107' : '#ddd') . '; font-size: 24px; padding: 0 2px;"></label>';
								}
								?>
							</div>
						</div>
						<div>
							<h2 class="product-price"><?= number_format($product['price']) ?> VNĐ</h2>
							<?php if ($product['quantity'] > 0) : ?>
								<span class="product-available">Còn hàng</span>
							<?php else : ?>
								<span class="product-available">Hết hàng</span>
							<?php endif ?>
						</div>
						<p><?= htmlspecialchars($product['description']) ?></p>
						<hr>

						<div class="add-to-cart">
							<div class="qty-label">
								Số lượng
								<div class="input-number">
									<input type="number" id="quantity" name="quantity" value="1" min="1" max="100" required>
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<a href="<?= ROOT_URL_ . '?ctl=add-cart&id=' . $product['id'] ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
						</div>
					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Mô tả sản phẩm</a></li>
							<li><a data-toggle="tab" href="#tab3">Bình luận</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1 -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?= htmlspecialchars($product['description']) ?></p>
									</div>
								</div>
							</div>
							<!-- /tab1 -->

							<!-- tab3 -->
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span><?= number_format($stats['avg_rating'], 1) ?></span>
												<div class="star-rating" style="display: inline-block;">
													<?php
													$avgRating = round($stats['avg_rating']);
													for ($i = 5; $i >= 1; $i--) {
														echo '<input type="radio" id="avg-star' . $i . '" name="avg-rating" value="' . $i . '" ' . ($i <= $avgRating ? 'checked' : '') . ' style="display: none;">';
														echo '<label for="avg-star' . $i . '" class="bi ' . ($i <= $avgRating ? 'bi-star-fill' : 'bi-star') . '" style="color: ' . ($i <= $avgRating ? '#ffc107' : '#ddd') . '; font-size: 24px; padding: 0 2px;"></label>';
													}
													?>
												</div>
											</div>
											<ul class="rating">
												<?php
												$ratings = [
													5 => $stats['five_star'],
													4 => $stats['four_star'],
													3 => $stats['three_star'],
													2 => $stats['two_star'],
													1 => $stats['one_star']
												];
												$totalRatings = array_sum($ratings);
												foreach ($ratings as $star => $count) {
													$width = $totalRatings > 0 ? ($count / $totalRatings * 100) : 0;
												?>
													<li>
														<div class="star-rating" style="display: inline-block;">
															<?php
															for ($i = 5; $i >= 1; $i--) {
																echo '<input type="radio" id="stat-star' . $star . '-' . $i . '" name="stat-rating-' . $star . '" value="' . $i . '" ' . ($i <= $star ? 'checked' : '') . ' style="display: none;">';
																echo '<label for="stat-star' . $star . '-' . $i . '" class="bi ' . ($i <= $star ? 'bi-star-fill' : 'bi-star') . '" style="color: ' . ($i <= $star ? '#ffc107' : '#ddd') . '; font-size: 20px; padding: 0 2px;"></label>';
															}
															?>
														</div>
														<div class="rating-progress">
															<div style="width: <?= $width ?>%; background-color: #D10024;"></div>
														</div>
														<span class="sum"><?= $count ?></span>
													</li>
												<?php
												}
												?>
											</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews Bình luận -->
									<div class="col-md-6">
										<div id="reviews" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 15px;">
											<?php if (!empty($comments)): ?>
												<ul class="reviews">
													<?php foreach ($comments as $comment): ?>
														<li style="margin-bottom: 15px;">
															<div class="review-heading">
																<h5 class="name"><?= htmlspecialchars($comment['fullname']) ?></h5>
																<p class="date"><?= date('d-m-Y H:i:s', strtotime($comment['created_at'])) ?></p>
																<div class="star-rating" style="display: inline-block;">
																	<?php
																	for ($i = 5; $i >= 1; $i--) {
																		echo '<input type="radio" id="comment-star' . $comment['id'] . '-' . $i . '" name="comment-rating-' . $comment['id'] . '" value="' . $i . '" ' . ($i <= $comment['rating'] ? 'checked' : '') . ' style="display: none;">';
																		echo '<label for="comment-star' . $comment['id'] . '-' . $i . '" class="bi ' . ($i <= $comment['rating'] ? 'bi-star-fill' : 'bi-star') . '" style="color: ' . ($i <= $comment['rating'] ? '#ffc107' : '#ddd') . '; font-size: 20px; padding: 0 2px;"></label>';
																	}
																	?>
																</div>
															</div>
															<div class="review-body">
																<p><?= htmlspecialchars($comment['content']) ?></p>
															</div>
														</li>
													<?php endforeach; ?>
												</ul>
											<?php else: ?>
												<p>Chưa có bình luận nào.</p>
											<?php endif; ?>
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<?php if (isset($_SESSION['user'])): ?>
										<div class="col-md-3">
											<div id="review-form">
												<?php if (isset($_SESSION['error'])): ?>
													<p style="color: red;"><?= $_SESSION['error'] ?></p>
													<?php unset($_SESSION['error']); ?>
												<?php endif; ?>
												<?php if (isset($_SESSION['success'])): ?>
													<p style="color: green;"><?= $_SESSION['success'] ?></p>
													<?php unset($_SESSION['success']); ?>
												<?php endif; ?>
												<form method="post">
													<textarea name="content" rows="3" cols="60" required placeholder="Viết bình luận của bạn..."></textarea>
													<div class="input-rating">
														<span>Đánh giá của bạn: </span>
														<div class="star-rating">
															<?php for ($i = 5; $i >= 1; $i--): ?>
																<input type="radio" id="form-star<?= $i ?>" name="rating" value="<?= $i ?>" required>
																<label for="form-star<?= $i ?>" class="bi bi-star-fill" style="color: #ddd; font-size: 24px; padding: 0 2px;"></label>
															<?php endfor; ?>
														</div>
													</div>
													<button type="submit" class="primary-btn">Gửi</button>
												</form>
											</div>
										</div>
									<?php else: ?>
										<div class="col-md-3">
											<div>Bạn cần <b><a href="<?= ROOT_URL_ . '?ctl=login' ?>">đăng nhập</a></b> để bình luận và đánh giá</div>
										</div>
									<?php endif; ?>
									<!-- /Review Form -->
								</div>
							</div>
							<!-- /tab3 -->
						</div>
						<!-- /product tab content -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="container mt-5">
		<h2 class="mt-5">Các sản phẩm liên quan</h2>
		<div class="row g-4">
			<?php foreach ($productReleads as $pro) : ?>
				<!-- Box Sản Phẩm -->
				<div class="col-md-3">
					<div class="product-box">
						<div class="product-img">
							<img src="<?= htmlspecialchars($pro['image']) ?>" alt="<?= htmlspecialchars($pro['name']) ?>">
						</div>
						<div class="product-body">
							<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $pro['id'] ?>">
								<h5 class="product-name"><?= htmlspecialchars($pro['name']) ?></h5>
							</a>
							<div>
								<span class="product-price"><?= number_format($pro['price']) ?> VNĐ</span>
							</div>
							<div class="product-buttons">
								<button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<!-- /Section -->

	<?php include_once ROOT_DIR . "./views/clients/footer.php" ?>

	<!-- Thêm style và script vào cuối body -->
	<style>
		.star-rating {
			direction: rtl;
			display: inline-block;
			cursor: pointer;
		}

		.star-rating input {
			display: none;
		}

		.star-rating label {
			color: #ddd;
			font-size: 24px;
			padding: 0 2px;
			cursor: pointer;
			transition: all 0.2s ease;
		}

		.star-rating label:hover,
		.star-rating label:hover~label,
		.star-rating input:checked~label {
			color: #ffc107 !important;
		}

		.star-rating label.bi {
        transition: all 0.2s ease;
    }
	</style>

	<script>
		document.querySelectorAll('.star-rating:not(.readonly) label').forEach(star => {
			star.addEventListener('click', function() {
				this.style.transform = 'scale(1.2)';
				setTimeout(() => {
					this.style.transform = 'scale(1)';
				}, 200);
			});
		});
	</script>