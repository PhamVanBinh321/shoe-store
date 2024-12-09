<?php
include_once '../app/config/database.php';
include_once '../app/models/CartModel.php';
class CartController {
    private $cartModel;
    
    public function __construct($cartModel) {
        $this->cartModel = $cartModel;
    }

    public function add() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $size = $_POST['size'];
            $price = $_POST['price'];

            $this->cartModel->addToCart($userId, $productId, $quantity, $size, $price);
            header("Location: index.php?act=cart");
        } else {
            header("Location: index.php?act=loadtaikhoan");
        }
    }

    public function view() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $cartItems = $this->cartModel->getCartItems($userId);
            $orders = $this->cartModel->getOrdersByUserId($userId);

            // Fetch items for each order
            foreach ($orders as &$order) {
                $order['items'] = $this->cartModel->getOrderItems($order['id']);
            }
            require '../app/views/cart/index.php';
        } else {
            header("Location: index.php?act=loadtaikhoan");
        }
    }

    public function confirmOrder() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $cartItems = $this->cartModel->getCartItems($userId);
            
            if (!empty($cartItems)) {
                // Calculate total price
                $totalPrice = 0;
                foreach ($cartItems as $item) {
                    $totalPrice += $item['price'] * $item['quantity'];
                }

                // Create a new order in the orders table
                $orderId = $this->cartModel->createOrder($userId, $totalPrice, 'chờ duyệt');

                // Add items to order_items table
                foreach ($cartItems as $item) {
                    $this->cartModel->addOrderItem($orderId, $item['product_id'], $item['quantity'], $item['price'], $item['size']);
                }

                // Clear user's cart
                $this->cartModel->clearCart($userId);
              
                header("Location: index.php?act=orderSuccess");
            } else {
                header("Location: index.php?act=cart");
            }
        } else {
            header("Location: index.php?act=loadtaikhoan");
        }
    }

    public function viewOrders() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            

            // Pass the orders data to the view
            
        } else {
            header("Location: index.php?act=loadtaikhoan");
        }
    }

    public function remove() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $productId = $_GET['product_id'] ?? null;
            $size = $_GET['size'] ?? null;
    
            if ($productId && $size) {
                // Gọi model để xóa sản phẩm khỏi giỏ hàng
                $this->cartModel->removeFromCart($userId, $productId, $size);
    
                // Chuyển hướng lại trang giỏ hàng
                header("Location: index.php?act=cart");
            } else {
                echo "Thông tin không hợp lệ!";
            }
        } else {
            header("Location: index.php?act=loadtaikhoan");
        }
    }
}

?>