<?php
include '../admin/model/OrderModel.php';
include '../app/config/database.php';
class AdminOrderController {
    private $model;

    public function __construct($pdo) {
        $this->model = new OrderModel($pdo);
    }

    // Hiển thị danh sách đơn hàng
    public function indexOrder() {
        $orders = $this->model->getAllOrders();
        include '../admin/views/order/vieworder.php';
    }

    // Xóa đơn hàng
    public function deleteOrder($id) {
        $this->model->deleteOrder($id);
        header("Location: ../admin/index.php?action=viewOrders");
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($id, $status) {
        $this->model->updateStatus($id, $status);
        header("Location: ../admin/index.php?action=viewOrders");
    }
}
