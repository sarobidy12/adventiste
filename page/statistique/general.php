<?php

include("../../app/class/total.php");
include("../../app/connectDB.php");
include("../../app/autoload.php");
include("../../app/function_moi.php");

?>


</style>
<center>
<div class="menu_general">
 <form action="" method="post">
    <table>
      <tr>
        
      <td style="width:15vh;text-align:center">
            categorie
        </td>
        <td >
            <select name="" id="categorie">
                <option class="act" value="1">Federation</option>
                <option class="act" value="2">Eglise</option>
            </select>
        </td>
        <td style="width:15vh;text-align:center">    
            Le sabate
        </td>
        <td style="margin:1vh 5vh">
            <select name="" id="sabata">
                <option class="act" value="none">tout le moi</option>
                <option class="act" value="1">sabata 1</option>
                <option class="act" value="2">sabata 2</option>
                <option class="act" value="3">sabata 3</option>
                <option class="act" value="4">sabata 4</option>
                <option class="act" value="5">sabata 5</option>
            </select>
        </td>
        <td style="width:15vh;text-align:center">
            le mois 
        </td>
        <td style="margin:1vh 5vh">
            <?php
                echo '<select name="" id="moi">';
                echo '<option class="act" value="none">tout le moi</option>';
                  for($i= 1; $i<=12;$i++){
                      echo '<option class="act" value="'.$i.'">'.moi($i).'</option>';
                  }
              echo '</select>';
            ?>
          </td>
          <td style="width:15vh;text-align:center">
            annee
          </td>
          <td style="margin:1vh 5vh">
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
  </center>
  <div id="vew">
    <br>
    <div style="border-radius:1vh;margin:0 auto; width:95%;box-shadow:1px 1px 5px #aaa;overflow: hidden;background-color:white" data-aos='fade-up'>
  <h3 style="margin: 0;padding: 1.2vh 2vh;background-color:deepskyblue;font-size:2vh;color:white;" >
      A popos de la capital de l'eglise local
  </h3>
<table >
  <tr>
          <td style="width:60vh;text-align:center;background-color:#aaa;color:white">ANTONY</td>
          <td style="width:30vh;text-align:center;background-color:#aaa;color:white"">sabata 1</td>
          <td style="width:30vh;text-align:center;background-color:#aaa;color:white"">sabata 2</td>
          <td style="width:30vh;text-align:center;background-color:#aaa;color:white"">sabata 3</td>
          <td style="width:30vh;text-align:center;background-color:#aaa;color:white"">sabata 4</td>
          <td style="width:30vh;text-align:center;background-color:#aaa;color:white"">sabata 5</td>
          <td style="width:30vh;text-align:center;background-color:green;color:white"">Total</td>
  </tr>
  
  <tr>
    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;text-align:start;line-height:4vh;padding:0 4vh;text-align:end" >VOLA SISA </li>
                <li style="height:5vh;text-align:start;line-height:4vh;padding:0 4vh;text-align:end">VOLA NIDITRA</li>
                <li style="height:5vh;text-align:start;line-height:4vh;padding:0 4vh;text-align:end">VOLA NIVOKA </li>
                <li style="height:5vh;text-align:start;line-height:4vh;padding:0 4vh;text-align:end ">VOLA SISA </li>
                </ul>
    </td>
    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format((total_element_eglise_by_sabat($database,"argent",date('m'),1,date('Y')) + total_element_federation_by_sabat($database,"argent_total",date('m'),1,date('Y')))); ?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth_bysabata($database,1,date('m'),date('Y')));?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);"></li>
                </ul>
    </td>
    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format((total_element_eglise_by_sabat($database,"argent",date('m'),2,date('Y')) + total_element_federation_by_sabat($database,"argent_total",date('m'),2,date('Y'))))  ?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth_bysabata($database,2,date('m'),date('Y')));?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"></li>
                </ul>
    </td>
    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo  number_format((total_element_eglise_by_sabat($database,"argent",date('m'),3,date('Y')) + total_element_federation_by_sabat($database,"argent_total",date('m'),3,date('Y'))))?> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth_bysabata($database,3,date('m'),date('Y')));?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"></li>
                </ul>
    </td>

    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo  number_format((total_element_eglise_by_sabat($database,"argent",date('m'),4,date('Y')) + total_element_federation_by_sabat($database,"argent_total",date('m'),4,date('Y')))) ?> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth_bysabata($database,4,date('m'),date('Y')));?> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"></li>
                </ul>
    </td>

    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo  number_format((total_element_eglise_by_sabat($database,"argent",date('m'),5,date('Y')) + total_element_federation_by_sabat($database,"argent_total",date('m'),5,date('Y')))) ?> </li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth_bysabata($database,5,date('m'),date('Y')));?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;background-color:rgba(170, 170, 170, 0.342);text-align:end"></li>
                </ul>
    </td>

    <td style="width:30vh;">
                <ul style=" margin:0;padding:0;list-style-type: none;">
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php 
                      $moi = date('m') - 1;
                      $entre = total_element_eglise($database,"argent",$moi,date('Y')) + total_element_federation($database,"argent_total",$moi,date('Y'));
                      $sortie = totaldepenseMonth($database,$moi,date('Y'));
                      $reste1 = $entre - $sortie;
                      echo number_format($reste1);
                ?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php  echo number_format((total_element_eglise($database,"argent",date('m'),date('Y')) + total_element_federation($database,"argent_total",date('m'),date('Y')))); ?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end"><?php echo number_format(totaldepenseMonth($database,date('m'),date('Y'))) ; ?></li>
                <li style="height:5vh;line-height:4vh;padding:0 4vh;text-align:end ">
                <?php 
                      $entre = total_element_eglise($database,"argent",date('m'),date('Y')) + total_element_federation($database,"argent_total",date('m'),date('Y')) ;
                      $sortie = totaldepenseMonth($database,date('m'),date('Y'));
                      echo number_format($entre - $sortie + $reste1);
                ?>
                </li>
                </ul>
    </td>
  </tr>
