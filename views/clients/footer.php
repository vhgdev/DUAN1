<!-- FOOTER -->
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Về chúng tôi</h3>
								<p>Sản phẩm dự thi môn DỰ ÁN 1</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Trịnh Văn Bô</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+123456789</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>fptedu@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Danh mục</h3>
								<ul class="footer-links">
									<li><a href="#">Khuyến mại</a></li>
									<li><a href="#">Iphone</a></li>
									<li><a href="#">Phụ kiện điện thoại</a></li>
									<li><a href="#">Phụ kiện</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông tin</h3>
								<ul class="footer-links">
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Liên hệ</a></li>
									<li><a href="#">Điều khoản & điều kiện</a></li>
									<li><a href="#">Chính sách giao hàng và hoàn trả</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Dịch vụ</h3>
								<ul class="footer-links">
									<li><a href="#">Tài khoản của tôi</a></li>
									<li><a href="#">Xem giỏ hàng</a></li>
									<li><a href="#">Sản phẩm yêu thích</a></li>
									<li><a href="#">Theo dõi đơn hàng</a></li>
									<li><a href="#">Hỏi đáp tổng đài viên</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

		<script>
	btnSearch = document.getElementById('btnSearch')
	keyword = document.getElementById('keyword');

	btnSearch.addEventListener('click', function(){
		location.href="<?= ROOT_URL_ . '?ctl=search&keyword=' ?>" + keyword.value;
	})

	keyword.addEventListener('keypress', function(event){
		if(event.key =='Enter'){
			location.href="<?= ROOT_URL_ . '?ctl=search&keyword=' ?>" + keyword.value;
			event.preventDefault();
		}
	})
 </script>

	</body>
</html>
 