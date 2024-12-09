<?php

class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm
    public function addProduct($name, $description, $price, $imagePath, $category_id) {
        $sql = "INSERT INTO products (name, description, price, image, category_id, created_at)
                VALUES (:name, :description, :price, :image, :category_id, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image' => $imagePath,
            ':category_id' => $category_id
        ]);
    }
    

    // Cập nhật sản phẩm
    public function updateProduct($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['description'], $data['price'], $data['image'], $data['category_id'], $id]);
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
