<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Box with Rating and Sample Comments</title>
    <link rel="stylesheet" href="../styleforcomment.css">
</head>
<body>
    


    <div class="comment-section">
        <h3 class="section-heading">Đánh giá:</h3>
        <?php foreach ($comments as $comment) { ?>
            <div class="comment-item">
                <div class="user-rating">
                    <span class="user-name"><?php echo htmlspecialchars($comment['username']); ?></span>
                    <span class="user-stars">
                        <?php echo str_repeat("&#9733;", $comment['ratings']); echo str_repeat("&#9734;", 5 - $comment['ratings']); ?>
                        
                    </span>
                </div>
                <span class="comment-time"><?php echo date("d/m/Y - H:i", strtotime($comment['created_at'])); ?></span>
                <p class="user-comment"><?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
        <?php } ?>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="comment-box">
            <h2 class="comment-heading">Đánh giá:</h2>
            <form action="index.php" method="POST" onsubmit="return validateForm()">
                <div class="rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                    <input type="hidden" name="rating" id="rating" value="">
                </div>
                <textarea name="comment" id="comment" class="comment-text" placeholder="Viết bình luận của bạn..." required></textarea>
                <input type="hidden" name="product_id" value="<?php echo $productId ?>">
                <input type="hidden" name="act" value="productdetails">
                <input type="hidden" name="add_comment_rating" value="1">
                <button type="submit" class="submit-btn">Gửi đánh giá</button>
            </form>
        </div>
    <?php else: ?>
        <p>Vui lòng đăng nhập để đánh giá sản phẩm.</p>
    <?php endif; ?>


<script>
    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');
            document.querySelectorAll('.star').forEach(s => s.classList.remove('active'));
            for (let i = 0; i < rating; i++) {
                document.querySelectorAll('.star')[i].classList.add('active');
            }
            // Cập nhật giá trị của input ẩn
            document.getElementById('rating').value = rating;
        });
    });

    function validateForm() {
        const rating = document.getElementById('rating').value;
        if (!rating) {
            alert('Vui lòng chọn đánh giá sao trước khi gửi!');
            return false; // Ngăn chặn gửi biểu mẫu
        }
        return true; // Cho phép gửi biểu mẫu
    }

    // Reset giá trị sau khi gửi thành công
    <?php if (isset($_GET['success'])): ?>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('rating').value = ''; // Reset input rating
            document.querySelectorAll('.star').forEach(s => s.classList.remove('active')); // Xóa trạng thái sao
            document.getElementById('comment').value = ''; // Reset comment textarea
           
        });
    <?php endif; ?>
</script>



   
</body>
</html>
