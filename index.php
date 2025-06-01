<?php
require_once __DIR__ . "/env.php";

require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";


require_once __DIR__ . "/controllers/HomeController.php";



$ctl = $_GET['ctl'] ?? '';
//demo category
// $cate = new Category();
// $data= [
//     'cate_name' => 'Danh mục 1',
//     'type' => '1'
// ];
// //thêm dữ liệu
// $cate->create($data);

// //hiển thị dữ liệu
// echo "<pre>";
// var_dump($cate->all());

// demo prouduct
// $product = new Product();
// $data = [
//     'name' => 'Sản phẩm 1',
//     'image' => '',
//     'price' => 100000,
//     'quantity' => 10,
//     'description' => 'Mô tả sản phẩm 1',
//     'status' => 1,
//     'category_id' => 1
// ];

// // Thêm sản phẩm
// $product->create($data);

// //Hiien thi
// echo "<pre>";
// var_dump($product->all());


match($ctl) {
    '', 'home' => (new HomeController)->index(),
    default => view( 'errors.404'),
};