</table>
</div>
<br>
 
<div data-aos='fade-up' style="border-radius:1vh;margin:0 auto; width:95%;box-shadow:1px 1px 5px #aaa;overflow: hidden;background-color:white">
    <h3 style="margin: 0;padding: 1.2vh 2vh;background-color:deepskyblue;font-size:2vh;color:white;" >
        Somme Depose a la federation
    </h3>
    <div style='padding:1vh;font-size:2vh;color:green'>
      <?php 
        $moi = date('m');
        $entre = (total_element_eglise($database,"argent",date('m'),date('Y')) + total_element_federation($database,"argent_total",date('m'),date('Y'))); ;
        $sortie = totaldepenseMonth($database,$moi,date('Y'));
        $reste = $entre - $sortie;
        echo  "<b style='padding: 3vh'>".number_format($reste)." Ariary </b>";
      ?>
    </div>

  </div>
  <br>
<div data-aos='fade-up' style="border-radius:1vh;margin:0 auto; width:95%;box-shadow:1px 1px 5px #aaa;overflow: hidden;background-color:white">
    <h3 style="margin: 0;padding: 1.2vh 2vh;background-color:deepskyblue;font-size:2vh;color:white;" >
    Billetage</h3>
    <div style='padding:1vh'>

<?php
                echo "<table>";
                      echo "<tr>";
                        echo "<td style='width:15vh'>20M</td>";
                        echo "<td style='width:15vh'>10M</td>";
                        echo "<td style='width:15vh'>5M</td>";
                        echo "<td style='width:15vh'>2M</td>";
                        echo "<td style='width:15vh'>1M</td>";
                        echo "<td style='width:15vh'>C5</td>";
                        echo "<td style='width:15vh'>C2</td>";
                        echo "<td style='width:15vh'>C1</td>";
                        echo "<td style='width:15vh'>50</td>";
                        echo "<td style='width:15vh'>20</td>";
                        echo "<td style='width:15vh'>10</td>";
                      echo "</tr>";
                    echo "<tr>";
                    
                    echo "<td>".billetage($database,"B_M20")."</td>";
                    echo "<td>".billetage($database,"B_M10")."</td>";
                    echo "<td>".billetage($database,"B_M5")."</td>";
                    echo "<td>".billetage($database,"B_M2")."</td>";
                    echo "<td>".billetage($database,"B_M1")."</td>";
                    echo "<td>".billetage($database,"B_C5")."</td>";
                    echo "<td>".billetage($database,"B_C2")."</td>";
                    echo "<td>".billetage($database,"B_C1")."</td>";
                    echo "<td>".billetage($database,"B_T5")."</td>";
                    echo "<td>".billetage($database,"B_T2")."</td>";
                    echo "<td>".billetage($database,"b_T10")."</td>";

                  echo "</tr>";
                echo "</table>";
?>
    </div>

</div>
<script>
$(document).ready(function(){

  $(".act").click(function(){
    var categorie = $("#categorie").val();
    var sabata = $("#sabata").val();
    var moi = $("#moi").val();
    var anne = $("#anne").val();

    var data = [categorie, sabata,moi,anne];
    $.ajax({

          url:"../page/statistique/suivi/suivi_all.php",
          type:"POST",
          data:{data:data},
          cache:false,
          success:function(data){
              $("#vew").empty();
              $("#vew").append(data);
          }

    })

  })
})
</script>