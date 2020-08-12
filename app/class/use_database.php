<?php

namespace app\classe;

use app\classe\database;

use \PDO;

        class use_database extends database{

            public static function prepare($statement, $value){
                $result = parent::connectDB()->prepare($statement);
                $result->execute($value);
                return $result;
            }
           
            public static function query($statement){
                
                    $requette = parent::connectDB()->query($statement);
                    return $requette->fetchall(PDO::FETCH_OBJ);
            }

            public static function verifi_user($id){

                    $result = parent::connectDB()->prepare("SELECT * FROM membres WHERE id=?");
                    $result->execute(array($id));

                    if($result->rowCount() == 1){
                        return true;
                    }
                    else{
                        return false;
                    }

            }

            public static function verifi($value){
                $result = parent::connectDB()->prepare("SELECT * FROM sous_categorie_sampana WHERE id_categorie_sampana = ?");
                $result->execute(array($value));
                if($result->rowCount() > 1){
                    return true;
                }else{
                    return false;
                };
            }

            public static function comfirm($statement,$value){
                $result = parent::connectDB()->prepare($statement);
                $result->execute(array($value));
                if($result->rowCount() >= 1){
                    return true;
                }else{
                    return false;
                };
            }
           
        }

?>