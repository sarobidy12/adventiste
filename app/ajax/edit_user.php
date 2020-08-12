<?php

require "../connectDB.php";
require "../autoload.php";

use app\classe\getUser;
use app\classe\use_database;
$data= new use_database;
use app\classe\formulaire;
$input= new formulaire;
 
?>
<div data-aos='zoom-in' style='padding:2vh;position:fixed;width:50%;height:97%;z-index:15;background-color:white;top:2vh;margin:0 auto;left:33vh;border-radius:1vh;box-shadow:1px 1px 5px #aaa;'>
    
    <img src='img/logo/avatar_defaut.png' style='width:7vh;height:7vh'>

    <div class="form-group">
            <label for="">Nom</label>
            <input type="text" class='form-control'value='<?= getUser::nom($_POST['id']) ?>' name="" id="nom">
    </div>

    <div class="form-group">
            <label for="">Prenom</label>
            <input type="text" class='form-control'value='<?= getUser::prenom($_POST['id']) ?>' name="" id="prenom">
    </div>

    <div class="form-group">
        <label for="">date de naissance</label>
        <input type="date" class='form-control'value='<?= getUser::anniversaire($_POST['id']) ?>' name="" id="anif">
    </div>

    <div class="form-group">
                    <label>Sexe</label>
                    <?php
                        if(getUser::sexe($_POST['id']) == 'femme'){
                        echo ' <select class="form-control" name="" id="sexe">
                                <option value="femme">femme</option>
                                <option value="homme">Homme</option>
                            </select>';
                        }else{
                        echo ' <select class="form-control" name="" id="sexe">
                                <option value="homme">Homme</option>
                                <option value="femme">femme</option>
                            </select>';
                        }
                    ?>
        </div>
    <div>

    <div class="form-group">
        <label for="">function</label>
        <input type="text" class='form-control'value='<?= getUser::functions($_POST['id']) ?>' name="" id="functions">
    </div>

    <div class="form-group">
        <label for="">eglise actuel</label>
        <input type="text" class='form-control'value='<?= getUser::eglise_origine($_POST['id']) ?>' name="" id="actuel">
    </div>

    <div class="form-group">
        <label for="">eglise origine</label>
        <input type="text" class='form-control'value='<?= getUser::eglise_actuele($_POST['id']) ?>' name="" id="origine">
    </div>

    <div class="form-group">
        <label for="">Beteme</label>
        <?php
            if(getUser::bateme($_POST['id']) == 'oui'){
                echo ' <select class="form-control" name="" id="bateme">
                            <option value="Oui">Oui</option>
                            <option value="non">Non</option>
                        </select>';
            }else{
                echo ' <select class="form-control" name="" id="bateme">
                            <option value="Non">Non</option>
                            <option value="Oui">Oui</option>
                        </select>';
            }
        ?>
    <div>

    <div class="form-group">
        <label for="">adress</label>
        <input type="text" class='form-control'value='<?= getUser::adress($_POST['id']) ?>' name="" id="adress">
    </div>

    
    <div class="form-group">
        <label for="">telephone</label>
        <input type="text" class='form-control'value='<?= getUser::telephone($_POST['id']) ?>' name="" id="telephone">
    </div>
            <input type="submit" style='width:40%' class='btn btn-primary' value='modifier' name="" id="updat">
        </div>
   
<div>
<div id="ok"></div>
<script>
$(document).ready(function(){
    $('#updat').click(function(){
        var nom= $('#nom').val();
        var prenom= $('#prenom').val();
        var date= $('#anif').val();
        var sexe= $('#sexe').val();
        var functions= $('#functions').val();
        var actuel= $('#actuel').val();
        var origine= $('#origine').val();
        var bateme= $('#bateme').val();
        var adress= $('#adress').val();
        var telephone= $('#telephone').val();
        var id='<?php echo $_POST['id']; ?>';
         
         var data = [nom,prenom,sexe,date,functions,actuel,origine,bateme,adress,telephone,id];
            $.ajax({
                url:'../app/ajax/update_users.php',
                type:'POST',
                data:{data:data},
                success:function(data){
                    $('#ok').empty();
                    $('#ok').append("<div data-aos='fade-up' style='padding:1.5vh;position:fixed;width:40%;height:5vh;z-index:17;background-color:white;top:0vh;margin:0 auto;left:78vh;border-radius:1vh;box-shadow:1px 1px 5px #aaa;'>"+data+"</div>");
                }
            })
         });
});
</script>