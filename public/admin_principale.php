    <img src="img/sugg/layer1.png" id='logo'>

<div class="body" >

<div class="back">
<img src='img/sugg/back.png'>
</div>
<div data-aos="zoom-in" class="container" style="width: 60%;margin: 3vh auto;padding:2vh">
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
                        </div>
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
<script src="js/jquery.min.js"></script>
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