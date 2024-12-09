<?php
include '../admin/model/CommentModel.php';
include '../app/config/database.php';
class AdminCommentController {
    private $model;

    public function __construct($pdo) {
        $this->model = new CommentModel($pdo);
    }

    // Hiển thị danh sách comment
    public function indexComment() {
        $comments = $this->model->getAllComments();
        include '../admin/views/comment/viewcomment.php';
    }

    // Xóa comment
    public function deleteComment($id) {
        $this->model->deleteComment($id);
        header("Location: ../admin/index.php?action=viewComments");
    }
}
