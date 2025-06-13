<?php include_once ROOT_DIR . "views/admin/header.php" ?>


<h1>THÊM DANH MỤC</h1>



<div>
    <form action="<?= ADMIN_URL . '?ctl=storedm' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Tên danh mục</label>
            <input type="text" name="cate_name" id="" class="form-control">

        </div>

        <div class="mb-3">
            <label for="">Loại sản phẩm</label> <br>
            <input type="radio" name="type" value="1" checked id=""> Điện thoại
            <input type="radio" name="type" value="0" id=""> Phụ kiện
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>