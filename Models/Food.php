<?php
require_once 'Product.php';
class Food extends Product{
    public $brand;
    public $preparation;
    public $taste;

    public $pet_category;

    public function __construct($_name, String $_brand,String $_preparation,String $_taste, PetCategory $_pet_category){
        parent::__construct($_name);
        $this->brand = $_brand;
        $this->preparation = $_preparation;
        $this->taste = $_taste;
        $this->pet_category = $_pet_category;
    }

}