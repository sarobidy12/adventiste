<?php


    require "../../app/autoload.php";
    use \app\classe\use_database;
    use \app\classe\getUser;
    $insert= new use_database;
    echo '
        <a class="member"  style="width:10vh;height:4vh" href="member.php">Voir</a>
    ';
    foreach($insert->query("SELECT * FROM membres ORDER BY id DESC") AS $users):

?>
            <div style='width:95%;margin:0 auto 1vh'>
                <div class='view_member' id="<?= $users->id ?>" data-aos='fade-up'>
                        <img src='img/logo/avatar_defaut.png'>
                            <p style='font-size:2vh;font-family: sans-serif;'>
                              <b style="color:#aaa"><?= $users->nom ?></b>
                            </p>
                            <p>
                                <?= $users->prenom ?>
                            </p>
                </div>
            </div>
            
    <?php
    endforeach;
    ?>
    
  <div id="resu" ></div>
  <div class="ty" style='position:fixed;width:100%;height:100%;z-index:10;background-color:rgba(0,0,0,0.5);top:0;left:0' ></div>
<script>
    $(document).ready(function(){

        $(".ty").hide();
        $("#resu").hide();
        $(".view_member").click(function(){
            var id = $(this).attr("id");
            $(".ty").fadeIn(200);
      

            $.ajax({
                url:"../app/verifi_ajax/member.php",
                type:"POST",
                data:{id : id},
                success: function(data){
                    $("#resu").show(200);
                    $("#resu").append(data);
                }
            });
        });

        $(".ty").click(function(){
            $("#resu").empty();
            $("#resu").hide(200);
            $(".ty").fadeOut(200);
        });

    });
    
    </script>
