<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>    <link rel="stylesheet" href="../admin/styles.css">

</head>
<body>
    <h1>Danh sách loại hàng</h1>
    <a style="margin-left: 10%;" href="../admin/index.php?controller=AdminCategoryController&action=addCategories">Thêm loại hàng</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <td><?= htmlspecialchars($category['description']) ?></td>
                <td>
                    <a href="../admin/index.php?controller=AdminCategoryController&action=editCategories&id=<?= $category['id'] ?>">Sửa</a> |
                    <a href="../admin/index.php?controller=AdminCategoryController&action=deleteCategories&id=<?= $category['id'] ?>" onclick="return confirm('Are you sure you want to delete?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
