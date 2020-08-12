<?php

$fun= $_POST['data'][0];
$id= $_POST['data'][1];
$ar = str_replace("f","",$fun);
include("../autoload.php");
use app\classe\use_database;
$use = new use_database;
$normal= $use->prepare("SELECT * FROM  membres  WHERE function_church = ? " , array($ar));
if($normal->rowCount() == 1){
    $a=$normal->fetch(\PDO::FETCH_OBJ);
    $update = $use->prepare("UPDATE membres SET function_church=? WHERE id= ? ", array("4",$a->id));
    $now = $use->prepare("UPDATE membres SET function_church = ? WHERE id=?",array($ar,$id));
    echo "ok";
}
else{
    $now = $use->prepare("UPDATE membres SET function_church = ? WHERE id=?",array($ar,$id));
     echo "ok";
}

?>