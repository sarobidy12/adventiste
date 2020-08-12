
<?php

include("../../../app/class/total.php");
include("../../../app/connectDB.php");
include("../../../app/function_moi.php");

$categorie= $_POST['data'][0];
$sabata= $_POST['data'][1];
$moi= $_POST['data'][2];
$anne= $_POST['data'][3];
$id= $_POST['data'][4];

$requette= $database->prepare("SELECT * FROM  membres WHERE id = ?");
$requette->execute(array($id));

if($requette->rowCount() == 1){

   if($categorie == "1"){
                               
       if($_POST['data'][2] == "none"){
   
           for($i= 1; $i<= 12; $i++){
   
               echo '<div class="view" data-aos="fade-left">';
               echo '<h1>'.moi($i).'<b style="float:right">total:'.number_format(total_element_federation_users($database,$id,"argent_total",$i,$anne)).'</b></h1>';
               echo '<div class="veiw_content">';
               echo  '<table>';
                           $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                           while($a = $requette->fetch(PDO::FETCH_OBJ)){
                               echo '<tr>';
                                   echo '<td style="width:125vh;height:4vh">';
                                   echo $a->federation_type;
                                   echo '</td>';
                                   echo '<td  style="text-align:end">';
                                   echo number_format(total_element_federation_users($database,$id,$a->titre_deposition,$i,$anne));
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
               echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$i.'</b> <b style="float:right">total:'.total_element_federation_by_sabat_users($database,$id,"argent_total",$moi,$i,$anne).'</b></h1>';
               echo '<div class="veiw_content">';
               echo  '<table>';
                             $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                             while($a = $requette->fetch(PDO::FETCH_OBJ)){
                                 echo '<tr>';
                                     echo '<td style="width:125vh;height:4vh">';
                                     echo $a->federation_type;
                                     echo '</td>';
                                     echo '<td  style="text-align:end">';
                                     echo number_format(total_element_federation_by_sabat_users($database,$id,$a->titre_deposition,$moi,$i,$anne));
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
               echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$sabata.'</b> <b style="float:right">total:'.number_format(total_element_federation_by_sabat_users($database,$id,"argent_total",$moi,$sabata,$anne)).'</b></h1>';
               echo '<div class="veiw_content" >';
               echo  '<table>';
                             $requette= $database->query('SELECT * FROM categorie_federation ORDER BY id');
                             while($a = $requette->fetch(PDO::FETCH_OBJ)){
                                 echo '<tr>';
                                     echo '<td style="width:125vh;height:4vh">';
                                     echo $a->federation_type;
                                     echo '</td>';
                                     echo '<td  style="text-align:end">';
                                     echo number_format(total_element_federation_by_sabat_users($database,$id,$a->titre_deposition,$moi,$sabata,$anne));
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
   
               echo '<div class="view" data-aos="fade-left" >';
               echo '<h1>'.moi($i).'<b style="float:right">total:'.number_format(total_element_eglise_users($database,$id,"argent",$i,$anne)).'</b></h1>';
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
                           echo  number_format(total_element_eglise_users($database,$id,$b->titre_eglise,$i,$anne));
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
               echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$i.'</b> <b style="float:right">total:'.number_format(total_element_eglise_by_sabat_users($database,$id,"argent",$moi,$i,$anne)).'</b></h1>';
               echo '<div class="veiw_content">';
               echo  '<table>';
                       $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');
   
                       while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                           echo '<tr>';
                               echo '<td style="width:125vh;height:4vh">';
                               echo $b->categorie_eglise_type;
                               echo '</td>';
                               echo '<td  style="text-align:end">';
                               echo  number_format(total_element_eglise_by_sabat_users($database,$id,$b->titre_eglise,$moi,$i,$anne));
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
           echo '<h1> moi :'.moi($moi).'  <b>sabata :'.$sabata.'</b> <b style="float:right">total:'.number_format(total_element_eglise_by_sabat_users($database,$id,"argent",$moi,$sabata,$anne)).'</b></h1>';
           echo '<div class="veiw_content">';
           echo  '<table>';
                   $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');
   
                   while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                       echo '<tr>';
                           echo '<td style="width:125vh;height:4vh">';
                           echo $b->categorie_eglise_type;
                           echo '</td>';
                           echo '<td  style="text-align:end">';
                           echo number_format(total_element_eglise_by_sabat($database,$id,$b->titre_eglise,$moi,$sabata,$anne));
                           echo '</td>';
                       echo '</tr>';
                   }
             echo '</table>';
             echo '</div>';
             echo '</div>';
           
       }
   
   }
}
else{
    echo '
        <div data-aos="fade-left" style="width:100%;heigth:70vh;padding:2vh;color:white;background-color:red;">
            utilisateur numero '.$_POST['data'][4].' ne correspond aucun utilisateur inscrits
        </div>
    
    ';
}


?>

