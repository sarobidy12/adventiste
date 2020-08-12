<?php

var_dump($_POST['data']);
include('../connectDB.php');

$requette= $database->prepare("INSERT INTO admins(admin_nom,admin_mdp,admin_c) VALUE(?,?,?)");
$requette->execute(array($_POST['data'][0],$_POST['data'][1],'2'));