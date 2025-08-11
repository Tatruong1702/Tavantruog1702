<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class CategoryController 
{
    public $category_id;
    public $name;
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        $sql = "
            SELECT * FROM categories
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class CategoryModel {
    public function getAllCategories() {
        $conn = connectDB();
        $stmt = $conn->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}