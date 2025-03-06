<?php

use App\Shiping;
use Database\DatabaseManager;
use Database\MigrationManager;
use App\User;
use App\Product;
use App\Order;
use App\Category;
use App\Payment;
use App\Blogs;
use App\Comment;
use App\Slider;
session_start();


require_once "../vendor/autoload.php";


DatabaseManager::initialize();
MigrationManager::runMigrations();




// $u=new User();
// $u->add_User("abdallah","aly","abdallah@gmail.com","123123123",'admin');
// $p=new Order();
// $p->createOrder('1','500');
// var_dump($u->getall());

// $pay=new Payment();
// $pay->DefultPayment(1,1);
// $pay->MakePayment(1,1,"complete");
// $c=new Category();
// $c->AddCategory('bocks');
// $c->DeleteCategory(3);
// var_dump( $c->GetAllCategory());
// require_once "../routes/web.php";


// $c=new Comment();
// $c->CreateComment(3,1,"new comment");
// $c->UpdateComment("new content",1);
// $c->DeleteComment(1);
//  $c->GetCommentsByBlog(3);
// var_dump($c->GetCommentsByBlog(3));



// $s=new Slider() ;
// $s->createSlider(2,"new slider","new",20);
// $s->deleteSlider(2);
// var_dump($s->getAllSlider());

// $b=new Blogs();
// $b->CreateBlog(2,1,"iphdas  on",'des');
// var_dump($b->DeleteBloge(4))     ;

// $product = new Product();
// $product->addProduct("iPhone 15", "Latest Apple iPhone", 1200, 10, 1, "iphone15.jpg");
// $product->updateProduct(6,"iPhone 14", "Latest Apple iPhone", 800, 10, 1, "iphone15.jpg");
// $allProducts = $product->getAllProducts();
// print_r($allProducts);
// $product->getProductById(6);
// print_r($product->getProductById(6));
// $product->deleteProduct(9);


// $return = $product->isInStock(6);
// var_dump($return);


// $sh= new Shiping();
// $sh->CreateShiping(1    ,1,"aswan",'nag','egypt');
// $sh->CombleteShiping(1,'done');













require_once "../routes/web.php";
