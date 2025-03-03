<?php
 
use Database\DatabaseManager;
use Database\MigrationManager;

require_once "../vendor/autoload.php";

DatabaseManager::initialize();
MigrationManager::runMigrations();


require_once "../routes/web.php";