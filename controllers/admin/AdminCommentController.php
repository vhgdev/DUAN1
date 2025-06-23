<?php
require_once __DIR__ . '/../../env.php';
require_once __DIR__ . '/../../models/Comment.php';

class AdminCommentController
{

    public function __construct()
    {
        $user = $_SESSION['user'] ?? [];
        if (!$user || $user['role'] !== 'admin') {
            header("Location: " . ROOT_URL_);
            exit; // Dừng chương trình ngay lập tức
        }
    }

    // Hiển thị danh sách bình luận
    public function index()
    {   
        // Lấy từ khóa tìm kiếm
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        // Tạo model Comment
        $commentModel = new Comment();
        if ($keyword) {
            // Tìm kiếm bình luận theo từ khóa
            $comments = $commentModel->searchComments($keyword);
        } else {

            // Lấy danh sách sản phẩm có bình luận để hiển thị
            $products = $commentModel->listProductHasComments();
            $comments = [];
            foreach ($products as $product) {
                $productComments = $commentModel->listCommentInProduct($product['id']);
                $comments = array_merge($comments, $productComments);
            }
            // Sắp xếp lại theo created_at
            usort($comments, function ($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
        }

        // Lấy thống kê đánh giá (tổng hợp từ tất cả sản phẩm)
        $stats = $commentModel->getRatingStats(null); // Sử dụng null để lấy tổng hợp

        // Truyền dữ liệu vào view
        return view('admin.comment.list', compact('comments', 'stats'));
    }

    // Xóa bình luận
    public function delete()
    {
        // Kiểm tra id bình luận
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            // ID không tồn tại
            $_SESSION['error'] = 'ID bình luận không hợp lệ';
            header('Location: ' . ADMIN_URL . '?ctl=list-comment');
            exit;
        }

        $commentId = (int)$_GET['id'];

        // Khởi tạo model
        $commentModel = new Comment();
        try {
            error_log("Đang xóa bình luận ID: $commentId");
            if ($commentModel->delete($commentId)) {
                $_SESSION['success'] = 'Xóa bình luận thành công';
            } else {
                $_SESSION['error'] = 'Không tìm thấy bình luận với ID ' . $commentId;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Lỗi cơ sở dữ liệu: ' . $e->getMessage();
            error_log("Lỗi xóa bình luận ID $commentId: " . $e->getMessage());
        } catch (Exception $e) {
            $_SESSION['error'] = 'Lỗi hệ thống: ' . $e->getMessage();
            error_log("Lỗi hệ thống ID $commentId: " . $e->getMessage());
        }


        // Chuyển hướng về trang danh sách bình luận
        header('Location: ' . ADMIN_URL . '?ctl=list-comment');
        exit;
    }
}
