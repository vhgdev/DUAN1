<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <h2><br>Từ khóa tìm kiếm: <?= $keyword ?></h2>
    <div class="row g-4">
	<?php if($products)  : ?>
        <?php foreach ($products as $pro) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <div class="product-img">
                        <img src="<?= $pro['image'] ?>" alt="Product Image" >
                    </div>         
                    <div class="product-body">
                        <a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $pro['id'] ?>">
                            <h5 class="product-name"><?= $pro['name'] ?></h5>
                        </a>
                        <div>
                            <span class="product-price"><?= number_format($pro['price']) ?></span>
                        </div>
                        <div class="product-buttons">
                            <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
		<?php else  : ?>
			<div>Không tìm thấy sản phẩm nào<b><?=$keyword?></b></div>
			<?php endif ?>
    </div>

</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>