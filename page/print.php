        <?php
            require "../app/connectDB.php";
            require "../app/function_moi.php";
            require "../app/autoload.php";
            use \app\classe\getUser;
            $moi= $_POST['data'][0];
            $anne= $_POST['data'][1];
            $e=0;
            for($b = 1 ; $b <= 5; $b++){
                    $prepapre = $database->prepare("SELECT * FROM deposition WHERE month_deposition = ? AND  week_deposition= ? AND years_deposition = ? ");
                    $prepapre->execute(array($moi,$b,$anne));
                    if($prepapre->rowCount() >= 1){
                            while($a = $prepapre->fetch(PDO::FETCH_OBJ)){
                                            echo '<tr>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$e++.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->d_numero_recu.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->d_argent_total.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_argent.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_ampafolony.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_mission_federation.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_sekoly_sabate.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_fanambinana.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_tsingeritaona.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_sabata_13.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_fandrosoana.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->f_faritra_oasis.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->e_argent.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.$a->e_fiangonana.'</td>';
                                                    echo '<td style="width: 30vh;height: 10vh;text-align: center;font-size:1.5vh">'.($a->e_fampandrosoana + $a->e_faritra_manokana).'</td>';
                                            echo '</tr>';
                                }
                }
        }

?>