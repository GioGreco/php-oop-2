<?php
require_once 'Product.php';
class Toy extends Product{
    public $brand;
    public $size;
    public $pet_category;

    public function __construct($_name, $_brand, $_size, PetCategory $_pet_category){
        parent::__construct($_name);
        $this->brand = $_brand;
        $this->size = $_size;
        $this->pet_category = $_pet_category;
    }
}