<?php
require_once __DIR__ . '/..' . '/Traits/Weight.php';

/**
 * Summary of Product
 * class Product
 * @author giorgiogreco <email>
 * @extends
 */
class Product{
    use Weight;
    private $id;
    public $name;
    public $img;
    public $price;

    public $pet_category;

    protected $brand;

    protected $storedAt;
    
    public function __construct(String $_name, String $_img, $_price,PetCategory $_pet_category){
        $this->name = $_name;
        $this->img = $_img;
        $this->price = $_price;
        $this->pet_category = $_pet_category;
    }
    public function getProductInfos(){
        $productPrice = $this->price;
        $productId = $this->id;

        return "ID prodotto: $productId - Prezzo: $productPrice";
    }
    public function getProductImg(){
        return $this->img;
    }

    public function allocateStorage($_weight){
        if($_weight < 20){
            $this->storedAt = 'piccolo magazzino';
        }else if($_weight > 20){
            $this->storedAt = 'deposito';
        }else if(!is_int($_weight)){
            throw new Exception('Invalid weight value');
        }
    }

    public function setId($_id){
        $this->id = $_id;
    }

    public function setBrand($_brand)
    {
        $this->brand = $_brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }
}