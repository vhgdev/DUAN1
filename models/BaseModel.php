<?php
class BaseModel{
    //Thuộc tính lưu trữ đối tượng
    public $conn = null;

    public function __construct(){
        try{
             $this -> conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8;port=3306", "root" ,"");
             
        }catch(PDOException $e){
            echo "Lỗi kết nối cơ sở dữ liệu" . $e->getMessage();
        }
    }

    // Thực thi câu lệnh SELECT trả về nhiều dòng
public function pdo_query($sql, ...$params) {
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// SELECT một dòng duy nhất
public function pdo_query_one($sql, ...$params) {
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Thực thi các câu lệnh INSERT, UPDATE, DELETE
public function pdo_execute($sql, ...$params) {
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params);
}
    
}