<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $data = $this -> modelProduct->GetAllProduct();
        include "views/partials/header.php";
        require_once './views/trangchu.php';
        include "views/partials/footer.php";
    }
    public function GetAllProduct()
    {
        $productModel = new ProductModel();
        $data = $productModel->GetAllProduct();
        require_once '/laragon/www/Tavantruog1702/mvc-oop-basic-duanmau/mvc-oop-basic-duanmau/models/ProductModel.php';
    }
    public function detailProduct()
{
    require_once './models/ProductModel.php';
    $id = (int)$_GET['id'];
    $data = $this->modelProduct->getOneProduct($id);
    require_once './views/admin/detail-product.php';
    include "views/partials/footer.php";
}
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $imageUrl = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imageUrl = $this->uploadImage('uploads', $_FILES['image']);
            }
            $productModel = new ProductModel();
            $productModel->insertProduct([
                'name' => $name,
                'category_id' => $category_id,
                'price' => $price,
                'description' => $description,
                'image_url' => $imageUrl
            ]);
            header('Location: index.php?action=admin-product');
            exit();
        }
        include './views/admin/add-product.php';
    }
    public function uploadImage($dir, $file, $url = null)
    {
        if (isset($file) && $file['error'] === 0) {
            $fileTmp = $file['tmp_name'];
            $fileName = basename($file['name']);
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $ext;
            $uploadPath = __DIR__ . '/../' . $dir . "/" . $newFileName;
            if (move_uploaded_file($fileTmp, $uploadPath)) {
                if ($url != null && file_exists($url)) {
                    unlink($url); // Xóa ảnh cũ khi cập nhật
                }
                $url = $dir . "/" . $newFileName;
            }
        }
        return $url;
    }
    public function fixProduct()
    {
        require_once './models/ProductModel.php';
        require_once './models/CategoryModel.php';

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?action=admin-product');
            exit();
        }

        $productModel = new ProductModel();
        $product = $productModel->GetOneProduct($id);

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllCategories();

        // Xử lý cập nhật khi submit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $imageUrl = $product['image_url'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imageUrl = $this->uploadImage('uploads', $_FILES['image'], $product['image_url']);
            }
            $productModel->updateProduct($id, [
                'name' => $name,
                'category_id' => $category_id,
                'price' => $price,
                'description' => $description,
                'image_url' => $imageUrl
            ]);
            header('Location: index.php?action=admin-product');
            exit();
        }

        include './views/admin/fix-product.php';
    }
    public function deleteProduct()
    {
        require_once './models/ProductModel.php';
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new ProductModel();
            $productModel->deleteProduct($id);
        }
        header('Location: index.php?action=admin-product');
        exit();
    }
}
