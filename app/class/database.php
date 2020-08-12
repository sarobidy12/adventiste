<?php

namespace app\classe;

class database{
    
 
    public static function connectDB(){
            $database = new \PDO('mysql:host=127.0.0.1;dbname=adventiste','root','');
            $database->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $database;
    }

}

?>