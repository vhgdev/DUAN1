<?php

require_once __DIR__ . "/../env.php";
require_once __DIR__ . "/../common/function.php";

//Require models
require_once __DIR__ . "/../models/BaseModel.php";
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Product.php";

//Require controllers
require_once __DIR__ . "/../controllers/admin/AdminProductController.php";

$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    '' => view("admin.dashboard"),
    'listsp' => (new AdminProductController)->index(),
};