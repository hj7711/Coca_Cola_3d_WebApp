<?php

// product_model.php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getProductByName($name) {
        $sql = "SELECT * FROM products WHERE name = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

?>
