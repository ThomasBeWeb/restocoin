<?php



class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "RESTO_DB_BWB";
    private static $dbUsername = "root";
    private static $dbUserpassword = "password";
    
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

// final class Dao { //final empeche l'heritage

//     //Objet dao
//     private static $instance;

//     //Objet pdo (connecteur base de donnees)
//     private $pdo;

//     //Constructeur privé pour s'assurer que seule cette classe puisse creer un nouvel objet
//     private function __construct() {

//         $this->pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB","root","password");
//     }

//     /**
//      * Créé une nouvelle instance dao si elle n'existe pas
//      * Permet de s'assurer d'avoir qu'un exemplaire de l'objet Dao
//      * @return l'instance courante Dao
//      */
//     public static function get_instance() {

//         if(is_null(Dao::$instance)) {
//             Dao::$instance = new Dao();
//         }

//         return Dao::$instance;
//     }
// }
?>