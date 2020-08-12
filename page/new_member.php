
<div class="member">
<p style="margin:0;font-size:2vh;padding:0;background-color:green;color:white;width:100%;height:5vh;text-align:center;line-height:5vh;">Nouveau membre</p>
        <div style='padding:3vh'>
        <center>
                        <img src="../public/img/logo/avatar_defaut.png">
        </center>

                        <?php
                                require '../app/autoload.php';
                                use app\classe\formulaire;
                                $input= new formulaire;
                                $input->input('text','nom','0');
                                $input->input('text','prenom','1');
                                $input->input('date','date de naissance','2');
                                $input->input('sexe','sexe','3');
                                $input->input('text','function','4');
                                $input->input('text','eglise actuel','5');
                                $input->input('text','eglise origine','6');
                                $input->input('booleen','batême','7');
                                $input->input('text','adress','8');
                                $input->input('tel','téléphone','9');
                                $input->submit('ajouter','submit');
                        ?>
        </div>
</div>
<script>
$(document).ready(function(){

        $("#submit").click(function(){
                $('html body').animate({scrollTop:0},500); 
                        var a0= $("#0").val();
                        var a1= $("#1").val();
                        var a2= $("#2").val();
                        var a3= $("#3").val();
                        var a4= $("#4").val();
                        var a5= $("#5").val();
                        var a6= $("#6").val();
                        var a7= $("#7").val();
                        var a8= $("#8").val();
                        var a9= $("#9").val();
                        var element= [a0,a1,a3,a2,a4,a5,a6,a7,a8,a9];
              
                if(a0 != '')
                {
                                        $.ajax({
                                            url: '../app/add_ajax/add_member.php',
                                            type: 'POST',
                                            data: { element : element},
                                            success: function(data){
                                                message('<p style="color:green"> '+a0+' est maintenant inscrit dans le nouveau</p>');
                                                $('input').val('');
                                            }
                                        });

                }
                else{
                        message("Veuiller saisir le nom du nouveau utilisateur");
                }
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
        });
});
</script>









