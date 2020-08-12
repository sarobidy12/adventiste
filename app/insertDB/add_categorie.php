<?php
include("../../app/autoload.php");
use app\classe\use_database;
$use = new use_database;
$use->prepare("INSERT INTO sampana_categorie(type_sampana) VALUE(?)",array($_POST['name']));
echo "ok";
?>