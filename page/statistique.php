

<div class="menu_stat"> 
        <ul>
                <li id="general"><b>Général</b></li>
                <li id="recap"><b>Rapport FMC</b></li>
                <li id="stat_depense"><b>Depense</b></li>
                <li id="suivi"><b>Suivi</b></li>
        </ul>
</div>
<div style="overflow-x: hidden;margin:10vh 0">

</div>
<div id="res" style="transition:100ms;width: 100%;left:0;position: relative; padding:1.5vh;text-align:center">

<center>
        <img src="img/sugg/stat.png" style='width:60vh;height:60vh'>
</center>
<b style='font-size:3vh'>
<?php

        include('../app/autoload.php');
        use app\classe\use_database;
        $new = new use_database;
        $r= $new->prepare("SELECT *  FROM argent_now WHERE id=?",array('1'));
        $a= $r->fetch(PDO::FETCH_OBJ);
        echo number_format($a->argent_now).' ariary';
        
?>
</b>
</div>
<script>
$(document).ready(function(){
        $(".menu_stat").animate({top:'90%'},500);


        $(".menu_stat ul li").click(function(){
             
                if($(".menu_stat ul li").hasClass("act_stat")){
                         $(".menu_stat ul li").removeClass("act_stat");    
                }
                 var page = $(this).attr('id');
                 $("#"+page).addClass("act_stat"); 

                 $.ajax({
                    url:'../page/statistique/'+page+'.php',
                     cache:true,
                     success: function(data){
                        $('#res').fadeOut(400,function(){
                                $('#res').empty();
                                $('#res').fadeIn(300,function(){
                                        $('#res').append(data);
                                });
                        })
                     }
                 });
        });
    
});
</script>