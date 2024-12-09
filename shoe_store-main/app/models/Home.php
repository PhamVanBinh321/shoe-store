<?php
class FavoriteProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTopRatedProducts() {
        $query = "
            SELECT p.*, AVG(r.ratings) as average_rating
            FROM products p
            LEFT JOIN comments r ON p.id = r.product_id
            GROUP BY p.id
            ORDER BY average_rating DESC
            LIMIT 4
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNewestProducts() {
        $query = "
            SELECT *
            FROM products
            ORDER BY created_at DESC
            LIMIT 4
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
