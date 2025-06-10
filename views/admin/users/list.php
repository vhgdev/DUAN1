<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Hoạt động</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">
                    Cập nhật
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>

                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                        <?php if ($user['active'] == 1) : ?>
                            <span class="badge bg-success">
                                Hoạt động
                            </span>
                        <?php else : ?>
                            <span class="badge bg-danger">
                                Khóa
                            </span>
                        <?php endif ?>
                    </td>
                    <td><?= $user['address'] ?></td>
                    <td>
                        <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post">

                            <input type="hidden" name="id" value="<?= $user['id'] ?>">

                            <input type="hidden" name="active" value="<?= $user['active'] ?>">

                            <?php if ($user['role'] != 'admin') : ?>
                                <?php if (isset($user['active']) && $user['active'] == 1) : ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-lock-fill"></i> Khóa
                                    </button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-unlock-fill"></i> Kích hoạt
                                    </button>
                                <?php endif ?>
                            <?php endif ?>

                        </form>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php";
