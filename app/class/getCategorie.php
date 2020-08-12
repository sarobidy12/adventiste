<?php

    namespace app\classe;

    use app\classe\use_database;

    class getCategorie extends use_database{

        public static function categorie_sampana($id){

            $requette = parent::prepare("SELECT * FROM sampana_categorie WHERE id = ?", array($id));

            $a= $requette->fetch(\PDO::FETCH_OBJ);

            return $a->type_sampana;

        }

        public static function sous_categorie_sampana($id){

            $requette = parent::prepare("SELECT * FROM sous_categorie_sampana WHERE id_categorie_sampana = ?", array($id));
            $a= $requette->fetch(\PDO::FETCH_OBJ);
            return $a->type_sous_categorie;

        }
    }


?>