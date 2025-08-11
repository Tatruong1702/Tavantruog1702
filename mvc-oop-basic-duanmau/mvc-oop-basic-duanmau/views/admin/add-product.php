<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm mới</title>
      <link rel="stylesheet" href="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/du_an.css">
</head>
<body>
    <div class="add-product-wrapper">
        <div class="add-product-title">Thêm sản phẩm mới</div>
        <form class="add-product-form" method="post" enctype="multipart/form-data">
            <label for="product-name">Tên sản phẩm</label>
            <input type="text" id="product-name" name="name" required>

            <label for="product-category">Loại</label>
            <select id="product-category" name="category_id" required>
                <option value="">-- Chọn loại --</option>
                <?php if (isset($categories) && is_array($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['category_id'] ?>">
                            <?= htmlspecialchars($cat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <label for="product-price">Giá</label>
            <input type="number" id="product-price" name="price" min="0" required>

            <label for="product-desc">Tiêu đề</label>
            <textarea id="product-desc" name="description"></textarea>

            <label for="product-image">Hình ảnh</label>
            <input type="file" id="product-image" name="image" width="100" accept="image/*">

            <button type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>
</html>