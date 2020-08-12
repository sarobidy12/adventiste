
<?php

include("../../app/class/total.php");
include("../../app/connectDB.php");
include("../../app/function_moi.php");

?>
  <div class="menu_general" style='left:23vh'>
<table>

<form action="" method="post">
      <tr>
            <td style="width:10vh;">
                numero
            </td>
            <td>
                <input type="text" style="width:10vh" name="" id="id">
            </td>
            <td style="width:10vh;text-align:center">
                categorie
            </td>
        <td >
            <select name="" id="categorie">
                <option class="active_er" value="1">Federation</option>
                <option class="active_er" value="2">Eglise</option>
            </select>
        </td>
        <td style="width:10vh;text-align:center">    
            Le sabate
        </td>
        <td style="margin:1vh 5vh">
            <select name="" id="sabata">
                <option class="active_er" value="none">tout le moi</option>
                <option class="active_er" value="1">sabata 1</option>
                <option class="active_er" value="2">sabata 2</option>
                <option class="active_er" value="3">sabata 3</option>
                <option class="active_er" value="4">sabata 4</option>
                <option class="active_er" value="5">sabata 5</option>
            </select>
        </td>
        <td style="width:10vh;text-align:center">
            le mois 
        </td>
        <td style="margin:1vh 5vh">
            <?php
                echo '<select name="" id="moi">';
                echo '<option class="active_er" value="none">tout le moi</option>';
                  for($i= 1; $i<=12;$i++){
                      echo '<option class="active_er" value="'.$i.'">'.moi($i).'</option>';
                  }
              echo '</select>';
            ?>
          </td>
          <td style="width:10vh;text-align:center">
            annee
          </td>
          <td style="margin:1vh 5vh">
            <?php
                echo '<select name="" id="anne">';
                for($r = 2019; $r <= 2030 ;$r++){
                    echo '<option class="active_er" value="'.$r.'">'.$r.'</option>';
                }
              echo '</select>';
            ?>
          </td>
         </form>
         <td  style="width:10vh;text-align:center">
            <button  id="search" class="btn btn-primary">reherche</button>
         </td>

      </tr>
</table>
</div>
<div id="rew">
</div>
<script>
$(document).ready(function(){

    $("#search").click(function(){

        var id = $("#id").val();
        var categorie = $("#categorie").val();
        var sabata = $("#sabata").val();
        var moi = $("#moi").val();
        var anne = $("#anne").val();
        var data =[ categorie,sabata,moi,anne,id];

            $.ajax({
                url:'../page/statistique/suivi/suivi_users_general.php',
                type: "POST",
                data:{ data: data },
                cache: false,
                success: function(data){
                    $('#rew').slideUp(300,function(){
                                        $('#rew').empty();
                                        $('#rew').append(data);
                                        $('#rew').slideDown(300);
                    });
                }
            });
        });

        $(".active_er").click(function(){

            var id = $("#id").val();
            var categorie = $("#categorie").val();
            var sabata = $("#sabata").val();
            var moi = $("#moi").val();
            var anne = $("#anne").val();
            var data = [categorie, sabata,moi,anne,id];

            $.ajax({
                url:'../page/statistique/suivi/suivi_user.php',
                type: "POST",
                data:{ data: data },
                cache: false,
                success: function(data){
                    $('#rew').slideUp(300,function(){
                                        $('#rew').empty();
                                        $('#rew').append(data);
                                        $('#rew').slideDown(300);
                    });
                }
            });

              });
    });
</script>
