<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa loại hàng</title>    <link rel="stylesheet" href="../admin/styles.css">

</head>
<body>
    <h1>Sửa loại hàng</h1>
    <form action="../admin/index.php?controller=AdminCategoryController&action=editCategories&id=<?= $category['id'] ?>" method="POST">
        <div>
            <label for="name">Tên loại hàng:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
        </div>
        <div>
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($category['description']) ?></textarea>
        </div>
        <button type="submit">Lưu thay đổi</button>
    </form>
</body>
</html>
