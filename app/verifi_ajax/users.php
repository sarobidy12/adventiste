<?php

    include('../connectDB.php');

    $verification = $database->prepare('SELECT * FROM membres WHERE id=?');

    $verification->execute(array($_POST['data'][0]));

    if($verification->rowCount() == 1){
        
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
    
        echo 'ok';

    }
    else
    {
        echo 'cette personne n\'existe pas';
    }

?>