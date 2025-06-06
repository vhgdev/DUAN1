<?php

class ProductController
{
    public function index()
    {
        //lấy id
        $id = $_GET['id'];
        //lấy sản phẩm theo danh mục id
        $products = (new Product)->listProductInCategory($id);

        //Lấy tên danh mục
        $title = $products[0]['cate_name'] ?? '';

        $categories = (new Category)->all();

        // Lưu thông tin URI VÀO SESSION
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        return view(
            'clients.category.category',
            compact('products', 'categories', 'title')
        );
    }
    
    // Chi tiết sản phẩm 
    public function show() {
        $id = $_GET['id']; //id sản phẩm

        $product = (new Product)->find($id);

        //Thêm comment
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $data = $_POST;
            //Thêm product_id và user_id
            $data['product_id'] = $id;
            $data['user_id'] = $_SESSION['user']['id'];
            (new Comment) ->create($data);
        }

        $categories = (new Category)->all();

        $title = $product['name'] ?? "";

        //Danh sách sản phẩm
        $productReleads = (new Product)->listProductReload($product['category_id'], $id);
        
        //Lưu thông tin url
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        $_SESSION['totalQuantity'] = (new CartController)->totalQuantityInCart();
        // Lấy danh sách commit
        $comments = (new Comment)->listCommentInProduct($id);
        return view(
            'clients.products.detail',
            compact('product','categories','title','productReleads', 'comments')
        );
    }

    public function list()
    {
        $id = $_GET['id'];
        $products = (new Product)->listProductInCategory($id);

        $category_name = ( new Category ) -> find($id)['cate_name'];

        $categories = ( new Category )-> all();
        $title = $category_name;

        return view('clients.products.list', compact('products', 'category_name', 'title', 'categories'));
    }
}