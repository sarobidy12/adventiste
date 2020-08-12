<?php

    include("../autoload.php");
    include("../connectDB.php");

    $update= $database->prepare("UPDATE membres SET 
                        nom =?,
                        prenom =?,
                        sexe =?,
                        anniversaire =?,
                        functions =?,
                        eglise_origine =?,
                        eglise_actuele =?,
                        bateme =?,
                        adress =?,
                        telephone =?
                        WHERE
                         id=?
    ");

    $update->execute(array($_POST['data'][0],
                           $_POST['data'][1],
                           $_POST['data'][2],
                           $_POST['data'][3],
                           $_POST['data'][4],
                           $_POST['data'][5],
                           $_POST['data'][6],
                           $_POST['data'][7],
                           $_POST['data'][8],
                           $_POST['data'][9],
                           $_POST['data'][10]
                        ));

                        echo "<center><b style='color:green;'>modification reussi</b></center>";
?>