
<?php

include("../../../app/class/total.php");
include("../../../app/connectDB.php");
include("../../../app/autoload.php");
include("../../../app/function_moi.php");

use app\classe\getUser;
$categorie= $_POST['data'][0];
$sabata= $_POST['data'][1];
$moi= $_POST['data'][2];
$anne= $_POST['data'][3];
$id= $_POST['data'][4];

$requette= $database->prepare("SELECT * FROM  membres WHERE id = ?");
$requette->execute(array($id));

if($requette->rowCount() == 1){
   
  echo '<div style="width:66%;margin:0 auto;padding:3vh 5vh;height:auto;background-color:green;color:white;border-radius:1vh" data-aos="zoom-in">
          <table>
            <tr>
                  <td style="width:10vh">nom </td>
                  <td> :'.getUser::nom($id).'</td>
            <tr>
            <tr>
            <td style="width:10vh">prenom </td>
            <td>:'.getUser::prenom($id).'</td>
      <tr>
          </table>
        </div>';

    
 echo '<div id="vew" data-aos="fade-right">
 <div class="view">
   <h1>statistique general pour la federation 
     <b style="float:right">
       total:'.number_format(total_element_federation_users($database,$id,"argent_total",intval(date('m'),0),date('Y'))).'
     </b>
   </h1>
   <div class=\'veiw_content\'>
   <table>
   ';
           $statistique1= $database->query('SELECT * FROM categorie_federation ORDER BY id');

           while($a = $statistique1->fetch(PDO::FETCH_OBJ)){

                 echo '<tr>';
                   echo '<td style="width:125vh;height:4vh">';
                   echo $a->federation_type;
                   echo '</td>';
                   echo '<td style="text-align:end">';
                   echo number_format(total_element_federation_users($database,$id,$a->titre_deposition,intval(date('m'),0),date('Y')));
                   echo '</td>';
                 echo '</tr>';
           }

   echo '
     </table>
   </div>
 </div>
 <div class="view" data-aos="fade-left">
   <h1>statistique general de l\'eglise
   <b style="float:right">
       total:'.number_format(total_element_eglise_users($database,$id,"argent",intval(date('m'),0),date('Y'))).'
     </b>
   </h1>
   <div class=\'veiw_content\'>
   <table>';

           $statistique2= $database->query('SELECT * FROM categorie_eglise ORDER BY id');
           while($b = $statistique2->fetch(PDO::FETCH_OBJ)){
                 echo '<tr>';
                   echo '<td style="width:125vh;height:4vh">';
                   echo $b->categorie_eglise_type;
                   echo '</td>';
                   echo '<td  style="text-align:end">';
                   echo  number_format(total_element_eglise_users($database,$id,$b->titre_eglise,intval(date('m'),0),date('Y')));
                   echo '</td>';
                 echo '</tr>';
           }
    echo '</table>
           </div>
       </div>
       </div>';
        }
        else{
            echo '
                <div style="width:100%;heigth:70vh;padding:2vh;color:white;background-color:red;">
                    utilisateur numero '.$_POST['data'][4].' ne correspond aucun utilisateur inscrits
                </div>
            
            ';
        }
        
?>