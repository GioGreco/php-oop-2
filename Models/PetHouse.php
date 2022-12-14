<?php
require_once 'Product.php';
class PetHouse extends Product{
    protected $brand;
    protected $type;
    protected $material;

    public function __construct($_name, $_img, $_price, PetCategory $_pet_category){
        parent::__construct($_name, $_img, $_price, $_pet_category);
    }

    function getClassName()
    {
        return get_class();
    }

    public function setBrand($_brand)
    {
        $this->brand = $_brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setType($_type)
    {
        $this->type = $_type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setMaterial($_material)
    {
        $this->material = $_material;
    }

    public function getMaterial()
    {
        return $this->material;
    }
}