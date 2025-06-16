<?php include_once ROOT_DIR . "views/admin/header.php" ?>


<h1>Trang dashboard admin</h1>

<div>
    <?php if ($message != '') : ?>
        <div class="mt-3 mb-3 alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>
    <form class="mt-3" action="<?= ADMIN_URL . '?ctl=updatedm' ?>" method="post">
        <div class="mb-3">
            <label for="">Tên danh mục</label>
            <input type="text" name="cate_name" value="<?= $category['cate_name'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Loại sản phẩm</label> <br>
            <input type="radio" name="type" value="1" <?= $category['type'] ? 'checked' : '' ?> id=""> Điện thoại
            <input type="radio" name="type" value="0" <?= $category['type'] == 0 ? 'checked' : '' ?>> Phụ kiện
        </div>
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>