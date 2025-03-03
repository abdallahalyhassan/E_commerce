<?php

 
use Database\DatabaseManager;
use Database\MigrationManager;
use App\User;

require_once "../vendor/autoload.php";


DatabaseManager::initialize();
MigrationManager::runMigrations();







$u=new User();
// $u->add_User("abdallah","aly","abdallah@gmail.com","123123123",'admin');
var_dump($u->getall());




// require_once "../routes/web.php";