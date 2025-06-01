<?php
//Controller điều khiển phần product trong admin
class AdminProductController
{
    public function index()
    {
        $products = (new Product)->all();

        
        return view('admin.products.list', compact('products'));
    }
}