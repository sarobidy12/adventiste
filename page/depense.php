
<div class="depense">

<p style="margin:0;font-size:2vh;padding:0;background-color:green;color:white;width:100%;height:5vh;text-align:center;line-height:5vh;">Depense</p>
<div style="width:95%;margin: 0 auto">
<form action="" method="POST">
    <h1>
        categorie 
    </h1>
   <select name="" id="categorie">

        <?php
                include("../app/autoload.php");
                use app\classe\use_database;
                $use = new use_database;
                foreach($use->query("SELECT * FROM sampana_categorie") AS $a):
                    echo '<option class="act" value="'.$a->id.'">'.$a->type_sampana.'</option>';
                endforeach;
        ?>
        
   </select>
   <div id="append">
   </div>
    <div class="from-group">
        <label for="argent">
            argent
        </label>
        <input type="text" id="argent" class="form-control">
    </div>

<br>
</div>
<div style='width:95%;margin:0 auto 5vh'>

    <h4>Billettage</h4>
    <table>
        <tr>
            <td>20.000 ariary</td><td><input type="text" class="form-control" name="nam20" id="20M"></td>
        </tr>

        <tr>
            <td>10.000 ariary</td><td><input type="text" class="form-control" name="nam20" id="10M"></td>
        </tr>

        <tr>
            <td>5.000  ariary</td><td><input type="text" class="form-control" id="5M"></td>
        </tr>

        <tr>
            <td>2.000  ariary</td><td><input type="text" class="form-control" id="2M"></td>
        </tr>

        <tr>
            <td>1.000  ariary</td><td><input type="text" class="form-control" id="1M"></td>
        </tr>

        <tr>
            <td>500    ariary</td><td><input type="text" class="form-control" id="5C"></td>
        </tr>

        <tr>
            <td>200    ariary</td><td><input type="text" class="form-control" id="2C"></td>
        </tr>

        <tr>
            <td>100    ariary</td><td><input type="text" class="form-control" id="1C"></td>
        </tr>
    </table>

    <div class="from-group">
        <input type="button" id="submit" class="btn btn-primary" value="enregistre">
        </div>
        </div>

</form>

</form>
</div>
<div id="oe"></div>

<script>
$(document).ready(function(){

    $(".act").click(function(){
        var id = $(this).attr("value");
        $.ajax({
            url:'../app/ajax/view_sous_cateogrie.php',
            data:{id : id},
            type:"POST",
            success: function(data){
                $("#append").empty();
                $("#append").slideDown(500,function(){
                    $("#append").append(data);
                });
            }
        });

    });
    $("#submit").click(function(){

        var categorie = $("#categorie").val();
        var sous_categorie = $("#sous_categorie").val();
        var argent = $("#argent").val()*1;

    
        if(argent != ""){

        if(sous_categorie == null){
            var data = [argent,categorie,"none"];
        }else{
            var data = [argent,categorie,sous_categorie];
        }

        var M20 =$("#20M").val()*1;
        var M10 =$("#10M").val()*1;
        var M5 =$("#5M").val()*1;
        var M2 =$("#2M").val()*1;
        var M1 =$("#1M").val()*1;
        var C5 =$("#5C").val()*1;
        var C2 =$("#2C").val()*1;
        var C1 =$("#1C").val()*1;

        var nombre20M = "20000"*M20;
        var nombre10M = "10000"*M10;
        var nombre5M = "5000"*M5;
        var nombre2M = "2000"*M2;
        var nombre1M = "1000"*M1;
        var nombre5C = "500"*C5;
        var nombre2C = "200"*C2;
        var nombre1C = "100"*C1;

        var billetage =[M20,M10,M5,M2,M1,C5,C2,C1];
        var total = nombre20M + nombre10M + nombre5M + nombre2M + nombre1M + nombre5C + nombre2C + nombre1C;

        if(total === argent){
            $.ajax({
            url:'../app/insertDB/add_depense.php',
            type:'POST',
            cache: false,
            data: {data : data ,billetage : billetage},
            success: function(data){
                 message(data);
            }
            });
        }
        else{
            message("erreur de comptage de billetage")
        }
        }else{
            message("aucune depotion");
        }
       
    })
})
function message(data){
        $(".message").fadeIn(1000);
        $(".message").show();
        $(".message").css("top","80%");
        $(".message").empty();
        $(".message").append("<div class='sms' style='top:7vh;right: 12vh' data-aos='fade-up'>"+data+"</div>");
        $(".message").fadeOut(2000,function(){
            $(".message").css("top","100%");
        });
}

</script>