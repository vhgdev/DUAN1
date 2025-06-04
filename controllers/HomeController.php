<?php

class HomeController
{
    public function index()
    {   
        $product = new Product;
       
        //lấy danh mục

        $phones = (new Product)->listProductInCategory(1); // Danh sach san pham laptop
        $products = (new Product)->listProductInCategory(2); // Danh sach san pham phu kien

        $categories = (new Category)->all();


        return view("clients.home", compact("phones", "products", "categories"));
      
    }
}