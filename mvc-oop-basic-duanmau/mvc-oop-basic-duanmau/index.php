<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './controllers/AuthController.php';

// Route
$action = $_GET['action'] ?? ($_POST['action'] ?? '/');

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($action) {
    // Trang chủ
    '/' => (new ProductController())->Home(),
    'login' => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new AuthController())->handleAuth()
        : (new AuthController())->loginForm(),
    // Nếu có thêm đăng ký:
    'register' => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new AuthController())->handleAuth()
        : (new AuthController())->loginForm(),
    'logout' => (new AuthController())->handleAuth(), // Thêm dòng này
};