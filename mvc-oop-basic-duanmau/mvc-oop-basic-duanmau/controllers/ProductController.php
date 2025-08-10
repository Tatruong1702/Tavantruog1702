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
}
