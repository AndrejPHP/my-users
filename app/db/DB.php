<?php

//database credentials
define("DB_SERVER", "localhost");
define("DB_NAME", "my_users");
define("DB_USER", "");
define("DB_PASSWORD", "");

class DB
{
    private static $db = null;

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}

    public static function getDB()
    {
        if(null === self::$db)
        {
            try {
                self::$db = new PDO("mysql:host=".DB_SERVER."; dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            }
            catch(PDOException $e) {
               echo "Error: " . $e->getMessage();
               exit();
           }
        }
        return self::$db;
    }
}
