<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <br><h2 class="mt-5"><?= $category_name ?></h2>
    <div class="row g-4">
        <?php foreach ($products as $product) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <div class="product-img">
                        <img src="<?= ROOT_URL_. $product['image'] ?>" alt="Product Image" >
                    </div>         
                    <div class="product-body">
                        <a href="<?= ROOT_URL_ . '?ctl=detail&id=' . $product['id'] ?>">
                            <h5 class="product-name"><?= $product['name'] ?></h5>
                        </a>
                        <div>
                            <span class="product-price"><?= number_format($product['price']) ?> VNĐ</span>
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

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>