<?php

require "../connectDB.php";
require "../autoload.php";

use app\classe\getUser;
use app\classe\use_database;
$data= new use_database;

echo "<center>";
echo "<div data-aos='zoom-in' style='padding:2vh;position:fixed;width:40%;height:80%;z-index:15;background-color:white;top:10vh;margin:0 auto;left:50vh;border-radius:1vh;box-shadow:1px 1px 5px #aaa;'>";
echo '<table>';
    echo "<img src='img/logo/avatar_defaut.png' style='width:17vh;height:17vh'>";

    echo '<tr>';
        echo '<td style="text-align:end"><h1>N°</h1></td>';
        echo '<td><h1>'.$_POST['id'].'</h1></td>';
    echo '<tr>';


    echo '<tr>';
        echo '<td style="text-align:end">Nom : </td>';
        echo '<td> '.getUser::nom($_POST['id']).'</td>';
    echo '<tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Prenom : </td>';
        echo '<td> ' .getUser::prenom($_POST['id']).'</td>';
    echo '</tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Sexe : </td>';
        echo '<td> ' .getUser::sexe($_POST['id']).'</td>';
    echo '</tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Anniversaire : </td>';
        echo '<td> ' .getUser::anniversaire($_POST['id']).'</td>';
    echo '</tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Functions : </td>';
        echo '<td> ' .getUser::functions($_POST['id']).'</td>';
    echo '</tr>';
    

    echo '<tr>';
        echo '<td style="text-align:end">Eglise origine : </td>';
        echo '<td> ' .getUser::eglise_origine($_POST['id']).'</td>';
    echo '</tr>';


    echo '<tr>';
        echo '<td style="text-align:end">Eglise actuele : </td>';
        echo '<td> ' .getUser::eglise_actuele($_POST['id']).'</td>';
    echo '</tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Bateme : </td>';
        echo '<td>' .getUser::bateme($_POST['id']).'</td>';

    echo '<tr>';
        echo '<td style="text-align:end">Adress : </td>';
        echo '<td> ' .getUser::adress($_POST['id']).'</td>';

    echo '<tr>';
        echo '<td style="text-align:end">Téléphone</td>';
        echo '<td> ' .getUser::telephone($_POST['id']).'</td>';
    echo '</tr>';

    echo '<tr>';
        echo '<td style="text-align:end">Date inscription</td>';
        echo '<td> ' .getUser::date_inscription($_POST['id']).'</td>';
    echo '</tr>';
    
    echo '</table>';

    echo "<b>Function</b>";
    foreach($data->query("SELECT * FROM fuction_in_church") AS $a):
        echo "<ul class='upod'>";
            echo "<li class='ip' id=f".$a->id.">".$a->type_fuction."</li>";
        echo "</ul>";
    endforeach;
    echo '</div>';
    echo "</center>";

?>


<script>
$(document).ready(function(){
    var id = "#f"+"<?= getUser::function_church($_POST['id']) ?>";
    $(id).addClass("act_m");
    $(".ip").click(function(){
        var el = $(this).attr("id");
        var id = <?= $_POST['id']; ?>;
        var data = [el, id];
            $.ajax({
                url:'../app/ajax/update_function.php',
                type:"POST",
                data: {data:data},
                success:function(data){
                    if(data == "ok"){
                        if($(".upod li").hasClass("act_m")){
                            $(".upod li").removeClass("act_m");
                            $("#"+el).addClass("act_m");
                        }
                    }
                    else{
                        alert(data);
                    }
                }
            });
    });
});
</script>