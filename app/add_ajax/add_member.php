<?php

include('../connectDB.php');

if($_POST != NULL){

    $insert = $database->prepare("INSERT INTO
                    membres(
                        nom,
                        prenom,
                        sexe,
                        anniversaire,
                        functions,
                        eglise_origine,
                        eglise_actuele,
                        bateme,
                        adress,
                        telephone,
                        function_church,
                        date_inscription
                    )

                    VALUE(?,?,?,?,?,?,?,?,?,?,?,NOW())   
                    ");
    
    $insert->execute(array(
                    $_POST['element'][0],
                    $_POST['element'][1],
                    $_POST['element'][2],
                    $_POST['element'][3],
                    $_POST['element'][4],
                    $_POST['element'][5],
                    $_POST['element'][6],
                    $_POST['element'][7],
                    $_POST['element'][8],
                    $_POST['element'][9],
                    "4"
                    )
    );
}
else{
    echo 'non';
}
