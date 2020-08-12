<?php

    include('../connectDB.php');
    $requette= $database->prepare("UPDATE admins SET admin_nom=? , admin_mdp=? WHERE id=?");
    $requette->execute(array($_POST['data'][0],$_POST['data'][1],'1'));
?>