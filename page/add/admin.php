<?php
    include('../../app/connectDB.php');
?>
<button class='ajouter'>+</button>
<div class="ajou">
<div class="view_admin" id='admin'>
    <img src="img/logo/avatar.png" alt="" style='border:1px solid;width:10vh;height:10vh;float:left;margin: 0 1vh 0 0vh'>
    <?php
        $query= $database->prepare("SELECT * FROM admins WHERE id=?");
        $query->execute(array(1));
            $b= $query->fetch(\PDO::FETCH_OBJ);
            echo $b->admin_nom;

    ?>
</div>
    
   

<?php
    $query= $database->query("SELECT * FROM admins WHERE admin_c='2' order by id desc");

    $b= $query->fetchall(\PDO::FETCH_OBJ);

    foreach($b AS $a):
        echo '<div class="view_admin" id="f'.$a->id.'">';
            echo '<h3>'.$a->admin_nom.'</h3>';
        echo '</div>';
    endforeach;

?>
<div class="add_admin">
    <h2>
        Ajouter un sous Admin
    </h2>
    <div style='padding:1.5vh'>

    <div class="form-group">
        <label for="">Nom utilisateur</label>
        <input type="text" id='nom' class='form-control'>
    </div>

    <div class="form-group" id='mdp'>
        <label for="">Mot de passe</label>
        <input type="password" id='mdp1' class='form-control'>
    </div>

    <div class="form-group" id='mdp'>
        <label for="">Comfirme le mot de passe</label>
        <input type="password" id='mdp2' class='form-control'>
    </div>

    <button id='add' class='btn btn-success'>Ajouter</button>

    </div>
   
</div>

<div class="add_admin_io">
    <h2>
        Modification Admin
    </h2>
    <div style='padding:1.5vh'>
    <?php
        $query= $database->prepare("SELECT * FROM admins WHERE id=?");
        $query->execute(array(1));
            $b= $query->fetch(\PDO::FETCH_OBJ);
    ?>
        <div class="form-group">
            <label for="">Nom utilisateur</label>
            <input type="text" id='nom2' value="<?= $b->admin_nom; ?>" class='form-control'>
        </div>
   
    <div class="form-group" id='mdp'>
        <label for="">Mot de passe</label>
        <input type="password" id='mdp3' class='form-control'>
    </div>

    <div class="form-group" id='mdp'>
        <label for="">Comfirme le mot de passe</label>
        <input type="password" id='mdp4' class='form-control'>
    </div>
    <button id='upd' class='btn btn-success'>Ajouter</button>
    </div>
   
</div>
<script>
$(document).ready(function(){
    $('.add_admin').hide();
    $('.add_admin_io').hide();

    $('.ajouter').click(function(){
        $('.cont').fadeIn(400);
        $('.add_admin').fadeIn(400);
    });

    $('.cont').click(function(){
        $('.add_admin').fadeOut(400);
        $('.add_admin_io').fadeOut(400);
    });

    $('#admin').click(function(){
        $('.cont').fadeIn(400);
        $('.add_admin_io').fadeIn(400);
    });
    $('#add').click(function(){

        var nom = $('#nom').val();
        var mdp1 = $('#mdp1').val();
        var mdp2 = $('#mdp2').val();

            if( nom != ''){
                if( mdp1 == mdp2){
                        
                        var data = [nom,mdp1];

                            $.ajax({
                                url:'../app/ajax/add_admin.php',
                                type:'POST',
                                data:{data:data},
                                success:function(data){
                                    $('.add_admin').fadeOut(400);
                                    $('.cont').fadeOut(400);
                                    $('.ajou').slideDown(500);
                                    $('.ajou').append('<div class="view_admin"><img src="img/logo/avatar.png" alt="" style="border:1px solid;width:10vh;height:10vh;float:left;margin: 0 1vh 0 0vh"><h3>'+nom+'</h3></div>');
                                  
                                }
                             
                            });
                    }else{
                        alert('mot de passe incorrect');
                    }
            }
      
    });

    $('#upd').click(function(){
        var nom = $('#nom2').val();
        var mdp1 = $('#mdp3').val();
        var mdp2 = $('#mdp4').val();

     

                if( mdp1 == mdp2){
                        
                        var data = [nom,mdp1];
alert(data);
                            $.ajax({
                                url:'../app/ajax/update_admin.php',
                                type:'POST',
                                data:{data:data},
                                success:function(data){
                                    $('.add_admin').fadeOut(400);
                                    $('.cont').fadeOut(400);
                                    $('.ajou').slideDown(500);
                                    $('.ajou').append(data);
                                    $('.add_admin').fadeOut(400);
                                    $('.add_admin_io').fadeOut(400);
                                }
                            });
                    }else{
                        alert('mot de passe incorrect');
                    }

});

    $('.view_admin').click(function(){

        var data= $(this).attr('id');

        $.ajax({
            url:'../app/ajax/del_admin.php',
            type:'POST',
            data:{data : data},
            success:function(data){
                $('#f'+data).slideUp(500);
            }
        });
    })
})
</script>