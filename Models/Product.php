<?php

class Product{
    private $id;
    public $name;
    private $img;
    private $price;
    
    public function __construct(String $_name){
        $this->name = $_name;
    }

    public function getProductInfos(){
        $productPrice = $this->price;
        $productId = $this->id;

        return "ID prodotto: $productId - Prezzo: $productPrice";
    }

    public function getProductImg(){
        return $this->img;
    }
}