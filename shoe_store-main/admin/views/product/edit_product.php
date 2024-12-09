<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="../admin/styles.css">
</head>
<body>
    <h1>Sửa sản phẩm</h1>
    <form method="POST">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" rows="5"><?= htmlspecialchars($product['description']) ?></textarea>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($product['price']) ?>" required>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" value="<?= htmlspecialchars($product['image']) ?>">

        <label for="category_id">Category ID:</label>
        <input type="number" id="category_id" name="category_id" value="<?= htmlspecialchars($product['category_id']) ?>" required>

        <button type="submit">Update Product</button>
        <a href="../admin/index.php?controller=AdminProductController&action=indexProduct" class="cancel-button">Cancel</a>
    </form>
</body>
</html>
