<?php

    $id = $_POST['id'];

    include("../autoload.php");

    use app\classe\use_database;

    $use = new use_database;

        if($use->verifi($id) == true){
            echo '<h3>sous categorie</h3>';
            echo '<select id="sous_categorie">';
                foreach($use->query("SELECT * FROM sous_categorie_sampana WHERE id_categorie_sampana = $id") AS $a):
                    echo '<option value="'.$a->id_categorie_sampana.'">'.$a->type_sous_categorie.'</option>';
                endforeach;
            echo '</select>';
        }

?>