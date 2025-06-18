<?php
class RatingController {
    private $ratingModel;

    public function __construct() {
        $this->ratingModel = new RatingModel();
    }

    // Xử lý gửi đánh giá
    public function submitRating() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . ROOT_URL_ . "?ctl=login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'];
            $content = $_POST['content'];
            $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
            $productId = $_POST['product_id']; // Giả định có product_id được gửi

            if ($rating >= 1 && $rating <= 5 && !empty($content)) {
                $this->ratingModel->saveRating($userId, $content, $rating, $productId);
                header("Location: " . ROOT_URL_ . "?ctl=product&act=detail&id=" . $productId);
                exit();
            } else {
                // Xử lý lỗi (ví dụ: rating không hợp lệ)
                $_SESSION['error'] = "Vui lòng chọn số sao và nhập nội dung bình luận.";
            }
        }
    }

    // Lấy dữ liệu để hiển thị
    public function getRatingData($productId) {
        $comments = $this->ratingModel->getRatingsByProduct($productId);
        $stats = $this->ratingModel->getRatingStats($productId);
        return [
            'comments' => $comments,
            'stats' => $stats
        ];
    }
}
?>