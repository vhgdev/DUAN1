<?php
class Coupon extends BaseModel {
    protected $table = 'coupons';

    public function getAll() {
        return $this->all();
    }

    public function findByCode($code) {
        $sql = "SELECT * FROM $this->table WHERE code = ? LIMIT 1";
        return $this->getFirst($sql, [$code]);
    }

    public function find($id) {
        return $this->findById($id);
    }

    public function insert($data) {
        return $this->create($data);
    }

    public function updateData($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteData($id) {
        return $this->delete($id);
    }
}
