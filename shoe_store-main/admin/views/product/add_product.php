<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../admin/styles.css">

</head>
<body>
    <h1>Thêm sản phẩm</h1>
    <form action="../admin/index.php?controller=AdminProductController&action=addProduct" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div>
            <label for="price">Giá:</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div>
            <label for="image">Hình:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div>
            <label for="category_id">Loại:</label>
            <input type="number" id="category_id" name="category_id" required>
        </div>
        <button type="submit">Thêm sản phẩm</button>
        <a href="../admin/index.php?controller=AdminProductController&action=indexProduct">Hủy</a>
    </form>
</body>
</html>
