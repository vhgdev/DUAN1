<?php
class RatingModel {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        $this->db = new PDO("mysql:host=localhost;dbname=duan1", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Lưu đánh giá vào cơ sở dữ liệu
    public function saveRating($userId, $content, $rating, $productId) {
        $query = "INSERT INTO ratings (user_id, content, rating, product_id, created_at) 
                  VALUES (:user_id, :content, :rating, :product_id, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'content' => $content,
            'rating' => $rating,
            'product_id' => $productId
        ]);
        return $this->db->lastInsertId();
    }

    // Lấy tất cả đánh giá cho một sản phẩm
    public function getRatingsByProduct($productId) {
        $query = "SELECT r.*, u.fullname FROM ratings r 
                  JOIN users u ON r.user_id = u.id 
                  WHERE r.product_id = :product_id 
                  ORDER BY r.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tính trung bình đánh giá và phân bố sao
    public function getRatingStats($productId) {
        $query = "SELECT AVG(rating) as avg_rating, 
                         SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as five_star,
                         SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) as four_star,
                         SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) as three_star,
                         SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) as two_star,
                         SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) as one_star
                  FROM ratings WHERE product_id = :product_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>