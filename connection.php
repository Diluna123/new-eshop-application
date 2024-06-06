<?php

class Database{

    public static $connection;

    public static function setupConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "Corei3diluna09", "black42_shop","3306");
        }
    
    }

    public static function search($query){
        Database::setupConnection();
        $rs = Database::$connection->query($query);
        return $rs;
    }
    public static function iud($query){
        Database::setupConnection();
        Database::$connection->query($query);
    }
}



?>