<?php
// Include the necessary files
require_once 'product_controller.php';

// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "coca_cola"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create instance of the ProductController
$controller = new ProductController($conn);

// Check if 'name' parameter is set
if (isset($_GET['name'])) {
    // Get product name from request parameter
    $productName = $_GET['name'];
    
    error_log("Received product name: " . $productName);
    // Fetch product details from the controller
    $productDetails = $controller->getProductDetails($productName);
    

    // Send product details as JSON response
    header('Content-Type: application/json');
    echo json_encode($productDetails);
} else {
    // If 'name' parameter is not set, return an error
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array("error" => "Product name not specified"));
}

// Close connection
$conn->close();
?>
