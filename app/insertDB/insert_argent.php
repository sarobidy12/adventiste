<?php

include('../connectDB.php');
include('../function_moi.php');
include('../autoload.php');

use app\classe\use_database;
use app\classe\getUser;

            $verifi = $database->prepare('SELECT * FROM membres WHERE id= ?');
            $verifi->execute(array($_POST['data'][1]));
    
            if($verifi->rowCount() == 1){
                
                $sabata= numWeek();
                $moi= date('m');
                $anne= date('Y');

                $double = $database->prepare("SELECT * FROM deposition WHERE d_id_users= ? AND week_deposition = $sabata AND month_deposition = $moi AND years_deposition = $anne");
                $double->execute(array($_POST['data'][1]));

                if($double->rowCount() === 0){

                    $insert = $database->prepare('INSERT INTO deposition_federation(
                        numero_recu,
                        id_users,
                        argent_total,
                        ampafoliny,
                        mission_federation,
                        sekoly_sabate,
                        fanabinana,
                        tsingeritaona,
                        sabata_13,
                        fandrosoana,
                        faritra_oasis,
                        day_deposition_federation,
                        week_deposition_federation,
                        month_deposition_federation,
                        years_deposition_federation
                    )
                    
                    VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ');
                
                    $insert->execute(array(
                        $_POST['data'][0],
                        $_POST['data'][1],
                        $_POST['federation'][0],
                        $_POST['federation'][1],
                        $_POST['federation'][2],
                        $_POST['federation'][3],
                        $_POST['federation'][4],
                        $_POST['federation'][5],
                        $_POST['federation'][6],
                        $_POST['federation'][7],
                        $_POST['federation'][8],
                        date("d"), 
                        numWeek(),
                        intval(date('m'),0),
                        date('Y')
                    )
                    );

                    $insert_deposition = $database->prepare('INSERT INTO deposition(
                        d_numero_recu,
                        d_id_users,
                        d_argent_total,
                        f_argent,
                        f_ampafolony,
                        f_mission_federation,
                        f_sekoly_sabate,
                        f_fanambinana,
                        f_tsingeritaona,
                        f_sabata_13,
                        f_fandrosoana,
                        f_faritra_oasis,
                        e_argent,
                        e_fiangonana,
                        e_fampandrosoana,
                        e_faritra_manokana,
                        week_deposition,
                        month_deposition,
                        years_deposition
                        )

                        VALUE(
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?
                        )
                    ');

                    $insert_deposition->execute(array(
                        $_POST['data'][0],
                        $_POST['data'][1],
                        $_POST['data'][2],
                        $_POST['federation'][0],
                        $_POST['federation'][1],
                        $_POST['federation'][2],
                        $_POST['federation'][3],
                        $_POST['federation'][4],
                        $_POST['federation'][5],
                        $_POST['federation'][6],
                        $_POST['federation'][7],
                        $_POST['federation'][8],
                        $_POST['eglise'][0],
                        $_POST['eglise'][1],
                        $_POST['eglise'][2],
                        $_POST['eglise'][3],
                        numWeek(),
                        intval(date('m'),0),
                        date('Y')
                    ));

                    
                    $insert_eglise = $database->prepare('INSERT INTO deposition_eglise(
                        num_recu,
                        argent,
                        id_users,
                        fiangonana,
                        fampandrosoana,
                        faritra_manokana,
                        day_deposition_eglise,
                        week_deposition_eglise,
                        month_deposition_eglise,
                        years_deposition_eglise
                    )
                    
                    VALUE(?,?,?,?,?,?,?,?,?,?) ');
                
                    $insert_eglise->execute(array(
                        $_POST['data'][0],
                        $_POST['eglise'][0],
                        $_POST['data'][1],
                        $_POST['eglise'][1],
                        $_POST['eglise'][2],
                        $_POST['eglise'][3],
                        date("d"), 
                        numWeek(),
                        intval(date('m'),0),
                        date('Y')
                    )
                    );

                    //calcul du bielletage;
                    $new = new use_database;
                    $billet = $new->prepare("SELECT * FROM billetage WHERE id = ?", array("1"));
                    $a= $billet->fetch(PDO::FETCH_OBJ);
                    $M20 = $_POST['billetage'][0] + $a->M20;
                    $M10 = $_POST['billetage'][1] + $a->M10;
                    $M5 = $_POST['billetage'][2] + $a->M5;
                    $M2 = $_POST['billetage'][3] + $a->M2;
                    $M1 = $_POST['billetage'][4] + $a->M1;
                    $C5 = $_POST['billetage'][5] + $a->C5;
                    $C2 = $_POST['billetage'][6] + $a->C2;
                    $C1 = $_POST['billetage'][7] + $a->C1;
                    $t5 = $_POST['billetage'][8] + $a->t5;
                    $t2 = $_POST['billetage'][9] + $a->t2;
                    $t1 = $_POST['billetage'][10] + $a->t10;

                    $ry= $database->prepare("INSERT INTO billetage_users(
                        id_users,
                        B_M20,
                        B_M10,
                        B_M5,
                        B_M2,
                        B_M1,
                        B_C5,
                        B_C2,
                        B_C1,
                        B_T5,
                        B_T2,
                        b_T10,
                        week_billetage,
                        month_billetage,
                        years_billetage
                    ) 
                    
                    VALUE(
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?
                    )");

                     $ry->execute(array($_POST['data'][1],
                                        $_POST['billetage'][0],
                                        $_POST['billetage'][1],
                                        $_POST['billetage'][2],
                                        $_POST['billetage'][3],
                                        $_POST['billetage'][4],
                                        $_POST['billetage'][5],
                                        $_POST['billetage'][6],
                                        $_POST['billetage'][7],
                                        $_POST['billetage'][8],
                                        $_POST['billetage'][9],
                                        $_POST['billetage'][10],
                                        numWeek(),
                                        date('m'), 
                                        date('Y'))
                    );

                    $req= $new->prepare("SELECT * FROM argent_now WHERE id=?",array("1"));
                    $a= $req->fetch(PDO::FETCH_OBJ);
                    $argent = $a->argent_now + $_POST['data'][2];
                    $new->prepare("UPDATE argent_now SET argent_now=? WHERE id=?",array($argent,'1'));
                    echo "<center>";
                    echo "<b>".getUser::nom($_POST['data'][1])."</b>  ".getUser::prenom($_POST['data'][1])." a deposer <b style='color:green'>".$_POST['data'][2]." arriary </b>";
                    echo "</center>";
                                            
                }
                else{
                    echo "<b>".getUser::nom($_POST['data'][1])."</b>  ".getUser::prenom($_POST['data'][1])." a deja deposer </b>";

                }
        }
        else{
                echo '<b>cette personne n\'existe pas</b>';
        }

?>