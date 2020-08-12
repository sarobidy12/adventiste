<?php

include('../autoload.php');
include('../connectDB.php');
use app\classe\use_database;
$new = new use_database;
$ary= array("0","0","0","0","0","0","0","0","0","0","0",'1');
$new->prepare("UPDATE billetage SET M20=? ,  M10=?  , M5=?  , M2=? ,  M1=?  , C5=?  , C2=? ,  C1=? , t5= ?, t2= ?, t10=? WHERE id = ?", $ary);
$database->exec("TRUNCATE billetage_users");
echo "Les billetage est remis a Zero";