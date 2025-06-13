<?php
require_once __DIR__ . '/../env.php';

class Coupon {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8;port=3306", "root", "");
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM coupons ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->conn->prepare("INSERT INTO coupons (code, discount_type, discount_value, expiry_date, created_at) VALUES (:code, :discount_type, :discount_value, :expiry_date, NOW())");
        $stmt->execute([
            ':code' => $data['code'],
            ':discount_type' => $data['discount_type'],
            ':discount_value' => $data['discount_value'],
            ':expiry_date' => $data['expiry_date']
        ]);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM coupons WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $data) {
        $stmt = $this->conn->prepare("UPDATE coupons SET code = :code, discount_type = :discount_type, discount_value = :discount_value, expiry_date = :expiry_date WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':code' => $data['code'],
            ':discount_type' => $data['discount_type'],
            ':discount_value' => $data['discount_value'],
            ':expiry_date' => $data['expiry_date']
        ]);
    }

    public function deleteData($id) {
        $stmt = $this->conn->prepare("DELETE FROM coupons WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function findByCode($code)
{
    $sql = "SELECT * FROM coupons WHERE code = :code";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['code' => $code]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


    
    
}
?>