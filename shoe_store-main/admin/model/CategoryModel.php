<?php

class CategoryModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    // Lấy tất cả các category
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy category theo ID
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm category
    public function addCategory($name, $description) {
        $sql = "INSERT INTO categories (name, description, created_at) 
                VALUES (:name, :description, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':description' => $description]);
    }

    // Cập nhật category
    public function updateCategory($id, $name, $description) {
        $sql = "UPDATE categories SET name = :name, description = :description 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description
        ]);
    }

    // Xóa category
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
