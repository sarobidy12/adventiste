<?php

include("../../app/class/total.php");
include("../../app/connectDB.php");
include("../../app/autoload.php");
include("../../app/function_moi.php");


?>

  <div class="menu_general" style='left:46vh'>
 <form action="" method="post">
    <table>
      <tr>
        <td>    
            Le sabate
        </td>
        <td>
            <select name="" id="sabata">
                <option class="act" value="none">tout le moi</option>
                <option class="act" value="1">sabata 1</option>
                <option class="act" value="2">sabata 2</option>
                <option class="act" value="3">sabata 3</option>
                <option class="act" value="4">sabata 4</option>
                <option class="act" value="5">sabata 5</option>
            </select>
        </td>
        <td>
            le mois 
        </td>
        <td>
            <?php
                echo '<select name="" id="moi">';
                for($i= 1; $i<=12;$i++){
                    echo '<option class="act" value="'.$i.'">'.moi($i).'</option>';
                }
              echo '</select>';
            ?>
          </td>
          <td>
            annee
          </td>
          <td>
            <?php
                echo '<select name="" id="anne">';
                for($r = 2019; $r <= 2030 ;$r++){
                    echo '<option class="act" value="'.$r.'">'.$r.'</option>';
                }
              echo '</select>';
            ?>
          </td>
      </tr>
      </form>
    </table>
  </div>

<div class="recap" data-aos='fade-up'>
<table border="1px solid">

<?php
          $f=1299;
          $date = date('m');
          include("en_tete.php");
            use \app\classe\getUser;
                $query =$database->query("SELECT * FROM deposition WHERE month_deposition= $date");
                $b= 1;
                while($a= $query->fetch(PDO::FETCH_OBJ)){
                    echo '<tr>';
                          echo '<td style="height: 4vh;text-align: center;padding:4px;font-size:1vh"><b>'.$b++.'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
                          echo '<td style="height: 4vh;text-align: right;padding:4px;font-size:1vh"><b>'.number_format($a->e_fampandrosoana + $a->e_faritra_manokana).'</b></td>';
                    echo '</tr>';
                }
            ?>
        </table>
        </div>
        </div>
<div id="result">

</div>
<script>
$(document).ready(function(){
  $(".print").fadeIn(); 
    $(".act").click(function(){
      var sabata = $("#sabata").val();
      var moi = $("#moi").val();
      var anne = $("#anne").val();
      var data = [sabata,moi,anne];
        $.ajax({
              url:"../page/statistique/suivi/suivi_insert.php",
              type:"POST",
              data:{data:data},
              cache:false,
              success:function(data){
                  $(".recap").hide();
                  $("#result").empty();
                  $("#result").append(data);
              }
        })
    })

  $(".print").click(function(){
    $(".back").hide();
      window.print(); 
    $(".back").fadeIn();

    }); 

});
</script>