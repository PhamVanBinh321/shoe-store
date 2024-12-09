<?php
class CartModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($userId, $productId, $quantity, $size) {
        $query = "INSERT INTO cart (user_id, product_id, quantity, size) VALUES (:user_id, :product_id, :quantity, :size)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'size' => $size
        ]);
    }
    
    public function getCartItems($userId) {
        $query = "SELECT c.*, p.name, p.price, p.image
                  FROM cart c 
                  JOIN products p ON c.product_id = p.id 
                  WHERE c.user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createOrder($userId, $totalPrice, $status = 'chờ duyệt') {
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, total_price, status, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$userId, $totalPrice, $status]);
        return $this->db->lastInsertId(); // Return the order ID
    }

    public function addOrderItem($orderId, $productId, $quantity, $price, $size) {
        $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price, size) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$orderId, $productId, $quantity, $price, $size]);
    }
    
    public function clearCart($userId){

    
    $query = "DELETE FROM cart WHERE user_id = :user_id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['user_id' => $userId]);
    }

    public function removeFromCart($userId, $productId, $size) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id AND size = :size");
        $stmt->execute([
            ':user_id' => $userId,
            ':product_id' => $productId,
            ':size' => $size,
        ]);
    }
    

     // Fetch all orders for a user
     public function getOrdersByUserId($userId) {
        $query = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all items for a specific order
    public function getOrderItems($orderId) {
        $query = "SELECT oi.*, p.name AS product_name FROM order_items oi
                  JOIN products p ON oi.product_id = p.id
                  WHERE oi.order_id = :order_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>