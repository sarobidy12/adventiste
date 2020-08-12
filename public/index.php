<?php
session_start();
if($_SESSION['admin']){
}else{
    header('location:/adventiste/');
}

?>
<!DOCTYPE HMTL>
<html>
    <head>
        <title>Adventiste</title>
        <meta charset="utf-8">
        <meta name="desciption" content="r">
        <meta name="keyword" content="">
        <meta name="author" content="">
        <meta name="generator" content="visualcode">
        <meta name="body" content="tahina">
        <link rel="icon" type="image/png" href="img/sugg/layer1.png" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css"  href="css/style.css"/>
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="js/bootstrap.min.js"></script>  
        <script src="js/jquery.min.js"></script> 
        <style>
            body{
              
                background-size: 100%;
                position: absolute;
                background-size: 100%;
                height: 100%;
                width: 100%;

            }
            body::before{
                content: "";
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: -1;
                filter: blur(8px);
                background-image: url('img/sugg/fond.jpg');
                background-size: cover;

            }
 
            .body{
                margin:0;
                padding:0;
                width:100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.15);
                position:fixed;
                z-index: 0;
            }
            
            @media print{
                    
                .menu_stat{
                    display: none;
                }
                .back{
                    display: none;
                }
                .menu_general{
                    display:none;
                }
                .back{
                    display:none;
                }
                .print{
                    display:none;
                }

                #content{
                    width: 100%;
                    left:0;
            }

        
   
}
</style>
    </head>
    <body ng-app>
    <img src="img/sugg/layer1.png" id='logo'>

<div class="body" >

<div class="back">
<img src='img/sugg/back.png'>
</div>
<div data-aos="zoom-in" class="container" style="width: 60%;margin: 3vh auto;padding:2vh">
                    
<?php
    if($_SESSION['admin'] == 'admin-principale'){
?>
                        <div class="page" id="ajouter">
                               <img src="img/sugg/deposition.png" style="width: 10vh;float: left;height: 12.5vh;">
                        <p>
                            Deposition
                        </p>
                        </div> 
                        <div class="page" id="depense">
                                <img src="img/sugg/depense.jpg" style="width: 10vh;float: left;height: 12.5vh">
                                 <p>
                                     Depense
                                 </p>
                        </div>
                        <div class="page" id="statistique">
                                <img src="img/sugg/stat.png" style="width: 10vh;float: left;height: 12.5vh">
                                 <p>
                                     statistique
                                 </p>
                        </div>
                        <div class="page" id="new_member">
                        <img src="img/sugg/Membre.png" style="width: 10vh;float: left;height: 12.5vh">
                            <p>
                                Nouveau Membre
                            </p>
                        </div> 
                        <div class="page" id="transfer" >
                                <img src="img/sugg/transfer.jpg" style="width: 10vh;float: left;height: 12.5vh">
                                 <p>
                                     Transfer
                                 </p>
                        </div>
                        <div class="page" id="Parametre" >
                                <img src="img/sugg/parametre.png" style="width: 10vh;float: left;height: 12.5vh">
                                 <p>
                                     Parametre
                                 </p>
                        </div>

<?php }else{?>
                        <div class="page" id="ajouter">
                                <img src="img/sugg/deposition.png" style="width: 10vh;float: left;height: 12.5vh;">
                                <p>
                                    Deposition
                                </p>
                        </div> 
                        <div class="page" id="depense">
                                <img src="img/sugg/depense.jpg" style="width: 10vh;float: left;height: 12.5vh">
                                 <p>
                                     Depense
                                 </p>
                        </div>
                        <div class="page" id="new_member">
                                <img src="img/sugg/Membre.png" style="width: 10vh;float: left;height: 12.5vh">
                                <p>
                                    Nouveau Membre
                                </p>
                        </div> 
<?php } ?>

</div>
</div>

<div id="content"  >
f
</div>
<br>
<br>
<br>
<br>
<br>
<div class="cont">
</div>
<div id="rew"></div>
</div>
<div class="message"></div>
</div>
<script src="js/angular.min.js"></script>
<script src="js/angular.js"></script>
<script src="js/aos.js"></script>
        <script>
            $(document).ready(function(){
                
                $(".back").hide();
                $(".message").hide();
                $(".reset").hide();
                $(".cont").hide();
                $("#content").hide();
                $("#loader").hide();
            $(".page").click(function(){
                var page= $(this).attr("id");
                $.ajax({
                    url:"../page/"+page+".php",
                    cache:false,
                    beforeSend:function(){
                        $(".container").fadeOut(300,function(){
                            $(".container").hide();
                            $("#content").show();
                            $(".back").show();

                        });
                    },
                    success: function(data){

                        $('#logo').animate({top:'1vh',width:'6vh'},560);
                        $("#content").empty();
                        $("#content").append(data);
                    }
                })
            });
            $(".back").click(function(){
                $("#content").fadeOut(100);
                $('.sms').hide();
                $('#logo').animate({top:'20vh',width:'15vh'},560);
                $(".menu_stat").animate({top:'110%'},700);

                $(".container").fadeIn(300,function(){
                    $(".back").fadeOut(100);
                    $(".container").show();
                    $(".print").fadeOut();
                    $("#rew").empty();

                });
            });

            $(".cont").click(function(){
                $(".cont").fadeOut(300,function(){
                    $(".cont").hide();
                    $(".reset").fadeOut();
                });
            })
        });
                
        AOS.init({
            duration:1500
        })
    
        </script>
    </body>
</html>