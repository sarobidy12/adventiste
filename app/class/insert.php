<?php
                            
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=adventiste','root','');

    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $element= array('1','2','3','4','5','6','7','8','9','10');

    $insert = $bdd->prepare("INSERT INTO
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
                        date_inscription
                    )

                    VALUE(?,?,?,?,?,?,?,?,?,?,now())                                  

                    ");
    
    $insert->execute(array(
                    $element[0],
                    $element[1],
                    $element[2],
                    $element[3],
                    $element[4],
                    $element[5],
                    $element[6],
                    $element[7],
                    $element[8],
                    $element[9]
                    )
    );
?>