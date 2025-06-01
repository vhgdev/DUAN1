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
}