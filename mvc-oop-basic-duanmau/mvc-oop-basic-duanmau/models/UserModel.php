<?php
require_once './commons/function.php'; // file chứa hàm connectDB()

class UserModel {
    public $user_id;
    public $username;
    public $email;
    public $password;
    public $role;

    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Tìm người dùng theo email → trả về 1 object UserModel hoặc null
    public static function findByEmail($email) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new self();
            $user->user_id = $data['user_id'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->role = $data['role'];
            return $user;
        }

        return null;
    }

    // Tạo người dùng mới
    public static function create($username, $email, $password, $role = 'user') {
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $password, $role]);
    }
}
