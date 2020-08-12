<?php
include("../../app/autoload.php");
use app\classe\use_database;
$use = new use_database;
$use->prepare("INSERT INTO sous_categorie_sampana(id_categorie_sampana,type_sous_categorie) VALUE(?,?)",array($_POST['data'][0],$_POST['data'][1]));
ECHO "OK";
?>
