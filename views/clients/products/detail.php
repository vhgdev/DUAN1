<?php include_once ROOT_DIR . "./views/clients/header.php" ?>
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
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>

						<div class="product-preview">
							<img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
						</div>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?= $product['name'] ?></h2>
						<div sty>
							<span style="font-size:150%;color:#D10024;">★</span>
							<span style="font-size:150%;color:#D10024;">★</span>
							<span style="font-size:150%;color:#D10024;">★</span>
							<span style="font-size:150%;color:#D10024;">★</span>
							<span style="font-size:150%;color:#D10024;">★</span>
						</div>
						<div>
							<h2 class="product-price"><?= number_format($product['price']) ?> VNĐ</h2>
							<?php if ($product['quantity'] > 0) : ?>
								<span class="product-available">Còn hàng</span>
							<?php else : ?>
								<span class="product-available">Out of Stock</span>
							<?php endif  ?>
						</div>
						<p><?= $product['description'] ?></p>
								<hr>
						<!-- Bình luận -->
						<div class="comment">
						 <?php foreach ($comments as $comment):?>
							<p>
								<b><?= $comment['fullname']?></b> <?= date('d-m-Y H:i:s', strtotime($comment['create_at']))?> <br>
								<?= $comment['content']?>
							</p>
							<?php endforeach  ?>
							</div>
							<?php if(isset($_SESSION['user'])) :?>
								<form action="" method="post">
									<textarea name="content" rows="3" cols="60" required id=""></textarea>
									<br><button type="submit">Gửi</button>
								</form>
								<?php else:?>
									<div>Bạn cần<b><a href="<?= ROOT_URL_. '?ctl=login'?>"> Đăng nhập </a></b>để bình luận</div>
							<?php endif ?>


						<div class="add-to-cart">
							<div class="qty-label">
								Số lượng
								<div class="input-number">
									<input type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<a href="<?= ROOT_URL_ .  '?ctl=add-cart&id=' . $product['id'] ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
						</div>

					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab2">Details</a></li>
							<li><a data-toggle="tab" href="#tab3">Reviews</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?= $product['description'] ?></p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							<div id="tab2" class="tab-pane fade in">
								<div class="row">
									<div class="col-md-12">
										<!-- <p><?= $product['content'] ?></p> -->
									</div>
								</div>
							</div>
							<!-- /tab2  -->

							<!-- tab3  -->
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<!-- <div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>4.5</span>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<ul class="rating">
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 80%;"></div>
													</div>
													<span class="sum">3</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 60%;"></div>
													</div>
													<span class="sum">2</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
											</ul>
										</div>
									</div> -->
									<!-- /Rating -->

									<!-- Reviews Bình luận -->
									<div class="col-md-6">
										<div id="reviews">
											<?php foreach($comments as $comment): ?>
											<ul class="reviews">
												<li>
													<div class="review-heading">
														<h5 class="name"><?= $comment['fullname']?></h5>
														<p class="date"><?= date('d-m-Y H:i:s', strtotime($comment['created_at']))?></p>
													</div>
													<div class="review-body">
														<p><?= $comment['content']?></p>
													</div>
												</li>
											</ul>
											<?php endforeach ?>
											
											<!-- <ul class="reviews-pagination">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
											</ul> -->
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<?php if (isset($_SESSION['user'])): ?>
										<form action="" method="post">
											<textarea name="content" rows="3" cols="60" require id="content" placeholder="Write your comment here..."></textarea>
											<br>
											<button type="submit">Gửi</button>
										</form>
									<?php else: ?>
										<div>Bạn cần <b><a href="<?= ROOT_URL_ . '?ctl=login'?>"></a></b> để bình luận</div>
									<?php endif; ?>
									<!-- <div class="col-md-3">
										<div id="review-form">
											<form class="review-form">
												<input class="input" type="text" placeholder="Your Name">
												<input class="input" type="email" placeholder="Your Email">
												<textarea class="input" placeholder="Your Review"></textarea>
												<div class="input-rating">
													<span>Your Rating: </span>
													<div class="stars">
														<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
														<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
														<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
														<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
														<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div> -->
									<!-- /Review Form -->
								</div>
							</div>
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
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
		<!-- <h2 class="mt-5"><?= $title ?></h2> -->
		<div class="row g-4">
			<?php foreach ($productReleads as $pro) : ?>
				<!-- Box Sản Phẩm -->
				<div class="col-md-3">
					<div class="product-box">
						<div class="product-img">
							<img src="<?= $pro['image'] ?>" alt="Product Image">
						</div>
						<div class="product-body">
							<a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $pro['id'] ?>">
								<h5 class="product-name"><?= $pro['name'] ?></h5>
							</a>
							<div>
								<span class="product-price"><?= $pro['price'] ?></span>
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