<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/styles.css">

    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a style="margin-left: 10%;" href="../admin/index.php?controller=AdminProductController&action=addProduct">Thêm sản phẩm</a>

    <table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Loại hàng ID</th>
                <th>Chỉnh sửa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['id']) ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td><img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" width="50"></td>
                <td><?= htmlspecialchars($product['category_id']) ?></td>
                <td>
                    <a href="../admin/index.php?controller=AdminProductController&action=editProduct&id=<?= $product['id'] ?>">Sửa</a>
                    <a href="../admin/index.php?controller=AdminProductController&action=deleteProduct&id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
