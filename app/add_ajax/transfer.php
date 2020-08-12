<?php
 
 $id= $_POST['data'][0];
 $transfert= $_POST['data'][1];
 require "../../app/autoload.php";
 use \app\classe\use_database;
 use \app\classe\getUser;
 $insert= new use_database;

 if($insert->verifi_user($id) == true){
    $insert->prepare("UPDATE membres SET eglise_actuele = ? WHERE id= ?",array($transfert,$id));
    echo "<p style='color:white'>le transfer ".getUser::nom($id)."  ".getUser::prenom($id)." est transfer a <b>".$transfert."</b></p>";
 }
 else{
     echo "id de la personne ne correspand a personne";
 }

 
?>