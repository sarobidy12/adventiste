<?php
    include("../autoload.php");
    use app\classe\use_database;
    $new= new use_database;
    $new->prepare("DELETE FROM sampana_categorie WHERE id = ?",array($_POST['id']));
    $new->prepare("DELETE FROM sous_categorie_sampana WHERE id_categorie_sampana= ?",array($_POST['id']));

?>