<?php

require_once __DIR__.'/..'.'/Models/Product.php';
require_once __DIR__ .'/..'.'/Models/Food.php';
require_once __DIR__ .'/..'.'/Models/Toy.php';
require_once __DIR__ .'/..'.'/Models/PetHouse.php';
require_once __DIR__ .'/..'.'/Models/PetCategory.php';


define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'animal_store');

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn && $conn->connect_error){
    echo 'Connection to DB failed: ' . $conn->connect_error;
}
function getDatabaseLength($conn){
    $stmt = $conn->prepare("SELECT COUNT(*) AS 'totProducts' FROM `products`");

    $stmt->execute();
    $result = $stmt->get_result();

    $totProducts = $result->fetch_assoc();

    return $totProducts['totProducts'];
}

$databaseLength = getDatabaseLength($conn);
function getOneProduct(Int $fetchedID, $conn)
    {
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE `id` = ?");
        $stmt->bind_param('s', $fetchedID);

        $stmt->execute();
        $result = $stmt->get_result();

        $product = $result->fetch_object();

        return $product;
    }

// $gioco = new Toy('ffff', 'dsdsds', 'adas', $categoria);
// var_dump($gioco);

$productList = [];


$i = 1;
while(count($productList) < $databaseLength){
    $stdProduct = getOneProduct($i, $conn);
    // var_dump($stdProduct);

    if($stdProduct->category){
        $newCategory = new PetCategory($stdProduct->category);
    }else{
        $newCategory = null;
    }

    if($stdProduct->kind == 'product'){
        $newProduct = new Product($stdProduct->name, $stdProduct->img, $stdProduct->price, $newCategory);
    }else if($stdProduct->kind === 'food'){
        $newProduct = new Food($stdProduct->name, $stdProduct->img, $stdProduct->price, $newCategory);
        $newProduct->setPreparation($stdProduct->preparation);
        $newProduct->setTaste($stdProduct->taste);
    }else if($stdProduct->kind === 'toy'){
        $newProduct = new Toy($stdProduct->name, $stdProduct->img, $stdProduct->price, $newCategory);
        $newProduct->setGenre($stdProduct->genre);
    }else if($stdProduct->kind === 'pet-house'){
        $newProduct = new PetHouse($stdProduct->name, $stdProduct->img, $stdProduct->price, $newCategory);
        $newProduct->setType($stdProduct->type);
        $newProduct->setMaterial($stdProduct->material);
    }

    $newProduct->setId($i);

    $newProduct->setBrand($stdProduct->brand);

    $weight = rand(0, 130);
    $newProduct->setWeight($weight, 'kg');

    try{
        $newProduct->allocateStorage($weight);
    }
    catch(Exception $e){
        echo 'Message: ' . $e->getMessage();
    }

    array_push($productList, $newProduct);
    $i++;
}
// var_dump($productList);

?>
<div class="container">

    <div class="p-4">
        <header class="d-flex justify-content-center p-5 text-white">
            <h1>My animal shop <i class="fa-solid fa-dog"></i></h1>
        </header>
        <div class="row g-5">
            <?php
            foreach($productList as $product) {
            ?>
                <div class="product-card col-4 text-center position-relative">
                    <div class="product-pic">
                        <img src="<?php echo $product->img?>" alt="<?php echo $product->name?> pic">
                    </div>
                    <h3 class="product-name"><span><?php echo $product->name?></span></h3>
                    <div class="price fs-4"><span><?php echo $product->price?> €</span></div>
                    <div class="brand text-uppercase text-secondary p-4"><span><?php echo $product->getBrand()?></span></div>
                    <div class="category position-absolute">
                        <?php
                        if ($product->getClassName() == 'Food') {
                        ?>
                        <i class="fa-solid fa-drumstick-bite"></i>
                        <?php
                        }else if($product->getClassName() == 'Toy'){
                        ?>
                        <i class="fa-solid fa-puzzle-piece"></i>
                        <?php
                        } else if ($product->getClassName() == 'PetHouse') {
                        ?>
                        <i class="fa-solid fa-house"></i>
                        <?php
                        } else {
                        ?>
                        <i class="fa-regular fa-circle-question"></i>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


</div>