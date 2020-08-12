
<?php
    
    require "../../app/function_moi.php";
    
    require "../../app/connectDB.php";

    require "../../app/autoload.php";
    
    include("../../app/class/total.php");
    use app\classe\getCategorie;
?>    
<center>

<div class="menu_general" style='margin: 0 auto;left:29vh'>
    <form action="" method="POST">
    <table>
            <tr>

             <!-- categorie -->
                        <td style="width:10vh;text-align:center">
                            Sabata
                        </td>
                        <td style="width:10vh">
                            <select name="" id="sabata">
                                    <?php
                                                echo '<option class="act" value="none">toute moi</option>';
                                                for($i = 1 ; $i <= 4 ; $i++){
                                                    echo '<option class="act" value="'.$i.'">sabata '.$i.'</option>';
                                                }
                                    ?>
                        </td>
                <!-- moi --> 
                <!-- categorie -->
                        <td style="width:10vh;text-align:center">
                            Categorie
                        </td>
                        <td style="width:10vh">
                            <select name="" id="categorie">
                                    <?php
                                                use app\classe\use_database;
                                                $use = new use_database;
                                                echo '<option class="act" value="none">toute categorie</option>';
                                                foreach($use->query("SELECT * FROM sampana_categorie") AS $a):
                                                    echo '<option class="act" value="'.$a->id.'">'.$a->type_sampana.'</option>';
                                                endforeach;
                                    ?>
                        </td>
                    <!-- moi --> 
                <td style="width:10vh;text-align:center">
                    MOI
                </td>
                <td style="width:10vh">
                <select name="" id="moi">
                <?php
                        echo "<option class='act' value='none'>12 mois </option>";
                                for($i = 1; $i <= 12; $i++){
                                    echo "<option class='act' value=".$i.">".moi($i)."</option>";
                                }
                ?>
                </select>
                </td>
            <!-- moi -->

            <!-- anne -->
                <td style="width:10vh;text-align:center">
                    ANNEE
                </td>
                <td style="width:10vh">
                <select name="" id="anne">
                <?php
                    for($i = 2019; $i <= 2030; $i++){
                            echo "<option class='act' value=".$i.">".$i."</option>";
                        }
                ?>
                </select>
            <!-- anne -->

            </td>

        </tr>
    </table>
</form>
</div>
</center>

<div id="ret">

<?php

for($i = 1; $i <= 12 ; $i++){
    
                $result = $database->prepare("SELECT * FROM depense WHERE month_depense = ? AND years_depense = ? ");
               
                $result->execute(array($i,date('Y')));

                if($result->rowCount() >= 1 ){
                    echo '<div class="vue" data-aos="fade-up" style="margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;">';
                                    echo '<div style="margin: 0;padding: 1vh 1vh;height: 5vh;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                    <b>'.moi($i).'</b>
                                    <b style="float:right">Total:
                                    '.number_format(totaldepenseMonth($database,$i,date('Y'))).'</b>
                                    </div>';
                                        echo '<div class="vues" style="padding:2vh;" >';
                                                            echo '<table>
                                                                <tr>
                                                                        <td style="width:20vh;height:5vh;">categorie</td>
                                                                        <td style="width:20vh;height:5vh;text-align:end">argent</td>
                                                                        <td style="width:20vh;height:5vh;text-align:end">date</td>
                                                                    </tr> 
                                                                ';
                                                                while($a=$result->fetch(\PDO::FETCH_OBJ)){
                                                                ?>
                                                                    <tr>
                                                                        <td style="width:30vh;margin:0 2vh"><?= getCategorie::categorie_sampana($a->categorie); ?></td>
                                                                        <td style="width:90vh;text-align:end;margin:0 2vh 2vh"><?= number_format($a->argent);  ?></td>
                                                                        <td style="width:20vh;margin:0 2vh;text-align:end"><?= $a->date_depense;  ?></td>
                                                                    </tr>
                                                                <?php   
                                                            }
                                                    
                                                            echo '</table>';
                                        echo '</div>';
                     echo '</div>';
                }
                else{
                    echo '<div class="vue" style="  margin: 2vh auto;padding: 0;height: auto;border-radius: 0.5vh;box-shadow: 1px 1px 8px #aaa;" data-aos="fade-up">';

                        echo '<div style="margin: 0;padding: 1vh 3vh;height: 5vh;text-align: end;color: white;background-color: green;border-radius: 0.5vh 0.5vh 0 0;font-size:2vh">
                                <b>'.moi($i).'</b>
                                </div>';

                            echo '<div class="vues" style="padding:2vh;" >';
                            echo 'SANS DEPENSES';
                            echo '</div>';
                    echo '</div>';
                }
}
?>
</div>
<script>
             
        AOS.init({
            duration:1500
        })
    $(document).ready(function(){

        $('.act').click(function(){

            var categorie = $("#categorie").val();
            var moi = $("#moi").val();
            var sabata = $("#sabata").val();
            var anne = $("#anne").val();
            var data = [categorie, moi ,sabata,anne];

            $.ajax({
                url: '../page/statistique/suivi/suivi_depense.php',
                type: "POST",
                data: { data : data },
                success: function(data){
                    $("#ret").empty();
                    $("#ret").append(data);
                }
            });

        });
    });
</script>