<?php
class CommentController {
    public function store() {
        session_start();
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?ctl=login');
            exit;
        }

        $productId = $_POST['product_id'];
        $userId = $_SESSION['user']['id'];
        $rating = $_POST['rating'];
        $comment = trim($_POST['comment']);

        if ($rating < 1 || $rating > 5) {
            echo "Số sao không hợp lệ.";
            return;
        }

        $model = new Comment();
        $model->add($productId, $userId, $rating, $comment);

        header("Location: index.php?ctl=detail&id=$productId");
    }
}
