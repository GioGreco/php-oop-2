<?php
require_once 'Product.php';
class PetHouse extends Product{
    public $brand;
    public $size;
    public $material;
    public $type;

    public function __construct($_name, $_brand, $_size, $_material, $_type){
        parent::__construct($_name);
        $this->brand = $_brand;
        $this->size = $_size;
        $this->material = $_material;
        $this->type = $_type;
    }
}