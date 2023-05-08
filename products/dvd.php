<?php

class DVD extends Product {
    public $size;

    public function __construct($id, $sku, $name, $price, $product_type_id, $size) {
        parent::__construct($id, $sku, $name, $price, $product_type_id);
        $this->size = $size;
    }
}