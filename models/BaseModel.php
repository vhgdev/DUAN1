?<?php
class BaseModel {
    public $conn = null;
    protected $table; // Phải có để biết thao tác bảng nào

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8;port=3306", "root", "");
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

    // SELECT tất cả bản ghi
    public function all() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo_query($sql);
    }

    // SELECT 1 bản ghi theo id
    public function findById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->pdo_query_one($sql, $id);
    }

    // SELECT 1 bản ghi đầu tiên theo câu truy vấn tự do
    public function getFirst($sql, $params = []) {
        return $this->pdo_query_one($sql, ...$params);
    }

    // INSERT bản ghi mới
    public function create($data) {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));
        return $this->conn->lastInsertId();
    }

    // UPDATE bản ghi theo id
    public function update($id, $data) {
        $setClause = implode(', ', array_map(fn($key) => "$key = ?", array_keys($data)));
        $sql = "UPDATE {$this->table} SET $setClause WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([...array_values($data), $id]);
        return $stmt->rowCount();
    }

    // DELETE bản ghi theo id
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    // Các phương thức có sẵn trong BaseModel của bạn
    public function pdo_query($sql, ...$params) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pdo_query_one($sql, ...$params) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function pdo_execute($sql, ...$params) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }
}
