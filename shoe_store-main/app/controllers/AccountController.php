<?php
require_once '../app/config/database.php';
require_once '../app/models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->userModel->register($username, $email, $password)) {
                $alertMessage = "Đăng ký thành công!";
                $alertClass = "success";
            } else {
                $alertMessage = "Đăng ký thất bại!";
            $alertClass = "error";
            }
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertDiv = document.getElementById('alert');
                alertDiv.textContent = '$alertMessage';
                alertDiv.className = 'success-alert $alertClass';
                alertDiv.style.display = 'block';

                setTimeout(() => {
                    alertDiv.style.display = 'none';
                }, 3000);
            });
        </script>";
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->login($username, $password);
            
           

            if ($user) {
                if ($user['username'] === 'admin') {
                    header('Location: ../admin/index.php');
                    exit; // Dừng thực thi tiếp
                }

                //session_start(); // Chỉ gọi session_start một lần ở đây
               // Sau khi kiểm tra đăng nhập thành công
                $_SESSION['user_id'] = $user['id'];  // Lưu ID người dùng
                $_SESSION['username'] = $user['username'];  // Lưu tên người dùng

            
                header('Location: ../public/index.php');
            } else {
                $alertMessage = "Sai mật khẩu hoặc tài khoản!";
            $alertClass = "error";
         echo "<script>
            window.onload = function() {
                const alertDiv = document.getElementById('alertt');  //2 chu t cho dang nhap
                alertDiv.textContent = '$alertMessage';
                alertDiv.className = 'success-alert $alertClass '; // Thêm class 'visible'
                
                // Thêm class 'visible' thay vì chỉnh trực tiếp display
                alertDiv.classList.add('visible');
        
                setTimeout(() => {
                    alertDiv.classList.remove('visible'); // Xóa class 'visible' sau 5 giây
                }, 5000);
        
                login(); // Gọi hàm login sau khi alert hiện
            };
        </script>";
        
            }
        }
    }

    
}
?>
