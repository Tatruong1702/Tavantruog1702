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
        include "views/partials/header.php";
        require_once './views/trangchu.php';
        include "views/partials/footer.php";
    }
}
