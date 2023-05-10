<?php

class DVD extends Product {
    public $size;

    public function __construct($id, $sku, $name, $price, $product_type_id, $size) {
        parent::__construct($id, $sku, $name, $price, $product_type_id);
        $this->size = $size;
    }
}

/* 
Saving DVD through the add product page
*/


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $product_type_id = isset($_POST['type']) ? (int)$_POST['type'] : 0;
    $size = isset($_POST['size']) ? $_POST['size'] : '';

    // Create new Book instance
    $dvd = new DVD($id, $sku, $name, $price, $product_type_id, $size);

    // Create new Database instance
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'juniordev.liga.lomakina';
    $db = new Database($host, $user, $password, $database);

    // Connect to the database
    $db->connect();

    // Escape data for SQL injection prevention
    $id = $db->escape($id);
    $sku = $db->escape($sku);
    $name = $db->escape($name);
    $price = $db->escape($price);
    $product_type_id = $db->escape($product_type_id);
    $size = $db->escape($size);

    // Insert data into database
    $sql = "INSERT INTO product (sku, name, price, product_type_id) VALUES ('$sku', '$name', '$price', $product_type_id)";
    $db->query($sql);

    // Get the inserted product ID
    $product_id = $db->insert_id();

    // Escape the weight value for SQL injection prevention
    $size = $db->escape($size);

    // Insert data into book table
    $sql = "INSERT INTO dvd (product_id, size) VALUES ('$product_id', '$size')";
    $db->query($sql);

    // Display success message
    echo "DVD saved successfully!";
}