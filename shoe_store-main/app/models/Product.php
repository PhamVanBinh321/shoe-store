<?php
class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    
    public function getAllProducts($offset = 0, $limit = 12) {
        $stmt = $this->pdo->prepare("
            SELECT p.*, AVG(r.ratings) as average_rating
            FROM products p
            LEFT JOIN comments r ON p.id = r.product_id
            GROUP BY p.id
            LIMIT :offset, :limit
        ");
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sortProducts($sortOption, $offset = 0, $limit = 12) {
        $query = "
            SELECT p.*, AVG(r.ratings) as average_rating
            FROM products p
            LEFT JOIN comments r ON p.id = r.product_id
            GROUP BY p.id
        ";
        
        switch($sortOption) {
            case 'price':
                $query .= " ORDER BY p.price ASC";
                break;
            case 'popularity':
                $query .= " ORDER BY p.popularity DESC";
                break;
            case 'rating':
                $query .= " ORDER BY average_rating DESC";
                break;
            case 'sale':
                $query .= " ORDER BY p.sale DESC";
                break;
        }

        $query .= " LIMIT :offset, :limit"; // Thêm phân trang vào truy vấn

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm phương thức để lấy tổng số sản phẩm
    public function getTotalProducts() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM products");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
     // Get product details by ID
    public function getProductById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get additional images for the product
    public function getProductImages($productId) {
        $stmt = $this->pdo->prepare('SELECT image_path FROM product_images WHERE product_id = :productId');
        $stmt->execute(['productId' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phương thức lấy tên danh mục dựa vào category_id
    public function getCategoryName($categoryId) {
        $stmt = $this->pdo->prepare("SELECT name FROM categories WHERE id = ?");
        $stmt->execute([$categoryId]);
        return $stmt->fetchColumn(); // Trả về tên danh mục
    }

    public function getRelatedProducts($categoryId, $productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id = ? AND id != ? LIMIT 4");
        $stmt->execute([$categoryId, $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchProducts($keyword) {
        $query = "SELECT p.*, AVG(r.ratings) as average_rating
                  FROM products p
                  LEFT JOIN comments r ON p.id = r.product_id
                  WHERE p.name LIKE :keyword OR p.description LIKE :keyword
                  GROUP BY p.id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
