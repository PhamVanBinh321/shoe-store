<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Đơn hàng</title>
    <link rel="stylesheet" href="../admin/styles.css">
</head>
<body>
    <h1>Danh sách Đơn hàng</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Người dùng ID</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Tạo lúc</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['user_id'] ?></td>
                <td><?= $order['status'] ?></td>
                <td><?= number_format($order['total_price'], 0, ',', '.') ?> </td>
                <td><?= $order['created_at'] ?></td>
                <td>
                    <a href="../admin/index.php?action=deleteOrder&id=<?= $order['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                    |
                    <form id="nutorder" method="POST" action="../admin/index.php?action=updateOrderStatus&id=<?= $order['id'] ?>" style="display:inline;">
                        <select name="status" onchange="this.form.submit()">
                            <option value="chờ duyệt" <?= $order['status'] == 'chờ duyệt' ? 'selected' : '' ?>>Chờ duyệt</option>
                            <option value="hoàn thành" <?= $order['status'] == 'hoàn thành' ? 'selected' : '' ?>>Hoàn thành</option>
                            <option value="hủy" <?= $order['status'] == 'hủy' ? 'selected' : '' ?>>Hủy</option>
                        </select>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
