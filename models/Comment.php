<?php
class Comment extends BaseModel
{
    // Hiển thị bình luận theo sản phẩm
    public function listCommentInProduct($product_id)
    {
        $sql = "SELECT c.*, u.fullname FROM comments c 
                JOIN users u ON u.id = c.user_id 
                WHERE c.product_id = :product_id 
                ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hiển thị các sản phẩm có bình luận
    public function listProductHasComments()
    {
        $sql = "SELECT p.id, p.name, COUNT(c.id) 'count' 
                FROM products p 
                JOIN comments c ON p.id = c.product_id 
                GROUP BY p.id, p.name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bình luận và đánh giá
    public function create($data)
    {
        $sql = "INSERT INTO comments (user_id, product_id, content, rating, created_at) 
                VALUES (:user_id, :product_id, :content, :rating, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'content' => $data['content'],
            'rating' => $data['rating']
        ]);
    }

    // Lấy thống kê đánh giá
    public function getRatingStats($product_id)
    {
        $sql = "SELECT AVG(rating) as avg_rating, 
                       SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as five_star,
                       SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) as four_star,
                       SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) as three_star,
                       SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) as two_star,
                       SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) as one_star
                FROM comments 
                WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : [
            'avg_rating' => 0,
            'five_star' => 0,
            'four_star' => 0,
            'three_star' => 0,
            'two_star' => 0,
            'one_star' => 0
        ];
    }
}
?>