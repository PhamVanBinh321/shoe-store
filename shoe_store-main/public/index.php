<?php
session_start(); // Bắt đầu session ngay từ đầu để kiểm tra trạng thái đăng nhập


include  '../app/config/database.php';
include '../app/controllers/AccountController.php';
include '../app/controllers/ProductController.php';
include '../app/controllers/CommentController.php';
include '../app/controllers/CartController.php';
include '../app/controllers/HomeController.php';
$userController = new UserController($pdo);
$productController = new ProductController($pdo);
$commentController = new CommentController($pdo);
$cartController = new CartController(new CartModel($pdo));


$homeController = new HomeController($pdo); // Giả sử $pdo là kết nối PDO đã được khởi tạo




// Xử lý đăng nhập/đăng ký
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $userController->register();
    } elseif (isset($_POST['login'])) {
        $userController->login();
    }
     elseif (isset($_POST['logout'])) {
        session_unset(); 
        session_destroy(); 
        
    }

    elseif (isset($_POST['add_comment_rating'])) {
        // Lấy dữ liệu bình luận và đánh giá từ form
        $productId = $_POST['product_id'];
        $userId = $_SESSION['user_id'] ?? 1; // Giả định người dùng đã đăng nhập
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];
        
        // Thêm bình luận và đánh giá
        $commentController->addCommentAndRating($productId, $userId, $comment, $rating);
        header("Location: index.php?act=comments&product_id={$productId}&no_layout=1&success=1");
        exit;
    }
}



// load comment không có header và footer
if (isset($_GET['no_layout'])) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'comments':
                if (isset($_GET['product_id'])) {
                    $commentController->index($_GET['product_id']);
                }
                break;
            // Các case khác nếu cần
        }
    }
} else {
    // Include header và footer
    include '../app/views/header.php';
    
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'loadtaikhoan':
                include '../app/views/account/account.php';
             
                break;
            case 'loadforgotpass':
                include '../app/views/account/forgotpass.php';
                
                break;
            case 'forgotpass':
                include '../app/views/account/forgotpass.php';
                
                break;
            case 'loadproduct':
                $productController->index(); // Gọi ProductController để xử lý hiển thị sản phẩm
                break;
            case 'productdetails':
                if (isset($_GET['id'])) {
                    $productController->show($_GET['id']); // Hiển thị chi tiết sản phẩm theo id
                }
                break;
            case 'cart':
                $cartController->view();
                $cartController->viewOrders();
                break;
            case 'confirmOrder':
                $cartController->confirmOrder();
                break;
            case 'add':
                $cartController->add();
                break;
            case 'search':
                $productController->search();
                break;
            case 'deleteitemintcart':
                $cartController->remove();
                break;
            default:
            $homeController->index();
                break;
        }
    } else {
        $homeController->index();
    }

    include '../app/views/footer.php';
}
?>
