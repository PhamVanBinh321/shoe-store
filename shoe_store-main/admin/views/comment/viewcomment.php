<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Comment</title>
    <link rel="stylesheet" href="../admin/styles.css">
</head>
<body>
    <h1>Danh sách Comment</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Sản phẩm ID</th>
            <th>Người dùng ID</th>
            <th>Bình luận</th>
            <th>Sao đánh giá</th>
            <th>Tạo lúc</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $comment['id'] ?></td>
                <td><?= $comment['product_id'] ?></td>
                <td><?= $comment['user_id'] ?></td>
                <td><?= htmlspecialchars($comment['comment']) ?></td>
                <td><?= $comment['ratings'] ?></td>
                <td><?= $comment['created_at'] ?></td>
                <td>
                    <a href="../admin/index.php?action=deleteComment&id=<?= $comment['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
