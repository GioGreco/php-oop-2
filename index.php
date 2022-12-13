<?php
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/main.php';
include __DIR__ . '/partials/footer.php';

require_once __DIR__.'/Models/Product.php';
require_once __DIR__.'/Models/PetCategory.php';
require_once __DIR__.'/Models/Food.php';
require_once __DIR__.'/Models/PetHouse.php';
require_once __DIR__.'/Models/Toy.php';



$prodotto1 = new Product('Cibo in scatola');
var_dump($prodotto1);

$cibo1 = new Food('Carne in scatola', 'Frostis', 'macinato', 'pollo', new PetCategory('CANE'));
var_dump($cibo1);
?>