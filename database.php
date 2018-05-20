<?php

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "RESTO_DB_BWB";
    private static $dbUsername = "root";
    private static $dbUserpassword = "root";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
                self::$connection->exec("SET CHARACTER SET utf8");
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>