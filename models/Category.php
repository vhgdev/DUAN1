<?php

//Lớp Category dùng để tương tác với bảng categories
class Category extends BaseModel{
 // Phương thức lấy toàn bộ bản ghi
 public function all(){
        /**
         * @soft_delete=0: không xóa
         * @soft_delete=1: đã xóa
         */
   $sql = "SELECT * FROM categories WHERE soft_delete=0";
   //Chuẩn bị
   $stmt = $this->conn->prepare($sql);
   //Thực thi lệnh truy vấn
   $stmt->execute();
        //lấy dữ liệu trả về cho hàm
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }   

 //Thêm sản phẩm
 public function create($data)
    {
        $sql = "INSERT INTO categories(cate_name, type) VALUES(:cate_name, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    /**
     * Cập nhật dữ liệu
     * @id: mã danh mục cần cập nhật
     * @data: mảng dữ liệu cần cập nhật
     */
    public function update($id, $data)
    {
        $sql = "UPDATE categories SET cate_name=:cate_name, type=:type WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //Thêm id và mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    /**
     * Hàm xóa, là xoa mềm dữ liệu chỉ chuyển đổi trang thái chứ không xóa khỏi CSDL
     * trang thái soft_delete=1
     * @id: mã danh mục cần xóa
     */
    public function delete($id)
    {
        $sql = "UPDATE categories SET soft_delete=1 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    /**
     * Hàm lấy 1 bản ghi theo id
     */
    public function find($id)
    {
        $sql = "SELECT * FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        //lấy ra 1 bản ghi
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
