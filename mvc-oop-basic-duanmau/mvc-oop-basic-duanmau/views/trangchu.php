<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/du_an.css">
</head>
<body>
    <div class="banner">
        <img src="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/img/perfume-bottle-gold-ribbon-black_107791-2826.avif" alt="Banner" class="banner-img">
    </div>
    <div class="search-product">
    <form action="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/index.php" method="get">
        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." class="search-input">
        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="wrapper" id="sanpham">
    <div class="tabs">
        <div class="tab active" data-tab="1">Tất cả sản phẩm</div>
        <div class="tab" data-tab="2">Sản phẩm cho nam</div>
        <div class="tab" data-tab="3">Sản phẩm cho nữ</div>
    </div>

    <div id="tab-1" class="tab-content active">
        <div class="product-list">
        <?php foreach ($data as $value): ?>
    <div class="product-item sanpham">
            <?php if($value["image_url"]): ?>
                <img src="<?= $value["image_url"] ?>" width="180" alt="">
            <?php endif; ?>
            <p><strong><?= $value["name"] ?></strong></p>
            <p><?= number_format($value["price"]) ?> VNĐ</p>
            <!-- Ô xem chi tiết xuất hiện khi hover -->
            <div class="product-detail-hover hh">
                <a href="<?= BASE_URL ?>index.php?action=product-detail&id=<?= $value['product_id'] ?>" class="detail-btn animated-box">Xem chi tiết</a>
            </div>
    </div>
        <?php endforeach; ?>
</div>
    </div>

    <div id="tab-2" class="tab-content">
        <?php if (!empty($data)): ?>
    <div class="product-list">
        <?php foreach ($data as $value): ?>
            <?php if ($value['category_id'] == 1): ?>
    <div class="product-item sanpham">
            <?php if($value["image_url"]): ?>
                <img src="<?= $value["image_url"] ?>" width="180" alt="">
            <?php endif; ?>
            <p><strong><?= $value["name"] ?></strong></p>
            <p><?= number_format($value["price"]) ?> VNĐ</p>
            <!-- Ô xem chi tiết xuất hiện khi hover -->
            <div class="product-detail-hover hh">
                <a href="<?= BASE_URL ?>index.php?action=product-detail&id=<?= $value['product_id'] ?>" class="detail-btn animated-box">Xem chi tiết</a>
            </div>
    </div>
    <?php endif; ?>
        <?php endforeach; ?>
</div>
<?php else: ?>
    <p>Không có sản phẩm nào.</p>
<?php endif; ?>

    </div>

    <div id="tab-3" class="tab-content">
                <?php if (!empty($data)): ?>
    <div class="product-list">
        <?php foreach ($data as $value): ?>
            <?php if ($value['category_id'] == 2): ?>
    <div class="product-item sanpham">
            <?php if($value["image_url"]): ?>
                <img src="<?= $value["image_url"] ?>" width="180" alt="">
            <?php endif; ?>
            <p><strong><?= $value["name"] ?></strong></p>
            <p><?= number_format($value["price"]) ?> VNĐ</p>
            <!-- Ô xem chi tiết xuất hiện khi hover -->
            <div class="product-detail-hover hh">
                <a href="<?= BASE_URL ?>index.php?action=product-detail&id=<?= $value['product_id'] ?>" class="detail-btn animated-box">Xem chi tiết</a>
            </div>
    </div>
    <?php endif; ?>
        <?php endforeach; ?>
</div>
<?php else: ?>
    <p>Không có sản phẩm nào.</p>
<?php endif; ?>
    </div>
</div>

<script>
        const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            document.getElementById(`tab-${tab.dataset.tab}`).classList.add('active');
        });
    });
</script>
</body>
</html>