<?php
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Comment.php';
require_once 'models/Rating.php';
require_once 'controllers/CartController.php';


class RatingController
{
    public function index()
    {
        // Lấy id
        $id = $_GET['id'];
        // Lấy sản phẩm theo danh mục id
        $products = (new Product)->listProductInCategory($id);

        // Lấy tên danh mục
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
    public function show()
    {
        // Lấy id sản phẩm
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Kiểm tra id hợp lệ
        if ($id <= 0) {
            $_SESSION['error'] = "Sản phẩm không hợp lệ.";
            header("Location: " . ROOT_URL_ . "?ctl=home");
            exit();
        }

        // Lấy chi tiết sản phẩm
        $product = (new Product)->find($id);
        if (!$product) {
            $_SESSION['error'] = "Sản phẩm không tồn tại.";
            header("Location: " . ROOT_URL_ . "?ctl=home");
            exit();
        }

        // Thêm bình luận và đánh giá
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!isset($_SESSION['user'])) {
                $_SESSION['error'] = "Vui lòng đăng nhập để bình luận.";
                header("Location: " . ROOT_URL_ . "?ctl=login");
                exit();
            }

            $data = $_POST;
            // Thêm product_id, user_id và rating
            $data['product_id'] = $id;
            $data['user_id'] = $_SESSION['user']['id'];
            $data['rating'] = isset($data['rating']) ? (int)$data['rating'] : 0;

            // Kiểm tra dữ liệu hợp lệ
            if ($data['rating'] >= 1 && $data['rating'] <= 5 && !empty($data['content'])) {
                (new Comment)->create($data);
                $_SESSION['success'] = "Bình luận và đánh giá đã được gửi.";
            } else {
                $_SESSION['error'] = "Vui lòng chọn số sao (1-5) và nhập nội dung bình luận.";
            }
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }

        // Lấy danh sách danh mục
        $categories = (new Category)->all();

        // Lấy tiêu đề
        $title = $product['name'] ?? "";

        // Danh sách sản phẩm liên quan
        $productReleads = (new Product)->listProductReload($product['category_id'], $id);
        
        // Lưu thông tin URL
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        // Lấy tổng số lượng trong giỏ hàng
        $_SESSION['totalQuantity'] = (new CartController)->totalQuantityInCart();

        // Lấy danh sách bình luận
        $comments = (new Comment)->listCommentInProduct($id);

        // Lấy thống kê đánh giá
        $stats = (new Comment)->getRatingStats($id);

        // Truyền dữ liệu vào view
        return view(
            'clients.products.detail',
            compact('product', 'categories', 'title', 'productReleads', 'comments', 'stats')
        );
    }

    public function list()
    {
        $id = $_GET['id'];
        $products = (new Product)->listProductInCategory($id);

        $category_name = (new Category)->find($id)['cate_name'];

        $categories = (new Category)->all();
        $title = $category_name;

        return view('clients.products.list', compact('products', 'category_name', 'title', 'categories'));
    }
}
?>