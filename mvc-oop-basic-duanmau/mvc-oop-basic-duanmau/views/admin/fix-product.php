<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/du_an.css">
</head>
<body>
    <div class="add-product-wrapper">
        <div class="add-product-title">Sửa sản phẩm</div>
        <form class="add-product-form" method="post" enctype="multipart/form-data">
            <label for="product-name">Tên sản phẩm</label>
            <input type="text" id="product-name" name="name" required
                   value="<?= htmlspecialchars($product['name'] ?? '') ?>">

            <label for="product-category">Loại</label>
            <select id="product-category" name="category_id" required>
                <option value="">-- Chọn loại --</option>
                <?php if (isset($categories) && is_array($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['category_id'] ?>"
                            <?= (isset($product['category_id']) && $product['category_id'] == $cat['category_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <label for="product-price">Giá</label>
            <input type="number" id="product-price" name="price" min="0" required
                   value="<?= htmlspecialchars($product['price'] ?? '') ?>">

            <label for="product-desc">Tiêu đề</label>
            <textarea id="product-desc" name="description"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>

            <label>Ảnh hiện tại</label>
            <div class="current-image">
                <?php if (!empty($product['image_url'])): ?>
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="Ảnh sản phẩm" width="100">
                <?php else: ?>
                    <span>Chưa có ảnh</span>
                <?php endif; ?>
            </div>

            <label for="product-image">Chọn ảnh mới (nếu muốn thay)</label>
            <input type="file" id="product-image" name="image" accept="image/*">

            <button type="submit">Cập nhật sản phẩm</button>
        </form>
    </div>
</body>
</html>