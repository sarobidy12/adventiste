<?php

    include("../autoload.php");
    include("../function_moi.php");
    use app\classe\use_database;
    use app\classe\getUser;

    $new = new use_database;

    $moi= date('m');
    $sabata= numWeek();
    $anne= date('Y');

    echo $sabata;
    
        if(use_database::comfirm("SELECT * FROM deposition WHERE week_deposition=?",$sabata) === true){

            foreach($new->query("SELECT * FROM deposition  WHERE week_deposition=$sabata AND month_deposition=$moi AND years_deposition = $anne ORDER BY id DESC ") AS $a):
                echo "<div   class='updat' id='$a->d_id_users'><b style='width:30vh;color:green'> recu n'$a->d_numero_recu </b>".getuser::nom($a->d_id_users)." ".getuser::prenom($a->d_id_users)."<b style='position:relative;float:right;color:deepskyblue'>$a->d_argent_total arriary</b></div>";
            endforeach;

        }
        else
        {

            echo " aucune deposition";

        }

?>
<div id='retour'>

</div>
<script>
$(document).ready(function(){
    $('#update').show();

    $(".updat").click(function(){
        var id = $(this).attr("id");
        $.ajax({
            url:'../page/ajouter.php',
            type:'POST',
            data:{id:id},
            success: function(data){
                $("#content").empty();
                $("#content").append(data);
            }
        })
    })

    $('#update').click(function(){
        alert('ok');
            $.ajax({
                url:'../page/ajouter.php',
                success:function(data){
                    $("#content").empty();
                    $("#content").append(data);
                }
            })
        });
  
})
</script>