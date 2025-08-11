<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Quản lý sản phẩm</title>
  <link rel="stylesheet" href="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/du_an.css">
</head>
<body>

  <!-- Thanh điều hướng -->
  <nav class="adm-nav">
    <a href="#" class="adm-nav-brand">Admin</a>
    <div class="adm-nav-links">
      <a href="#">Người dùng</a>
      <a href="#" class="active">Sản phẩm</a>
    </div>
    <a style="color:white;" href="<?= BASE_URL ?>index.php">Quay về trang chủ</a>
  </nav>

  <!-- Nội dung -->
  <div class="adm-container">
    <a href="<?= BASE_URL ?>index.php?action=add_product" class="adm-btn adm-btn-add">+ Thêm sản phẩm</a>
    <table class="adm-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Loại</th>
          <th>Giá</th>
          <th>Tiêu đề</th>
          <th>Hình ảnh</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <?php foreach ($data as $value): ?>
      <tbody>
        <tr>
          <td><?= $value["product_id"] ?></td>
          <td><?= $value["name"] ?></td>
          <td><?= $value["categoriesName"] ?></td>
          <td><?= $value["price"] ?></td>
          <td><?= $value["description"] ?></td>
          <td><img src="<?= htmlspecialchars($value["image_url"] ?? '') ?>" alt="sp" width="100"></td>
          <td>
            <a href="<?= BASE_URL ?>index.php?action=fix-product&id=<?= $value['product_id'] ?>" class="adm-btn adm-btn-edit">Sửa</a>
            <a href="<?= BASE_URL ?>index.php?action=delete-product&id=<?= $value['product_id'] ?>" 
               class="adm-btn adm-btn-delete"
               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
               Xóa
            </a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>

</body>
</html>