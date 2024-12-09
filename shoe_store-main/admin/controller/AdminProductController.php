<?php
include '../admin/model/product.php';
include '../app/config/database.php';

class AdminProductController {
    private $model;

    public function __construct($pdo) {
        $this->model = new ProductModel($pdo);
    }

    // Hiển thị danh sách sản phẩm
    public function indexProduct() {
        $products = $this->model->getAllProducts();
        include '../admin/views/product/viewproduct.php';
    }

    // Thêm sản phẩm mới
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
    
            // Kiểm tra và xử lý file ảnh
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = basename($_FILES['image']['name']);
                $uploadDir = '../images/';
                $imagePath = $uploadDir . $imageName;
    
                // Di chuyển file ảnh đến thư mục `images`
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    // Đường dẫn để lưu vào database
                    $dbImagePath = '../images/' . $imageName;
    
                    // Gọi model để thêm sản phẩm
                    $this->model->addProduct($name, $description, $price, $dbImagePath, $category_id);
    
                    // Chuyển hướng về danh sách sản phẩm
                    header('Location: ../admin/index.php?action=viewProducts');
                    exit;
                } else {
                    echo "Failed to upload image.";
                    return;
                }
            } else {
                echo "No image uploaded or error occurred.";
                return;
            }
        }
    
        include '../admin/views/product/add_product.php';
    }
    

    
    // Sửa sản phẩm
    public function editProduct($id) {
        $product = $this->model->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => $_POST['image'],
                'category_id' => $_POST['category_id']
            ];
            $this->model->updateProduct($id, $data);
            header("Location: ../admin/index.php?action=viewProducts");
            exit();
        }

        include '../admin/views/product/edit_product.php';
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $this->model->deleteProduct($id);
        header("Location: ../admin/index.php?action=viewProducts");
        exit();
    }
}
?>
