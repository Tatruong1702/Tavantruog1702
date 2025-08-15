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
      <a href="#" class="active">Người dùng</a>
      <a href="<?= BASE_URL ?>index.php?action=admin-product">Sản phẩm</a>
    </div>
    <a style="color:white;" href="<?= BASE_URL ?>index.php">Quay về trang chủ</a>
  </nav>

  <!-- Nội dung -->
 <div class="adm-container">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Tên người dùng</th>
          <th>Email</th>
          <th>Password</th>
        </tr>
      </thead>
      <?php foreach ($data as $value): ?>
      <tbody>
        <tr>
          <td><?= $value["username"] ?></td>
          <td><?= $value["email"] ?></td>
          <td><?= $value["password"] ?></td>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>

</body>
</html>