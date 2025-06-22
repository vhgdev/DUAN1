<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">THÊM DANH MỤC</h2>
                    <a href="<?= ADMIN_URL . '?ctl=list-category' ?>" class="btn btn-light btn-sm">Quay lại danh sách</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= ADMIN_URL . '?ctl=storedm' ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="cate_name" class="form-label fw-bold">Tên danh mục</label>
                                    <input type="text" name="cate_name" id="cate_name" class="form-control" placeholder="Nhập tên danh mục" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Loại sản phẩm</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type_phone" value="1" checked>
                                        <label class="form-check-label" for="type_phone">Điện thoại</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type_accessory" value="0">
                                        <label class="form-check-label" for="type_accessory">Phụ kiện</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                                    <a href="<?= ADMIN_URL . '?ctl=list-category' ?>" class="btn btn-secondary btn-sm">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>