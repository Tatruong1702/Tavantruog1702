<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel 
{
    public $product_id;
    public $category_id;
    public $name;
    public $description;
    public $price;
    public $image_url;
    public $categoryName;
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        $sql = "
            SELECT products.*, categories.name as categoriesName FROM products JOIN categories ON products.category_id = categories.category_id
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function GetOneProduct($product_id)
    {
        $sql = "
            SELECT products.*, categories.name as categoryName
            FROM products JOIN categories ON products.category_id = categories.categoies_id WHERE products.product_id = :product_id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
public function insertProduct($data, $file)
{
    $imageName = '';
    if ($file['image_url']['error'] == 0) {
        $targetDir = "assets/img/";
        $imageName = time() . '_' . basename($file['image_url']['name']);
        if (move_uploaded_file($file['image_url']['tmp_name'], $targetDir . $imageName)) {
            // Upload thành công
        } else {
            // Upload thất bại, xử lý lỗi tại đây nếu cần
            $imageName = '';
        }
    }

    $sql = "INSERT INTO products (category_id, name, description, price, image_url) VALUES (:category_id, :name, :description, :price, :image_url)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':category_id', $data['category_id']);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':description', $data['description']);
    $stmt->bindParam(':price', $data['price']);
    $stmt->bindParam(':image_url', $imageName);
    $stmt->execute();
}
}
