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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOneProduct($product_id)
    {
        $sql = "
            SELECT products.*, categories.name as categoryName
            FROM products JOIN categories ON products.category_id = categories.category_id
            WHERE products.product_id = :product_id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
public function insertProduct($data)
{
    $sql = "INSERT INTO products (name, category_id, price, description, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        $data['name'],
        $data['category_id'],
        $data['price'],
        $data['description'],
        $data['image_url']
    ]);
}
public function updateProduct($id, $data)
{
    $sql = "UPDATE products SET name=?, category_id=?, price=?, description=?, image_url=? WHERE product_id=?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        $data['name'],
        $data['category_id'],
        $data['price'],
        $data['description'],
        $data['image_url'],
        $id
    ]);
}
public function deleteProduct($id)
{
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
}
}
