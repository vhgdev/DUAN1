<?php

class HomeController
{
    
    public function index()
{    
    $iphones = (new Product)->listProductInCategory(16);
    $ipads = (new Product)->listProductInCategory(17);
    $macbooks = (new Product)->listProductInCategory(18);
    $headphones = (new Product)->listProductInCategory(19);

    $categories = (new Category)->all();

    // // Debug
    // echo '<pre>';
    // var_dump($iphones);
    // var_dump($samsung);
    // var_dump($categories);
    // echo '</pre>';
    // exit; // Dừng để xem kết quả,

    return view("clients.home", compact("iphones",  "ipads",  "macbooks",  "headphones",  "categories"));
}
}