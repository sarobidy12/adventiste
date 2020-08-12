

<?php

require "../../../app/connectDB.php";
require "../../../app/function_moi.php";
require "../../../app/autoload.php";

use \app\classe\getUser;

$sabata= $_POST['data'][0];
$moi= $_POST['data'][1];
$anne= $_POST['data'][2];
if($sabata == "none"){

        $f=1;
 for($b = 1 ; $b <= 5; $b++){
         
            $prepapre = $database->prepare("SELECT * FROM deposition WHERE month_deposition = ? AND  week_deposition= ? AND years_deposition = ? ");
            $prepapre->execute(array($moi,$b,$anne));

            if($prepapre->rowCount() >= 1){
                echo " <div class='recap_suivi' data-aos='fade-up'>";

                echo '<h1> sabata :'.$b.'</h1>';

                include('../en_tete.php');
                    while($a=$prepapre->fetch(\PDO::FETCH_OBJ)){

                                echo '<tr>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.$f++.'</td>';
                                        echo '<td style="width: 50vh;height: 6vh;text-align: center;padding:0.8;font-size:1.5vh">'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->d_numero_recu).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->d_argent_total).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_argent).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_ampafolony).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_mission_federation).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_sekoly_sabate).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_fanambinana).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_tsingeritaona).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_sabata_13).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_fandrosoana).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->f_faritra_oasis).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->e_argent).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format($a->e_fiangonana).'</td>';
                                        echo '<td style="width: 20vh;height: 6vh;text-align: right;padding:2px;font-size:1.5vh">'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</td>';
                                 echo '</tr>';
                    }
                    echo '</div>';

                    
            }
            else{
                echo '
                        <div class="recap_suivi" style="height:auto;margin:2vh auto" data-aos="fade-up">
                                <h1> le sabata : '.$b.'</h1>
                                        <p style="padding:2vh">Aucune deposition</p>
                ';
            }
            echo '</table>';
            echo '</div>';

        }
}
else if($sabata != "none"){

            $prepapre = $database->prepare("SELECT * FROM deposition WHERE week_deposition= ?  AND years_deposition = ?  AND month_deposition = $moi  ");
            $prepapre->execute(array($sabata,$anne));
                $f=0;
            if($prepapre->rowCount() >= 1){
                echo " <div class='recap_suivi' data-aos='fade-up'>";
                echo '<h1 >  <b> moi:</b> '.moi($moi).' sabata faha '.$sabata.'</h1>';
                echo '<a class="pdf" href="generate.php?w='.$sabata.'&m='.$moi.'&y='.$anne.'">Pdf</a>';
                
                include('../en_tete.php');
                    while($a=$prepapre->fetch(\PDO::FETCH_OBJ)){
                                echo '<tr>';
                                 echo '<td style="width:20vh;height:6vh;text-align: center;font-size:1.5vh">'.$f++.'</td>';
                                        echo '<td style="width:50vh;height: 6vh;text-align: center;padding:0.9vh;font-size:1.5vh"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->d_numero_recu).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->d_argent_total).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_argent).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_ampafolony).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_mission_federation).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_sekoly_sabate).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_fanambinana).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_tsingeritaona).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_sabata_13).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_fandrosoana).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->f_faritra_oasis).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->e_argent).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format($a->e_fiangonana).'</td>';
                                        echo '<td style="width:20vh;height: 6vh;text-align: right;padding:3px;font-size:1.5vh">'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</td>';
                                 echo '</tr>';
                                echo '</div>';
                    }
            }
            else
            {
                echo " <div class='recap_suivi' data-aos='fade-up'>";

                echo ' 
                <div style="height:auto;margin:2vh auto" >
                <h1> le sabata : '.$sabata.'</h1>
                        <p style="padding:2vh">Aucune deposition</p>
                </div>';
            echo '</div>';

            }
            echo '</table>';
}
?>
