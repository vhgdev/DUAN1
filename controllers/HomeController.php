<?php

class HomeController
{
    
    public function index()
{    
    $iphones = (new Product)->listProductInCategory(16);
    $samsungs = (new Product)->listProductInCategory(17);
    $headphones = (new Product)->listProductInCategory(18);
    $keyboards = (new Product)->listProductInCategory(19);

    $categories = (new Category)->all();
    

    // // Debug
    // echo '<pre>';
    // var_dump($iphones);
    // var_dump($samsung);
    // var_dump($categories);
    // echo '</pre>';
    // exit; // Dừng để xem kết quả,

    return view("clients.home", compact("iphones",  "samsungs",  "headphones",  "keyboards",  "categories"));
}
}