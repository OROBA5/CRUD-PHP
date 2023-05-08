<?php 
require_once('../init.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Page</title>
    <link rel="stylesheet" href="../assets/CSS/bootstrap.min.css">
</head>

<form id="myForm" method="post">
    <label for="sku">SKU:</label>
    <input type="text" id="sku" name="sku">
  
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
  
    <label for="price">Price:</label>
    <input type="number" id="price" name="price">
  
    <label for="type">Type:</label>
    <select id="type" name="type" onchange="changeActionForm()">
      <option value="">Select a type</option>
      <option value="3">Book</option>
      <option value="1">DVD</option>
      <option value="2">Furniture</option>
    </select>

  
    <div id="book-fields" class="hidden">
  <label for="weight">Weight:</label>
  <input type="number" id="weight" name="weight">
</div>

<div id="dvd-fields" class="hidden">
  <label for="size">Size:</label>
  <input type="text" id="size" name="size">
</div>

<div id="furniture-fields" class="hidden">
    <label for="height">Height:</label>
    <input type="number" id="height" name="height">

  <label for="width">width:</label>
  <input type="number" id="width" name="width">

  <label for="length">Length:</label>
  <input type="number" id="length" name="length">
</div>

  
    <button type="submit">Submit</button>
  </form>

<footer>
    <!-- jQuery library (required by Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JavaScript file -->
    <script src="../assets/JS/bootstrap.min.js"></script>
    <script src="../assets/JS/index.js"></script>
</footer>