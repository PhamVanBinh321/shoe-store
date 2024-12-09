<?php
include '../admin/model/CategoryModel.php';
include '../app/config/database.php';

class AdminCategoryController {
    
    private $model;

    public function __construct($pdo) {
        $this->model = new CategoryModel($pdo);
    }

    // Danh sách tất cả các category
    public function indexCategories() {
        $categories = $this->model->getAllCategories();
        include '../admin/views/category/indexcategory.php';
    }

    // Thêm category
    public function addCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->model->addCategory($name, $description);
            header('Location: ../admin/index.php?action=viewCategories');
            exit;
        }
        include '../admin/views/category/addcategory.php';
    }

    // Chỉnh sửa category
    public function editCategories($id) {
        $category = $this->model->getCategoryById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->model->updateCategory($id, $name, $description);
            header('Location: ../admin/index.php?action=viewCategories');
            exit;
        }
        include '../admin/views/category/editcategory.php';
    }

    // Xóa category
    public function deleteCategories($id) {
        $this->model->deleteCategory($id);
        header('Location: ../admin/index.php?action=viewCategories');
        exit;
    }
}
?>
