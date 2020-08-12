<?php
namespace app\classe;
use app\classe\database;
use \PDO;

class getUser extends database{

    public static function nom($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['nom'];
        }
    }
    public static function prenom($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['prenom'];
        }
    }

    public static function sexe($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['sexe'];
        }
    }

    public static function anniversaire($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['anniversaire'];
        }
    }
    public static function functions($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['functions'];
        }
    }

    public static function eglise_origine($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['eglise_origine'];
        }
    }

    public static function eglise_actuele($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['eglise_actuele'];
        }
    }

    public static function bateme($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['bateme'];
        }
    }

    public static function adress($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['adress'];
        }
    }

    public static function telephone($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['telephone'];
        }
    }

    public static function date_inscription($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['date_inscription'];
        }
    }

    public static function function_church($id){
        $requette = parent::connectDB()->prepare("SELECT * FROM membres WHERE id= ?");
        $requette->execute(array($id));
        if($requette->rowCount() == 1){
            $a = $requette->fetch();
            return $a['function_church'];
        }
    }
}
?>