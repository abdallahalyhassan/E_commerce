<?php

use Database\DatabaseManager;
use Database\MigrationManager;
use App\User;
use App\Product;

require_once "../vendor/autoload.php";


DatabaseManager::initialize();
MigrationManager::runMigrations();


$u=new User();
// $u->add_User("abdallah","aly","abdallah@gmail.com","123123123",'admin');
// var_dump($u->getall());




// require_once "../routes/web.php";

$product = new Product(DatabaseManager::getConnection());
// $product->addProduct("iPhone 15", "Latest Apple iPhone", 1200, 10, 1, "iphone15.jpg");
// $product->updateProduct(6,"iPhone 14", "Latest Apple iPhone", 800, 10, 1, "iphone15.jpg");
// $allProducts = $product->getAllProducts();
// print_r($allProducts);
// $product->getProductById(6);
// print_r($product->getProductById(6));
// $product->deleteProduct(9);

// $return = $product->isInStock(6);
// var_dump($return);




