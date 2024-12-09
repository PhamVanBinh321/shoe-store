<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại hàng</title>    <link rel="stylesheet" href="../admin/styles.css">

</head>
<body>
    <h1>Thêm loại hàng</h1>
    <form action="../admin/index.php?controller=AdminCategoryController&action=addCategories" method="POST">
        <div>
            <label for="name">Tên loại hàng:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <button type="submit">Thêm </button>
    </form>
</body>
</html>
