<?php

require_once 'product.php';
require_once '../database/database.php'; // include the Database class

class Furniture extends Product {
    public $height;
    public $width;
    public $length;

    public function __construct($id, $sku, $name, $price, $product_type_id, $height, $width, $length) {
        parent::__construct($id, $sku, $name, $price, $product_type_id);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $product_type_id = isset($_POST['type']) ? (int)$_POST['type'] : 0;
    $height = isset($_POST['height']) ? $_POST['height'] : '';
    $width = isset($_POST['width']) ? $_POST['width'] : '';
    $length = isset($_POST['length']) ? $_POST['length'] : '';

    // Create new Furniture instance
    $furniture = new Furniture($id, $sku, $name, $price, $product_type_id, $height, $width, $length);

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
    $height = $db->escape($height);
    $width = $db->escape($width);
    $length = $db->escape($length);

    // Insert data into database
    $sql = "INSERT INTO product (sku, name, price, product_type_id) VALUES ('$sku', '$name', '$price', $product_type_id)";
    $db->query($sql);

    // Get the inserted product ID
    $product_id = $db->insert_id();

    // Escape the furniture dimensions for SQL injection prevention
    $height = $db->escape($height);
    $width = $db->escape($width);
    $length = $db->escape($length);

    // Insert data into furniture table
    $sql = "INSERT INTO furniture (product_id, height, width, length) VALUES ('$product_id', '$height', '$width', '$length')";
    $db->query($sql);

    // Display success message
    echo "Furniture saved successfully!";
}
?>
