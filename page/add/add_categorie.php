<div class="con" style="width:95%;margin: 0 auto;padding:1vh">
<h3>
    Ajouter un nouveau categorie
</h3>

    <?php
    include("../../app/autoload.php");
    use app\classe\use_database;
    $use = new use_database;
                foreach($use->query("SELECT * FROM sampana_categorie") AS $a):
                    echo '<div class="cat" id="f'.$a->id.'">'.$a->type_sampana.'<img  class="del" id="'.$a->id.'" src="img/sugg/6.png"></div>';
                endforeach;
    ?>
    <div id="up"></div>
    <div class="form-group">
        <label for="">
            Categorie
        </label>
        <input type="text" name="" id="categorie" class="form-control">
    </div>
<input type="button" name="" id="exec" value="Ajouter" class="btn btn-primary">
</div>
<script>
$(document).ready(function(){
    $("#exec").click(function(){
        var name= $("#categorie").val();
        $.ajax({
            url:'../app/insertDB/add_categorie.php',
            type:"POST",
            data:{name : name},
            success: function(data){
                $("#up").slideDown(200);
                $("#up").append('<div class="cat">'+name+'<img class="del" src="img/sugg/6.png"></div>');
            }
        })
    });
    
    $(".del").click(function(){
               var id = $(this).attr("id");
                    $.ajax({    
                        url:"../app/verifi_ajax/delete.php",
                        type:"POST",
                        data: { id : id},
                        success: function(data){
                            $("#f"+id).slideUp(300);
                        }
                    })
                })
})
</script>
