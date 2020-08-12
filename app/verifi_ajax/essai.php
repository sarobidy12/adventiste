<?php

    include('../connectDB.php');


    $verifi = $database->prepare('SELECT * FROM membres WHERE id= ?');
    $verifi->execute(array($_POST['data'][0]));

    if($verifi->rowCount() == 1){


        $insert = $database->prepare('INSERT INTO argent(
            agent,
            nom_users,
            categorie,
            day_argent_deposition,
            month_argent_deposition,
            years_argent_deposition,
            date_argent_deposition
        ) VALUE(?,?,?,?,?,?,now())');
    
        $insert->execute(array(
            $_POST['data'][1],
            $_POST['data'][0],
            $_POST['data'][2],
            date("d"), 
            date('m'),
            date('Y')
        )
        );

        var_dump($_POST['billetage']);

        $insert = $database->prepare('INSERT INTO 

           billetage( 
                id_users,
                M20,
                M10,
                M5,
                M2,
                M1,
                C5,
                C2,
                C1,
                day_bi_deposition,
                month_bi_deposition,
                years_bi_deposition,
                date_bi_deposition
            )

            VALUE(?,?,?,?,?,?,?,?,?,?,?,?,NOW())

        ');
        $insert->execute(array(
            $_POST['data'][0],
            $_POST['billetage'][0],
            $_POST['billetage'][1],
            $_POST['billetage'][2],
            $_POST['billetage'][3],
            $_POST['billetage'][4],
            $_POST['billetage'][5],
            $_POST['billetage'][6],
            $_POST['billetage'][7],
            date("d"), 
            date('m'),
            date('Y')
       ));

        echo sha1('ab');
    
    }
    else{
        echo 'cette personne n\'existe pas';
    }
?>