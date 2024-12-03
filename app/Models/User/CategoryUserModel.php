<?php
class CategoryUserModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getCategoryDashboard(){
        $sql = "select * from categories";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Đảm bảo kiểu dữ liệu
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ); // Trả về đối tượng thay vì mảng
        return $result ?: null; // Trả về null nếu không tìm thấy
    }
}