<?php
class SearchController {
    
    public function search(){
        $keyword = $_GET['keyword'] ?? '';
        $products = (new Product)->searchProductName($keyword);
        $categories = (new Category)->all();
        return view('clients.products.search', compact('products','categories','keyword'));
    }
}