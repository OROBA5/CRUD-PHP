<?php

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