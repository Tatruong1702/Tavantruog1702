<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Stories to Remember</title>
  <link rel="stylesheet" href="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/du_an.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
  <div id="main-bg">
    <!-- Navbar -->
    <header class="navbar">
      <div class="nav-left" id="trangchu">
        <a href="#">Trang chủ <i class="fa-solid fa-caret-down"></i></a>
        <a href="#sanpham">Sản phẩm <i class="fa-solid fa-caret-down"></i></a>
        <a href="#">Liên hệ <i class="fa-solid fa-caret-down"></i></a>
      </div>
      <div class="nav-center">
        <img src="/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/assets/img/Logo (2).png" class="logo" alt="">
      </div>
      <div class="nav-right">
        <?php if (isset($_SESSION['username'])): ?>
            <form action="<?= BASE_URL ?>index.php" method="post" style="display:inline;">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="buttontt">Đăng xuất</button>
            </form>
        <?php else: ?>
            <a href="<?= BASE_URL ?>index.php?action=login" class="buttontt">Đăng nhập</a>
            <a href="<?= BASE_URL ?>index.php?action=login" class="buttontt">Đăng kí</a>
        <?php endif; ?>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="<?= BASE_URL ?>index.php?action=admin-user" class="buttontt">Quản lý</a>
        <?php endif; ?>
      </div>
    </header>

    <!-- Petal effect -->
    <div class="petal" style="top: 0; left: 30%;"></div>
    <div class="petal" style="top: -50px; left: 60%;"></div>
    <div class="petal" style="top: -100px; left: 80%;"></div>

    <div class="container">
      <h1>Xin chào! <span>
        <?php
        if (isset($_SESSION['username'])){
          echo htmlspecialchars($_SESSION['username']);
        }else {
          echo 'Người dùng';
        }
        ?>
      </span></h1>
      <p class="description">
        Marie Curie đã tạo ra không gian Memory Cloud để bạn có thể xây dựng một trang dành cho người thân yêu đã qua đời, và mọi người có thể cùng đóng góp những ký ức đẹp.
      </p>
      <div class="login-cc" style="margin-bottom: 20px;">
        <?php if (isset($_SESSION['username'])): ?>
            <form action="<?= BASE_URL ?>index.php" method="post" style="display:inline;">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="buttontt">Đăng xuất</button>
            </form>
        <?php else: ?>
            <a href="<?= BASE_URL ?>index.php?action=login" class="buttontt">Đăng nhập</a>
            <a href="<?= BASE_URL ?>index.php?action=login" class="buttontt">Đăng kí</a>
        <?php endif; ?>
      </div>
      <section>
        <nav>
          <a href="#">Cookie Settings</a> |
          <a href="#">Contact</a> |
          <a href="#">Bereavement Support</a>
        </nav>
      </section>
    </div>
  </div>
</body>
</html>