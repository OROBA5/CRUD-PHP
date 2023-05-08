<?php

class Product {
    public $id;
    public $sku;
    public $name;
    public $price;
    public $product_type_id;

    public function __construct($id, $sku, $name, $price, $product_type_id) {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->product_type_id = $product_type_id;
    }
}