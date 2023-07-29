<?php 
   class Database{
        private static $dbHost = "localhost";
        private static $dbName = "learn4all_database";
        private static $dbUser = "root";
        private static $dbUserPassword = "";

        private static $connection = null;

        public static function connect(){

            try {
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbUserPassword);
            } catch (PDOException $e) {
                die ($e->getMessage());
            }
            return self::$connection;
        }

        public static function disconnect(){
            self::$connection = null;
        }
   }
  
   //Fichier Connexion à notre base de données 
   //Database::connect();

?>