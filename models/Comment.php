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
        $sql = "SELECT p.id, p.name, COUNT(c.id) as count 
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

    // Tìm kiếm bình luận theo từ khóa
    public function searchComments($keyword)
    {
        $sql = "SELECT c.id, c.product_id, c.user_id, u.fullname, c.rating, c.content, c.created_at, p.name as product_name
                FROM comments c
                LEFT JOIN users u ON c.user_id = u.id
                LEFT JOIN products p ON c.product_id = p.id
                WHERE c.rating > 0 AND (c.content LIKE :keyword OR u.fullname LIKE :keyword OR p.name LIKE :keyword)
                ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa bình luận
public function delete($id)
{
    try {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $rowCount = $stmt->rowCount();
        error_log("Xóa bình luận ID: $id, Số hàng bị xóa: $rowCount");
        return $rowCount > 0;
    } catch (PDOException $e) {
        error_log("Lỗi xóa bình luận ID $id: " . $e->getMessage());
        throw $e;
    }
}
}
?>