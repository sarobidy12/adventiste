<div class="con" style="width:95%;margin: 0 auto;padding:1vh">
<h3>
    Ajouter un nouveau sous categorie
</h3>
<form action="" method="POST">
<select id="sous_categorie">
<?php
include("../../app/autoload.php");
use app\classe\use_database;
$use = new use_database;
        echo '<h3>sous categorie</h3>';
            foreach($use->query("SELECT * FROM sampana_categorie ") AS $a):
                echo '<option value="'.$a->id.'">'.$a->type_sampana.'</option>';
            endforeach;
?>
</select>
    <div class="form-group">
        <label for="">
            Categorie
        </label>
        <input type="text" name="" id="categorie" class="form-control">
    </div>
</form>
<input type="submit" name="" id="exec" value="Ajouter" class="btn btn-primary">
</div>
<script>
$(document).ready(function(){
    $("#exec").click(function(){
        var categorie= $("#categorie").val();
        var sous= $("#sous_categorie").val();
        var data = [sous,categorie];
        $.ajax({
            url:"../app/insertDB/add_sous_categorie.php",
            type:"POST",
            data : {data : data},
            success:function(data){
                $(".con").slideUp(300,function(){
                    $(".con").empty();
                $(".con").slideDown(300,function(){
                    $(".con").append(data);
                })
            })
            }
        })
    })
})
</script>
