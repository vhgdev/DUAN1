

<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="col-md-12 p-4">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <h2 class="mb-0">CHỈNH SỬA SẢN PHẨM</h2>
                    <a href="<?= ADMIN_URL . '?ctl=listsp' ?>" class="btn btn-light btn-sm">Quay lại danh sách</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label fw-bold">Danh mục</label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option value="" disabled>Chọn danh mục</option>
                                        <?php foreach ($categories as $cate) : ?>
                                            <option value="<?= $cate['id'] ?>" <?= $product['category_id'] == $cate['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cate['cate_name']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label fw-bold">Hình ảnh</label><br>
                                    <img src="<?= ROOT_URL_ . $product['image'] ?>" class="img-thumbnail" style="max-width: 80px; height: auto;" alt="<?= htmlspecialchars($product['name']) ?>">
                                    <input type="file" name="image" id="image" class="form-control mt-2" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-bold">Giá (VNĐ)</label>
                                    <input type="number" name="price" id="price" class="form-control" value="<?= $product['price'] ?>" placeholder="Nhập giá sản phẩm" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label fw-bold">Số lượng</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" value="<?= $product['quantity'] ?>" placeholder="Nhập số lượng" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Trạng thái kinh doanh</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" <?= $product['status'] ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status_active">Đang kinh doanh</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" <?= $product['status'] == 0 ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status_inactive">Ngừng kinh doanh</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Mô tả</label>
                                    <textarea name="description" id="description" rows="6" class="form-control" placeholder="Nhập mô tả sản phẩm" required><?= htmlspecialchars($product['description']) ?></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                    <a href="<?= ADMIN_URL . '?ctl=listsp' ?>" class="btn btn-secondary btn-sm">Hủy</a>
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