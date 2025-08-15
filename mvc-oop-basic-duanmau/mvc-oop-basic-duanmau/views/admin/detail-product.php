
    <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/du_an.css">

</head>
<body>
  <div class="chitiet">
    <div class="breadcrumb">
        <a href="<?= BASE_URL ?>index.php">Trang chủ</a> > <a href="#">Danh mục</a> > Tên sản phẩm
    </div>

    <div class="product-container">
        <div class="product-image">
            <img src="<?= htmlspecialchars($data["image_url"] ?? '') ?>" alt="Sản phẩm">
        </div>
        <div class="product-info">
            <div class="product-title"><?= htmlspecialchars($data["name"]) ?></div>
            <div class="product-type"><?= htmlspecialchars($data["categoryName"]) ?></div>
            <div class="product-price"><?= htmlspecialchars(number_format($data["price"])) ?> VNĐ</div>
            <div class="product-description">
                <?= htmlspecialchars($data["description"]) ?>
            </div>
            <div class="buy-buttons">
                <button class="btn btn-cart">Thêm vào giỏ</button>
                <button class="btn btn-buy">Mua ngay</button>
            </div>
        </div>
    </div>

    <div class="comments-section">
        <h3>Bình luận</h3>
        <div class="comment-form">
            <textarea placeholder="Nhập bình luận của bạn..."></textarea>
            <button>Gửi bình luận</button>
        </div>
        <div class="comment-list">
            <div class="comment">
                <strong>Nguyễn Văn A</strong>
                <p>Sản phẩm rất tốt, giao hàng nhanh!</p>
            </div>
            <div class="comment">
                <strong>Trần Thị B</strong>
                <p>Chất lượng vượt mong đợi, sẽ ủng hộ tiếp.</p>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
