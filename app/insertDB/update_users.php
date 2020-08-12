<?php


include('../connectDB.php');
include('../function_moi.php');
include('../autoload.php');

use app\classe\use_database;
            $verifi = $database->prepare('SELECT * FROM membres WHERE id= ?');
            $verifi->execute(array($_POST['data'][1]));
                
                    $sabata= numWeek();
                    $moi= date('m');
                    $anne= date('Y');

                    $argent_before = $database->prepare("SELECT * FROM deposition WHERE d_id_users=? AND week_deposition= $sabata AND month_deposition = $moi AND years_deposition = $anne");
                    $argent_before->execute(array($_POST['data'][1]));
                    $new = new use_database;
    
                    if($argent_before->rowCount() == 1){ 
                        
                            $x = $argent_before->fetch(\PDO::FETCH_OBJ);
                            $req= $new->prepare("SELECT * FROM argent_now WHERE id=?",array("1"));
                            $a= $req->fetch(PDO::FETCH_OBJ);

                            if($_POST['data'][2] > $x->d_argent_total){

                                     $r = $_POST['data'][2] - $x->d_argent_total;
                                     $argent = $a->argent_now + $r;
                                     $new->prepare("UPDATE argent_now SET argent_now=? WHERE id=?",array($argent,'1'));
                                     echo "Augmenter";

                            }
                            elseif ($_POST['data'][2] < $x->d_argent_total) {
                                
                                    $r =  $x->d_argent_total - $_POST['data'][2];
                                    $argent = $a->argent_now - $r;

                                    array($r,$_POST['data'][2],$x->d_argent_total);
                                    $new->prepare("UPDATE argent_now SET argent_now=? WHERE id=?",array($argent,'1'));
                                    echo "Diminuer";
                            }
                            else{
                                echo "element deja modifier";
                            }
                           
                    }
                    else{
                        echo "erreur est survenue";
                    }

          if($verifi->rowCount() == 1){

                   $insert = $database->prepare('UPDATE deposition_federation SET 
                       numero_recu  =? ,
                       argent_total  =? ,
                       ampafoliny  =? ,
                       mission_federation  =? ,
                       sekoly_sabate  =? ,
                       fanabinana  =? ,
                       tsingeritaona  =? ,
                       sabata_13  =? ,
                       fandrosoana  =? ,
                       faritra_oasis  =?
                       WHERE 
                       day_deposition_federation  =? AND
                       week_deposition_federation  =?  AND
                       month_deposition_federation  =?  AND
                       years_deposition_federation  =?  AND 
                       id_users =? 
                  ');
                
                   $insert->execute(array(
                       $_POST['data'][0],
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
                       date('Y'),
                       $_POST['data'][1]
                   )
                   );
                   $insert_deposition = $database->prepare('UPDATE deposition SET 
                       d_numero_recu  =?,
                       d_argent_total  =?,
                       f_argent  =?,
                       f_ampafolony  =?,
                       f_mission_federation  =?,
                       f_sekoly_sabate  =?,
                       f_fanambinana  =?,
                       f_tsingeritaona  =?,
                       f_sabata_13  =?,
                       f_fandrosoana  =?,
                       f_faritra_oasis  =?,
                       e_argent  =?,
                       e_fiangonana  =?,
                       e_fampandrosoana  =?,
                       e_faritra_manokana  =?
                       WHERE  
                       week_deposition  =? AND
                       month_deposition  =? AND
                       years_deposition =? AND
                       d_id_users =?
                   ');

                   $insert_deposition->execute(array(
                       $_POST['data'][0],
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
                       date('Y'),
                       $_POST['data'][1]
                   ));

                    
                   $insert_eglise = $database->prepare('UPDATE deposition_eglise SET 
                       num_recu =?,
                       argent =?,
                       fiangonana =?,
                       fampandrosoana =?,
                       faritra_manokana =?,
                       day_deposition_eglise =?
                       WHERE 
                       week_deposition_eglise =? AND 
                       month_deposition_eglise =? AND 
                       years_deposition_eglise =? AND 
                       id_users =?
                   ');                
                   $insert_eglise->execute(array(
                       $_POST['data'][0],
                       $_POST['eglise'][0],
                       $_POST['eglise'][1],
                       $_POST['eglise'][2],
                       $_POST['eglise'][3],
                       date("d"), 
                       numWeek(),
                       intval(date('m'),0),
                       date('Y'),
                       $_POST['data'][1]
                   )
                   );

                 
                 $ry= $database->prepare("UPDATE  billetage_users SET 
                       B_M20 =?,
                       B_M10 =?,
                       B_M5 =?,
                       B_M2 =?,
                       B_M1 =?,
                       B_C5 =?,
                       B_C2 =?,
                       B_C1 =?,
                       B_T5 =?,
                       B_T2 =?,
                       b_T10 =?
                       WHERE 
                       week_billetage =? AND
                       month_billetage =? AND
                       years_billetage =? AND
                       id_users =?
                ");
                    $ry->execute(array(
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
                                       date('Y'),$_POST['data'][1])
                   );
            }
       else{
               echo 'cette personne n\'existe pas';
       }

?>