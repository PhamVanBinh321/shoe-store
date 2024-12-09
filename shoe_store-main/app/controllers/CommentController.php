<?php
include_once '../app/config/database.php';

                                                            //////// khong co models //////////
class CommentController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addCommentAndRating($productId, $userId, $comment, $rating) {
        $sql = "INSERT INTO comments (product_id, user_id, comment, ratings) VALUES (:product_id, :user_id, :comment,:rating);
                INSERT INTO rating (product_id, user_id, ratings) VALUES (:product_id, :user_id, :rating)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $productId, 'user_id' => $userId, 'comment' => $comment, 'rating' => $rating]);
    }

    public function getComments($productId) {
        $sql = "SELECT comments.comment, comments.created_at, comments.ratings, users.username 
                FROM comments 
               
                JOIN users ON comments.user_id = users.id
                WHERE comments.product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index($productId) {
        // Bạn có thể lấy và hiển thị bình luận ở đây nếu cần
        $comments = $this->getComments($productId);
        include '../app/views/comments/index.php'; // Hiển thị danh sách bình luận
    }
}
?>
