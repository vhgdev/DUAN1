<?php

class HomeController
{
    public function index()
    {   
        $product = new Product;
       
        //lấy danh mục
        $categories = (new Category)->all();

      
    }
}