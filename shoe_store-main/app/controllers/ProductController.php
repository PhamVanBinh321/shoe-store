<?php
require_once '../app/config/database.php';
require_once '../app/models/Product.php';
class ProductController {
    private $productModel;
    private $productsPerPage = 12; // Số sản phẩm trên mỗi trang

    public function __construct($pdo) {
        $this->productModel = new ProductModel($pdo);
    }

    public function index() {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy trang hiện tại
        $offset = ($currentPage - 1) * $this->productsPerPage; // Tính toán offset cho SQL

        if (isset($_POST['sort'])) {
            $sortOption = $_POST['sort'];
            $products = $this->productModel->sortProducts($sortOption, $offset, $this->productsPerPage);
        } else {
            $products = $this->productModel->getAllProducts($offset, $this->productsPerPage);
        }

        // Lấy tổng số sản phẩm để tính số trang
        $totalProducts = $this->productModel->getTotalProducts();
        $totalPages = ceil($totalProducts / $this->productsPerPage);

        include '../app/views/products/index.php';
    }
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        $images = $this->productModel->getProductImages($id);
        $product['category_name'] = $this->productModel->getCategoryName($product['category_id']);
        $relatedProducts = $this->productModel->getRelatedProducts($product['category_id'], $id);
        include '../app/views/products/detail.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $results = $this->productModel->searchProducts($keyword);
    
            // Phân trang
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($currentPage - 1) * $this->productsPerPage;
            
            $totalProducts = count($results);
            $totalPages = ceil($totalProducts / $this->productsPerPage);
    
            // Giới hạn sản phẩm cho trang hiện tại
            $products = array_slice($results, $offset, $this->productsPerPage);
    
            include '../app/views/products/index.php';
        } else {
            header("Location: index.php");
        }
    }
    
}

?>
