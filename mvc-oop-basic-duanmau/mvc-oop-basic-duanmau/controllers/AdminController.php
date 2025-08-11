<?php
    class AdminController
    {
        // Trang quản lý user
        public function userPage()
        {
            include './views/admin/adm-user.php';
        }

        // Trang quản lý sản phẩm
        public function productPage()
        {
            require_once './models/ProductModel.php';
            $productModel = new ProductModel();
            $data = $productModel->getAllProduct(); // Lấy danh sách sản phẩm
            include './views/admin/adm-product.php';
        }
        public function addProductPage()
        {
            require_once './models/CategoryModel.php';
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategories(); // Hàm này trả về mảng danh mục
            include './views/admin/add-product.php';
        }
    }