<?php
    
    require "../../../app/connectDB.php";
    require "../../../app/function_moi.php";
    require "../../../app/class/total.php";

$categorie= $_POST['data'][0];
$sabata= $_POST['data'][1];
$moi= $_POST['data'][2];
$anne= $_POST['data'][3];

if($categorie == "1"){

    if($_POST['data'][2] == "none"){

        for($i= 1; $i<= 12; $i++){

            echo '<div class="view" data-aos="fade-left">';
            echo '<h1 >'.moi($i).'<b style="float:right">total:'.number_format(total_element_federation($database,"argent_total",$i,$anne)).'</b></h1>';
            echo '<div class="veiw_content">';
            echo  '<table>';
                        $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                        while($a = $requette->fetch(PDO::FETCH_OBJ)){
                            echo '<tr>';
                                echo '<td style="width:125vh;height:4vh">';
                                echo $a->federation_type;
                                echo '</td>';
                                echo '<td style="text-align:end">';
                                echo number_format(total_element_federation($database,$a->titre_deposition,$i,$anne));
                                echo '</td>';
                            echo '</tr>';
                        }
            echo '</table>';
            echo '</div>';
            echo '</div>';
      }
    }
        else if($_POST['data'][1] == "none" AND $_POST['data'][2] != "none"){
        for($i= 1; $i <= 5; $i++){
            echo '<div class="view" data-aos="fade-left">';
            echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$i.'</b> <b style="float:right">total:'.number_format(total_element_federation_by_sabat($database,"argent_total",$moi,$i,$anne)).'</b></h1>';
            echo '<div class="veiw_content">';
            echo  '<table>';
                          $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                          while($a = $requette->fetch(PDO::FETCH_OBJ)){
                              echo '<tr>';
                                  echo '<td style="width:125vh;height:4vh">';
                                  echo $a->federation_type;
                                  echo '</td>';
                                  echo '<td style="text-align:end">';
                                  echo  number_format(total_element_federation_by_sabat($database,$a->titre_deposition,$moi,$i,$anne));
                                  echo '</td>';
                              echo '</tr>';
                          }
              echo '</table>';
              echo '</div>';
              echo '</div>';
        }
    }
    else if($_POST['data'][1] != "none" AND $_POST['data'][2] != "none"){
            echo '<div class="view" data-aos="fade-left">';
            echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$sabata.'</b> <b style="float:right">total:'.number_format(total_element_federation_by_sabat($database,"argent_total",$moi,$sabata,$anne)).'</b></h1>';
            echo '<div class="veiw_content">';
            echo  '<table>';
                          $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                          while($a = $requette->fetch(PDO::FETCH_OBJ)){
                              echo '<tr>';
                                  echo '<td style="width:125vh;height:4vh">';
                                  echo $a->federation_type;
                                  echo '</td>';
                                  echo '<td style="text-align:end">';
                                  echo number_format(total_element_federation_by_sabat($database,$a->titre_deposition,$moi,$sabata,$anne));
                                  echo '</td>';
                              echo '</tr>';
                          }
              echo '</table>';
              echo '</div>';
              echo '</div>';
    }
}
else{
    if($_POST['data'][2] == "none"){

        for($i= 1; $i<= 12; $i++){

            echo '<div class="view" data-aos="fade-left">';
            echo '<h1>'.moi($i).'<b style="float:right">total:'.number_format(total_element_eglise($database,"argent",$i,$anne)).'</b></h1>';
            echo '<div class="veiw_content">';
            echo  '<table>';
            '<table>';
                $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');

                while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                    echo '<tr>';
                        echo '<td style="width:125vh;height:4vh">';
                        echo $b->categorie_eglise_type;
                        echo '</td>';
                        echo '<td style="text-align:end">';
                        echo  number_format(total_element_eglise($database,$b->titre_eglise,$i,$anne));
                        echo '</td>';
                    echo '</tr>';
                }
            echo '</table>';
            echo '</div>';
            echo '</div>';
      }

    }
    else if($_POST['data'][1] == "none" AND $_POST['data'][2] != "none"){
        for($i= 1; $i <= 5; $i++){

            echo '<div class="view" data-aos="fade-left">';
            echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$i.'</b> <b style="float:right">total:'.number_format(total_element_eglise_by_sabat($database,"argent",$moi,$i,$anne)).'</b></h1>';
            echo '<div class="veiw_content">';
            echo  '<table>';
                    $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');

                    while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                        echo '<tr>';
                            echo '<td style="width:125vh;height:4vh">';
                            echo $b->categorie_eglise_type;
                            echo '</td>';
                            echo '<td style="text-align:end">';
                            echo  number_format(total_element_eglise_by_sabat($database,$b->titre_eglise,$moi,$i,$anne));
                            echo '</td>';
                        echo '</tr>';
                    }
              echo '</table>';
              echo '</div>';
              echo '</div>';

            }
    }
    else if($_POST['data'][1] != "none" AND $_POST['data'][2] != "none"){
        echo '<div class="view" data-aos="fade-left">';
        echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$sabata.'</b> <b style="float:right">total:'.number_format(total_element_eglise_by_sabat($database,"argent",$moi,$sabata,$anne)).'</b></h1>';
        echo '<div class="veiw_content">';
        echo  '<table>';
                $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');

                while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                    echo '<tr>';
                        echo '<td style="width:125vh;height:4vh">';
                        echo $b->categorie_eglise_type;
                        echo '</td>';
                        echo '<td style="text-align:end">';
                        echo  number_format(total_element_eglise_by_sabat($database,$b->titre_eglise,$moi,$sabata,$anne));
                        echo '</td>';
                    echo '</tr>';
                }
          echo '</table>';
          echo '</div>';
          echo '</div>';

        
    }


}
         
?>
