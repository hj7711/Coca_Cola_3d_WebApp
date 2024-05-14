<?php
// product_controller.php
require_once 'product_model.php';

class ProductController {
    private $model;

    public function __construct($db) {
        $this->model = new ProductModel($db);
    }

    public function getProductDetails($name) {
        $product = $this->model->getProductByName($name);
        return $product;
    }
}

?>