<?php


include("../app/class/total.php");
include("../app/connectDB.php");
include("../app/autoload.php");

use app\classe\use_database;
use app\classe\getUser;
$new = new use_database;

echo "<table border='1'>";
echo "<tr>";
    echo "<td style='width:2vh;font-size:2vh'>id</td>";
    echo "<td style='width:50vh'>nom </td>";
    echo "<td style='width:40vh'>prenom </td>";
    echo "<td style='width:40vh'> adress</td>";
    echo "<td style='width:40vh'> telephone</td>";
echo "</tr>";

 foreach($new->query("SELECT * FROM membres") AS $a):
    echo "<tr>";
        echo "<td style='height:2vh;font-size:2vh'>";
        echo  $a->id;
        echo "</td>";

        echo "<td style='height:2vh;font-size:2vh'>";
        echo  $a->nom;
        echo "</td>";
        
        echo "<td style='height:2vh;font-size:2vh'>";
        echo  $a->prenom;
        echo "</td>";
        echo "<td style='height:2vh;font-size:2vh'>";
        echo  $a->adress;
        echo "</td>";
        echo "<td style='height:2vh;font-size:2vh'>";
        echo  $a->telephone;
        echo "</td>";

    echo "</tr>";
endforeach;
echo "</table>";

?>