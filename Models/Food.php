<?php
require_once 'Product.php';
class Food extends Product{
    protected $brand;
    protected $preparation;
    protected $taste;


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

    public function setPreparation($_preparation)
    {
        $this->preparation = $_preparation;
    }

    public function getPreparation()
    {
        return $this->preparation;
    }

    public function setTaste($_taste)
    {
        $this->taste = $_taste;
    }

    public function getTaste()
    {
        return $this->taste;
    }
}