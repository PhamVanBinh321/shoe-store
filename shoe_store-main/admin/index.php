<?php
// Bao gồm header và footer
include '../admin/views/header.php';  // Nhúng file header của bạn
include '../app/config/database.php';  // Kết nối tới database

// Include controller cho product và category
include '../admin/controller/AdminProductController.php';  // Controller sản phẩm
include '../admin/controller/AdminCategoryController.php';  // Controller danh mục
include '../admin/controller/AdminCommentController.php';  // Controller danh mục
include '../admin/controller/AdminOrderController.php';  // Controller danh mục


// Khởi tạo controller cho sản phẩm và danh mục
$productController = new AdminProductController($pdo);
$categoryController = new AdminCategoryController($pdo);
$commentController = new AdminCommentController($pdo);
$orderController = new AdminOrderController($pdo);
// Kiểm tra action từ URL và điều hướng
if (isset($_GET['action'])) {
    $act = $_GET['action'];  // Lấy giá trị action từ URL
    switch ($act) {
        // Điều hướng đến trang quản lý sản phẩm
        case 'addProduct':
            $productController->addProduct();  // Thêm sản phẩm
            break;
        case 'editProduct':
            if (isset($_GET['id'])) {
                $productController->editProduct($_GET['id']);  // Sửa sản phẩm theo id
            }
            break;
        case 'deleteProduct':
            if (isset($_GET['id'])) {
                $productController->deleteProduct($_GET['id']);  // Xóa sản phẩm theo id
            }
            break;
        case 'viewProducts':
            $productController->indexProduct();  // Liệt kê tất cả sản phẩm
            break;

        // Điều hướng đến trang quản lý danh mụcCategories
        case 'addCategories':
            $categoryController->addCategories();  // Thêm danh mục
            break;
        case 'editCategories':
            if (isset($_GET['id'])) {
                $categoryController->editCategories($_GET['id']);  // Sửa danh mục theo id
            }
            break;
        case 'deleteCategories':
            if (isset($_GET['id'])) {
                $categoryController->deleteCategories($_GET['id']);  // Xóa danh mục theo id
            }
            break;
        case 'viewCategories':
            $categoryController->indexCategories();  // Liệt kê tất cả danh mục
            break;
        case 'viewComments':
            $commentController->indexComment();
            break;
        case 'deleteComment':
            if (isset($_GET['id'])) {
                $commentController->deleteComment($_GET['id']);
            }
            break;
        case 'viewOrders':
            $orderController->indexOrder();
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                $orderController->deleteOrder($_GET['id']);
            }
            break;
        case 'updateOrderStatus':
            if (isset($_GET['id']) && isset($_POST['status'])) {
                $orderController->updateStatus($_GET['id'], $_POST['status']);
            }
            break;
        case 'backtoweb':
            header('Location: ../public/index.php');
            break;       
        default:
            echo "Action không hợp lệ!";
            break;
    }
} else {
    // Nếu không có action, hiển thị trang chủ của admin
    echo "<h1>Chào mừng đến với trang quản trị Admin!</h1>";
}

// Bao gồm footer
?>
