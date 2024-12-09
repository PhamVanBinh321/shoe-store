<?php
include_once '../app/models/Home.php';
require_once '../app/config/database.php';
class HomeController {
    private $favoriteProductModel;

    public function __construct($pdo) {
        $this->favoriteProductModel = new FavoriteProductModel($pdo);
    }

    public function index() {
        $topRatedProducts = $this->favoriteProductModel->getTopRatedProducts(); // Sản phẩm yêu thích
        $newestProducts = $this->favoriteProductModel->getNewestProducts(); // Sản phẩm mới nhất
        include '../app/views/home/index.php'; // Đường dẫn đến view hiển thị trang chính
    }
}
