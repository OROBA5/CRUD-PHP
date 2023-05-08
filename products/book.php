<?php
require_once 'product.php';
require_once '../database/database.php'; // include the Database class

class Book extends Product {
    public $weight;

    public function __construct($id, $sku, $name, $price, $product_type_id, $weight) {
        parent::__construct($id, $sku, $name, $price, $product_type_id);
        $this->weight = $weight;
    }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $product_type_id = isset($_POST['type']) ? $_POST['type'] : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';

    // Create new Book instance
    $book = new Book($id, $sku, $name, $price, $product_type_id, $weight);

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
    $weight = $db->escape($weight);

    var_dump($sku, $name, $price, $product_type_id);

    // Insert data into database
    $sql = "INSERT INTO product (sku, name, price, product_type_id) VALUES ('$sku', '$name', '$price', '$product_type_id')";
    $db->query($sql);

    // Get the inserted product ID
    $product_id = $db->insert_id();

    // Escape the weight value for SQL injection prevention
    $weight = $db->escape($weight);

    // Insert data into book table
    $sql = "INSERT INTO book (product_id, weight) VALUES ('$product_id', '$weight')";
    $db->query($sql);

    // Display success message
    echo "Book saved successfully!";
}
