<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "coca_cola"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    model_name VARCHAR(255),
    tagline TEXT
)";

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";

    // Sample product data
    $productName = "Coca-Cola";
    $modelname = "coke_can.x3d";
    $tagline = "Coca_Cola Original Taste is the worlds favourite soft drink and has been enjoyed since 1886.";

    // SQL to insert product
    $sql_insert = "INSERT INTO products (name, model_name, tagline) 
        VALUES ('$productName', '$modelname', '$tagline')";

    // Execute SQL query
    if ($conn->query($sql_insert) === TRUE) {
        echo "$productName inserted successfully";
    } else {
        echo "Error inserting product: " . $conn->error;
    }


    
    // Sample product data
    $productName = "Dr.Pepper";
    $modelname = "drpepper_can.x3d";
    $tagline = "A unique sparkling blend of 23 fruit flavours, Dr Pepper has that distinctive flavour you just can not quite put your finger on, or can you? ";

    // SQL to insert product
    $sql_insert = "INSERT INTO products (name, model_name, tagline) 
        VALUES ('$productName', '$modelname', '$tagline')";

    // Execute SQL query
    if ($conn->query($sql_insert) === TRUE) {
        echo "$productName inserted successfully";
    } else {
        echo "Error inserting product: " . $conn->error;
    }






    // Sample product data
    $productName = "Sprite";
    $modelname = "sprite_bottle.x3d";
    $tagline = "Sprite is a crisp, refreshing and clean-tasting lemon and lime-flavoured soft drink.";

    // SQL to insert product
    $sql_insert = "INSERT INTO products (name, model_name, tagline) 
        VALUES ('$productName', '$modelname', '$tagline')";

    // Execute SQL query
    if ($conn->query($sql_insert) === TRUE) {
        echo "$productName inserted successfully";
    } else {
        echo "Error inserting product: " . $conn->error;
    }



} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
