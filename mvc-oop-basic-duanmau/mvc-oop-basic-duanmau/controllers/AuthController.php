<?php
require_once './models/UserModel.php';

class AuthController
{
    public function loginForm() {
        include './views/users/login.php';
    }

    public function handleAuth() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            // Xử lý đăng nhập
            if ($action === 'login') {
                $email = $_POST['login-email'] ?? '';
                $password = $_POST['login-password'] ?? '';

                $user = UserModel::findByEmail($email);
                if (!$user) {
                    $_SESSION['error'] = "Không tìm thấy người dùng với email: $email";
                    header("Location: index.php?action=login");
                    exit();
                }

                if ($user && $password == $user->password) {
                    // Đăng nhập thành công
                    $_SESSION['user_id'] = $user->user_id;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['role'] = $user->role;
                    header("Location: index.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Email hoặc mật khẩu không đúng!";
                    header("Location: index.php?action=login");
                    exit();
                }
            }

            // Xử lý đăng ký
            if ($action === 'register') {
                $username = $_POST['register-username'];
                $email = $_POST['register-email'];
                $password = $_POST['register-password'];

                $success = UserModel::create($username, $email, $password);
                if ($success) {
                    $_SESSION['success'] = "Đăng ký thành công! Bạn có thể đăng nhập.";
                } else {
                    $_SESSION['error'] = "Đăng ký thất bại. Email có thể đã tồn tại.";
                }
                header("Location: index.php?action=login");
                exit();
            }

            // Xử lý đăng xuất
            if ($action === 'logout') {
                session_unset();
                session_destroy();
                setcookie(session_name(), '', time() - 3600, '/'); // Xóa cookie session
                header("Location: index.php");
                exit();
            }
        }
    }
}
