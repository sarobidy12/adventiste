<?php
    include("../autoload.php");
    use app\classe\use_database;
    $new= new use_database;
    $res= $new->prepare("SELECT * FROM sampana_categorie WHERE id = ?", array($_POST['id']));
    $a= $res->fetch(\PDO::FETCH_OBJ);
    echo $a->type_sampana;
?>