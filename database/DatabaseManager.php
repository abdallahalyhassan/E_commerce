<?php

namespace Database;

use PDO;
use PDOException;

class DatabaseManager
{
    private static array $config;
    private static ?PDO $con = null;

 
    private static function loadConfig(): void
    {
        if (!isset(self::$config)) {
            self::$config = require  '../config/database.php';
            
           
        }
    }


    private static function connect(bool $useDb = false): void
    {
        self::loadConfig();

        try {
            $dsn = "mysql:host=" . self::$config['host'];
            
            if ($useDb) {
                $dsn .= ";dbname=" . self::$config['dbname'];
            }
            
            self::$con = new PDO($dsn, self::$config['username'], self::$config['password']);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }


   
    private static function databaseExists(): bool
    {
        self::connect();
        $sql = self::$con->prepare("SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = :dbname");
        $sql->execute([':dbname' => self::$config['dbname']]);
        return $sql->fetchColumn() !== false;
    }


    private static function createDatabase(): void
    {
        if (!self::databaseExists()) {
            $dbName = self::$config['dbname'];
            self::$con->exec("CREATE DATABASE `" . addslashes($dbName) . "`");
        }
    }

    public static function getConnection(): PDO
    {
        if (!self::$con) {
            self::initialize();
        }
        return self::$con;
    }

    public static function initialize(): void
    {
        self::connect();
        self::createDatabase();
        self::connect(true);
    }
}
