<?php
require_once 'Product.php';
class petCategory{
    private $petType;

    public function __construct($_petType){
        $this->petType = $_petType;
    }

    public function getProductCategory(){
        $petCategory = $this->petType;
        return $petCategory;
    }
}