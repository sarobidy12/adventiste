<?php
   
include('../connectDB.php');
$a= str_replace('f','',$_POST['data']);
echo $a;
$requette= $database->prepare("DELETE FROM  admins WHERE id=?");
$requette->execute(array($a));

?>