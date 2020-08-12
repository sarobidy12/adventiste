<?php
include('../connectDB.php');

$requette= $database->prepare("SELECT * FROM membres WHERE id=?");
$requette->execute(array($_POST['data']));

if($requette->rowCount() == 1){
    $a= $requette->fetch(\PDO::FETCH_OBJ);
    echo "<div style='width:100%;padding:2vh;background-color:green;border-radius:0.5vh;margin:0 0 1.5vh 0'>";
        if($a->sexe == "femme"){
            echo "<b style='margin:0 0.1vh;color:white'>Madame</b>";
        }else{
            echo "<b style='margin:0 1vh;color:white'>Mensieu</b>";
        }
        echo "<b style='margin:0 1vh;color:white'>".$a->nom."</b>";
        echo "<h style='color:white'>".$a->prenom."</h>";
    echo "</div>";
}else{
    echo "<div style='width:100%;padding:1vh;text-align:center;color:white;2vh;background-color:red;border-radius:0.5vh;margin:0 0 1.5vh 0'>";
        echo "utilisateur n'existe pas";
    echo "</div>";
}

?>