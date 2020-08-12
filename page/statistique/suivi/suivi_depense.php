
<?php


include("../../../app/connectDB.php");
include("../../../app/autoload.php");
include("../../../app/function_moi.php");
include("../../../app/class/total.php");

use app\classe\getCategorie;
use app\classe\use_database;
$categorie = $_POST['data'][0];
$moi = $_POST['data'][1];
$sabate = $_POST['data'][2];
$anne = $_POST['data'][3];  

    if($sabate == "none" AND $categorie == "none" AND $moi == "none"){
        for($i = 1; $i <= 12 ; $i++){
            
            $result = $database->prepare("SELECT * FROM depense WHERE month_depense = ? AND years_depense = ? ");
        
            $result->execute(array($i,$anne));

            if($result->rowCount() >= 1 ){
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($i).'</b>
                                <b style="position:relative;right:-33vh;">Total:
                                '. number_format(totaldepenseMonth($database,$i,date('Y'))).'</b>
                                </div>';

                                    echo '<div class="vues" style="padding:2vh;">';

                                                        echo '<table>
                                                            <tr>
                                                                    <td style="width:20vh;height:5vh;">categorie</td>
                                                                    <td style="width:20vh;height:5vh;">argent</td>
                                                                    <td style="width:20vh;height:5vh">date</td>
                                                                </tr> 
                                                            ';
                                                            while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                            ?>
                                                                <tr>
                                                                    <td style="width:20vh"><?= getCategorie::categorie_sampana($a->categorie); ?></td>
                                                                    <td style="width:20vh"><?= number_format($a->argent); ?></td>
                                                                    <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                                </tr>
                                                            <?php   
                                                        }
                                                
                                                        echo '</table>';
                                    echo '</div>';
                echo '</div>';
            }
            else{
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                    echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($i).'</b>
                            </div>';

                        echo '<div class="vues" style="padding:2vh;">';
                        echo 'SANS DEPENSES';
                        echo '</div>';
                echo '</div>';
            }
        }
    }
    elseif($sabate == "none" AND $categorie != "none" AND $moi == "none")
    {
        for($i = 1; $i <= 12 ; $i++){
            
            $result = $database->prepare("SELECT * FROM depense WHERE  categorie =? AND  month_depense = ?   AND years_depense = ? ");
        
            $result->execute(array($categorie,$i,$anne));

            if($result->rowCount() >= 1 ){
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($i).'</b>
                                <b style="position:relative;right:-33vh;">Total:
                                '.number_format(totaldepenseMonth_byCategorie($database,$categorie,$i,$anne)).'</b>
                                </div>';
                                    echo '<div class="vues" style="padding:2vh;">';

                                                        echo '<table>
                                                            <tr>
                                                                    <td style="width:20vh;height:5vh;">categorie</td>
                                                                    <td style="width:20vh;height:5vh;">argent</td>
                                                                    <td style="width:20vh;height:5vh">date</td>
                                                                </tr> 
                                                            ';
                                                            while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                            ?>
                                                                <tr>
                                                                    <td style="width:20vh">
                                                                        <?php
                                                                                        if($a->sous_categorie === "none"){
                                                                                            echo getCategorie::categorie_sampana($a->categorie);
                                                                                        }else{
                                                                                            echo  getCategorie::sous_categorie_sampana($a->sous_categorie);
                                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td style="width:20vh"><?= number_format($a->argent);  ?></td>
                                                                    <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                                </tr>
                                                            <?php   
                                                        }
                                                
                                                        echo '</table>';
                                    echo '</div>';
                echo '</div>';
            }
            else{
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                    echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($i).'</b>
                            </div>';

                        echo '<div class="vues" style="padding:2vh;">';
                        echo 'SANS DEPENSES';
                        echo '</div>';
                echo '</div>';
            }
        }
    }
    elseif($sabate == "none" AND $categorie == "none" AND $moi != "none"){
        for($b = 1 ; $b <= 5 ; $b++){
            $result = $database->prepare("SELECT * FROM depense WHERE sabata_depense= ? AND month_depense = ?   AND years_depense = ? ");
            $result->execute(array($b,$moi,$anne));
            if($result->rowCount() >= 1 ){
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($moi).' sabata '.$b.'</b>
                                <b style="position:relative;right:-33vh;">Total:
                                '.number_format(totaldepenseMonth_bysabata($database,$b,$moi,$anne)).'</b>
                                </div>';
                                    echo '<div class="vues" style="padding:2vh;">';
                                                        echo '<table>
                                                            <tr>
                                                                    <td style="width:20vh;height:5vh;">categorie</td>
                                                                    <td style="width:20vh;height:5vh;">argent</td>
                                                                    <td style="width:20vh;height:5vh">date</td>
                                                                </tr> 
                                                            ';
                                                            while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                            ?>
                                                                <tr>
                                                                    <td style="width:20vh"><?php
                                                                                        if($a->sous_categorie === "none"){
                                                                                                echo getCategorie::categorie_sampana($a->categorie);
                                                                                            }else{
                                                                                                echo  getCategorie::sous_categorie_sampana($a->sous_categorie);
                                                                                            }
                                                                    ?></td>
                                                                    <td style="width:20vh"><?= number_format($a->argent);  ?></td>
                                                                    <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                                </tr>
                                                            <?php   
                                                        }
                                                
                                                        echo '</table>';
                                    echo '</div>';
                echo '</div>';
            }
            else{
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                    echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($moi).'</b>
                            </div>';

                        echo '<div class="vues" style="padding:2vh;">';
                        echo 'SANS DEPENSES';
                        echo '</div>';
                echo '</div>';
            }
        } 

    }
    elseif($sabate == "none" AND  $categorie != "none" AND $moi != "none"){
        for($c = 1; $c <= 5 ; $c++){

            $result = $database->prepare("SELECT * FROM depense WHERE sabata_depense = ? AND categorie = ? AND  month_depense = ?   AND years_depense = ? ");
            $result->execute(array($c,$categorie,$moi,$anne));
            if($result->rowCount() >= 1 ){
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
    
                                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($moi).' sabata :'.$c.'</b>
                                <b style="position:relative;right:-33vh;">Total:
                                '.number_format(totaldepense_bysabata_categorie($database,$c,$categorie,$moi,$anne)).'</b>
                                </div>';
                                    echo '<div class="vues" style="padding:2vh;">';
    
                                                        echo '<table>
                                                            <tr>
                                                                    <td style="width:20vh;height:5vh;">categorie</td>
                                                                    <td style="width:20vh;height:5vh;">argent</td>
                                                                    <td style="width:20vh;height:5vh">date</td>
                                                                </tr> 
                                                            ';
                                                            while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                            ?>
                                                                <tr>
                                                                    <td style="width:20vh"><?php
                                                                                    if($a->sous_categorie === "none"){
                                                                                        echo getCategorie::categorie_sampana($a->categorie);
                                                                                    }else{
                                                                                        echo  getCategorie::sous_categorie_sampana($a->sous_categorie);
                                                                                    }
                                                                       ?></td>
                                                                    <td style="width:20vh"><?= number_format($a->argent);  ?></td>
                                                                    <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                                </tr>
                                                            <?php   
                                                        }
                                                
                                                        echo '</table>';
                                    echo '</div>';
                echo '</div>';
            }
            else{
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
    
                    echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($moi).'</b>
                            </div>';
    
                        echo '<div class="vues" style="padding:2vh;">';
                        echo 'SANS DEPENSES';
                        echo '</div>';
                echo '</div>';
            }
        }
    }
    elseif($sabate != "none" AND  $categorie != "none" AND $moi != "none"){
            $result = $database->prepare("SELECT * FROM depense WHERE sabata_depense = ? AND categorie = ? AND  month_depense = ?   AND years_depense = ? ");
            $result->execute(array($sabate,$categorie,$moi,$anne));
            if($result->rowCount() >= 1 ){
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
    
                                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($moi).' sabata :'.$sabate.'</b>
                                <b style="position:relative;right:-33vh;">Total:
                                '.number_format(totaldepense_bysabata_categorie($database,$sabate,$categorie,$moi,$anne)).'</b>
                                </div>';
                                    echo '<div class="vues" style="padding:2vh;">';
                                                        echo '<table>
                                                            <tr>
                                                                    <td style="width:20vh;height:5vh;">categorie</td>
                                                                    <td style="width:20vh;height:5vh;">argent</td>
                                                                    <td style="width:20vh;height:5vh">date</td>
                                                                </tr> 
                                                            ';
                                                            while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                            ?>
                                                                <tr>
                                                                    <td style="width:20vh"><?php
                                                                                    if($a->sous_categorie === "none"){
                                                                                        echo getCategorie::categorie_sampana($a->categorie);
                                                                                    }else{
                                                                                        echo  getCategorie::sous_categorie_sampana($a->sous_categorie);
                                                                                    }
                                                                       ?></td>
                                                                    <td style="width:20vh"><?= number_format($a->argent);  ?></td>
                                                                    <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                                </tr>
                                                            <?php   
                                                        }
                                                
                                                        echo '</table>';
                                    echo '</div>';
                echo '</div>';
            }
            else{
                echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
    
                    echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($moi).'</b>
                            </div>';
    
                        echo '<div class="vues" style="padding:2vh;">';
                        echo 'SANS DEPENSES';
                        echo '</div>';
                echo '</div>';
            }
    }
    elseif($sabate != "none" AND  $categorie == "none" AND $moi != "none"){
        $result = $database->prepare("SELECT * FROM depense WHERE sabata_depense = ?  AND  month_depense = ?   AND years_depense = ? ");
        $result->execute(array($sabate,$moi,$anne));
        if($result->rowCount() >= 1 ){

            echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
                            echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                            <b>'.moi($moi).' sabata :'.$sabate.'</b>
                            <b style="position:relative;right:-33vh;">Total:
                            '.number_format(totaldepenseMonth_bysabata($database,$sabate,$moi,$anne)).'</b>
                            </div>';
                                echo '<div class="vues" style="padding:2vh;">';

                                                    echo '<table>
                                                        <tr>
                                                                <td style="width:20vh;height:5vh;">categorie</td>
                                                                <td style="width:20vh;height:5vh;">argent</td>
                                                                <td style="width:20vh;height:5vh">date</td>
                                                            </tr> 
                                                        ';
                                                        while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                        ?>
                                                            <tr>
                                                                <td style="width:20vh"><?php
                                                                                if($a->sous_categorie === "none"){
                                                                                    echo getCategorie::categorie_sampana($a->categorie);
                                                                                }else{
                                                                                    echo  getCategorie::sous_categorie_sampana($a->sous_categorie);
                                                                                }
                                                                   ?></td>
                                                                <td style="width:20vh"><?= number_format($a->argent);  ?></td>
                                                                <td style="width:20vh"><?= $a->date_depense;  ?></td>
                                                            </tr>
                                                        <?php   
                                                    }
                                                    echo '</table>';
                                echo '</div>';
            echo '</div>';
        }
        else{
            echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

                echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                        <b>'.moi($moi).'</b>
                        </div>';

                    echo '<div class="vues" style="padding:2vh;">';
                    echo 'SANS DEPENSES';
                    echo '</div>';
            echo '</div>';
        }
    }
    else{
        echo '<div class="vue" data-aos="fade-up" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';

        echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                <b></b>
                </div>';

            echo '<div class="vues" style="padding:2vh;">';
            echo 'SANS DEPENSES';
            echo '</div>';
    echo '</div>';
    }
?>