<?php
require_once 'Product.php';
class Toy extends Product{
    protected $brand;
    protected $genre;

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

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getGenre()
    {
        return $this->genre;
    }


}