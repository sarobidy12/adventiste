<div class="parametre">
    <p style="margin:0;font-size:2vh;padding:0;background-color:deepskyblue;color:white;width:100%;height:5vh;text-align:center;line-height:5vh;">Parametre</p>
    <div id="view_ajax">
    <div class="add_ajouter"  data-aos='fade-up' id="add_categorie" >
        <img src="../public/img/sugg/categorie.png">
        <h1> ajouter nouveau categorie</h1>
    </div>

    <div class="add_ajouter" data-aos='fade-up' id="add_sous_categorie" >
        <img src="../public/img/sugg/sous.png">
        <h1> ajouter un nouveau sous categorie</h1>
    </div>

    <div class="add_ajouter"  data-aos='fade-up' id="member" >
        <img src="../public/img/sugg/voir.png">
        <h1> voir tout les membres</h1>
    </div>

    
    <div class="add_ajouter" data-aos='fade-up' id="edit_member" >
        <img src="../public/img/sugg/member.jpeg">
        <h1>editer un utilisateur</h1>
    </div>

    <div class="add_ajouter" data-aos='fade-up' id="depart">
        <img src="../public/img/sugg /depart.jpg">
        <h1>Depart</h1>
    </div>

    <div class="add_ajouter" data-aos='fade-up' id="admin">
        <img src="../public/img/sugg /admin.png">
        <h1>Admin</h1>
    </div>
</div>

</div>
<script>
     
 $(document).ready(function(){
        $('.add_ajouter').click(function(){
            var el = $(this).attr('id');
            $.ajax({
                url: '../page/add/'+el+'.php',
                cache: true ,
                success: function(data){
                        $('#view_ajax').fadeOut(400,function(){
                                $('#view_ajax').empty();
                                $('#view_ajax').fadeIn(300,function(){
                                        $('#view_ajax').append(data);
                                });
                        })
                }
            });
            });
    });

</script>
