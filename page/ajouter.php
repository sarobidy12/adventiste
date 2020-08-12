<style>
            ul{  
               background-color:#eee;  
               cursor:pointer;  
               position:absolute;
               z-index:2;
               width:90%;
            }  
            li{  
                padding:12px;  
            }

            
</style>
<div class="add_ol">
<?php
    if(isset($_POST['id'])){
        include('../app/connectDB.php');
        include("../APP/function_moi.php");

        $moi= date('m');
        $sabata= numWeek();
        $anne= date('Y');

        $deposition= $database->prepare("SELECT * FROM deposition WHERE week_deposition=$sabata AND month_deposition=$moi AND years_deposition = $anne AND  d_id_users=?");
        $deposition->execute(array($_POST['id']));

        if($deposition->rowCount() == 1){
            $a= $deposition->fetch(\PDO::FETCH_OBJ);
        }

        $billetage= $database->prepare("SELECT * FROM billetage_users WHERE week_billetage=$sabata AND month_billetage=$moi AND years_billetage=$anne AND id_users=? ");
        $billetage->execute(array($_POST['id']));

        if($billetage->rowCount() == 1){
            $b= $billetage->fetch(\PDO::FETCH_OBJ);
        }
    }
?>
<div class="add" data-aos='zoom-in'>
        <h1>
            Deposition
        </h1>
        <div class="add-content">
            <div class="user">
            </div>
             
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">numero de l'utilisateur</label>
                    <input type="text" id="user" value='<?php if(isset($a)){ echo $a->d_id_users;} ?>' class="form-control">
                    <div id="countryList"></div>  
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">numero du Recu</label>
                    <input type="text" id="recu" value='<?php if(isset($a)){ echo $a->d_numero_recu;} ?>' class="form-control">
                    </div>
                </div>
            </div>
    
            <h4>Deposition Federation</h4>
    
                <div class="form-group">
                    <label for="">Ampafoliny</label>
                    <input type="text" value='<?php if(isset($a)){ echo $a->f_ampafolony;} ?>'  id="Ampafoliny"  class="form-control federation">
                </div>
    
                <div class="form-group">
                    <label for="">Mission Federation</label>
                    <input type="text" id="Mission" value='<?php if(isset($a)){ echo $a->f_mission_federation;} ?>' class="form-control federation">
                </div>
    
                <div class="form-group">
                    <label for="">Sekoly Sabata</label>
                    <input type="text" id="Sekoly" value='<?php if(isset($a)){ echo $a->f_sekoly_sabate;} ?>' class="form-control federation">
                </div>
                
                <div class="form-group">
                    <label for="">Fanambinana</label>
                    <input type="text" id='Fanambinana' value='<?php if(isset($a)){ echo $a->f_fanambinana;} ?>'     class="form-control federation">
                </div>
    
                <div class="form-group">
                    <label for="">Tsingeritaona</label>
                    <input type="text" id='Tsingeritaona' value='<?php if(isset($a)){ echo $a->f_tsingeritaona;} ?>' class="form-control federation">
                </div>
    
                <div class="form-group">
                    <label for="">Sabata faha 13</label>
                    <input type="text" id='sabata13' value='<?php if(isset($a)){ echo $a->f_sabata_13;} ?>'  class="form-control federation">
                </div>
    
                <div class="form-group">
                    <label for="">Fandrosoana</label>
                    <input type="text"  id='Fandrosoana' value='<?php if(isset($a)){ echo $a->f_fandrosoana;} ?>' class="form-control federation">
                </div>
                    
                <div class="form-group">
                    <label for="">Fanatitra OASIS</label>
                    <input type="text"  id='Fanatitra' value='<?php if(isset($a)){ echo $a->f_faritra_oasis;} ?>' class="form-control federation">
                </div>

            <h4>Deposition Eglise</h4>

                <div class="form-group">
                    <label for="">Fiangonana</label>
                    <input type="text"  id='Fiangonana' value='<?php if(isset($a)){ echo $a->e_fiangonana;} ?>' class="form-control eglise">
                </div>

                <div class="form-group">
                    <label for="">Fampandroana</label>
                    <input type="text"  id='Fampandroana' value='<?php if(isset($a)){ echo $a->e_fampandrosoana;} ?>' class="form-control eglise">
                </div>

                <div class="form-group">
                    <label for="">Faritra Manokana</label>
                    <input type="text"  id='Faritra' value='<?php if(isset($a)){ echo $a->e_faritra_manokana;} ?>' class="form-control eglise">
                </div>
                    <input type="text" id='id_user' style='display:none'>
                </div>

            </div>
            </div>

            <div class="billetage" data-aos='zoom-in'>
            <h4>
                Billetage
            </h4>
            <div style="padding: 1vh">

            <table >
               
                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        20.000 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->B_M20;} ?>' id='M20'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="M20 bi">0 ar</div>
                    </td>
                </tr>
               
                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        10.000 X
                    </td>
                    <td>
                        <input type="text"  value='<?php if(isset($b)){ echo $b->B_M10;} ?>' id='M10'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="M10 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        5.000 X
                    </td>
                    <td>
                        <input type="text"  value='<?php if(isset($b)){ echo $b->B_M5;} ?>' id='M5'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="M5 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        2.000 X
                    </td>
                    <td>
                        <input type="text"  value='<?php if(isset($b)){ echo $b->B_M2;} ?>' id='M2'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="M2 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        1.000 X
                    </td>
                    <td>
                        <input type="text"  value='<?php if(isset($b)){ echo $b->B_M1;} ?>' id='M1'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="M1 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        500 X
                    </td>
                    <td>
                        <input type="text"  value='<?php if(isset($b)){ echo $b->B_C5;} ?>' id='C5'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="C5 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        200 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->B_C2;} ?>' id='C2'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="C2 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        100 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->B_C1;} ?>' id='C1'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="C1 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        50 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->B_T5;} ?>' id='P50'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="P50 bi">0 ar</div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        20 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->B_T2;} ?>' id='P20'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="P20 bi">0 ar</div>
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                        10 X
                    </td>
                    <td>
                        <input type="text" value='<?php if(isset($b)){ echo $b->b_T10;} ?>' id='P10'>
                    </td>
                    <td>
                       =<div  style='color: green;float: right;width: 10vh;text-align: right;' class="P10 bi">0 ar</div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10vh;padding:1vh;text-align:right">
                      
                    </td>
                    <td style="text-align:right;padding: 1px 1vh;font-size: 1.5vh;color: green">
                        TOTAL 
                    </td>
                    <td>
                        =<div class="billetage_total bi" style='color: green;float: right;width: 10vh;text-align: right;'>0 ar</div>
                    </td>

            <tr>
                <td style="width: 10vh;padding:1vh;text-align:right">
                  
                </td>
                <td style="text-align:right;padding: 1px 1vh;font-size: 1.5vh;color: green">
                    ECAR 
                </td>
                <td>
                    =<div class="ecar bi" style='color: green;float: right;width: 10vh;text-align: right;'>0 ar</div>
                </td>
        </table>
<center>
        <button id="Depose" style='width: 90%;margin: 1vh 0' class="btn btn-success">Depose</button>
</center>
</div>

</div>
     <div class="total" data-aos='zoom-in'>
         <h1>Total</h1>
         <div style='padding:1vh' class="totale">
        <center>

            <table >
                <tr>
                    <td align='right'>total Federation :</td>
                    <td><div id="federation" class='bi' style='color:green;text-align: right'><?php if(isset($a)){ echo $a->f_argent.' ariary';}else{echo '0 ariary';} ?></div></td>
                </tr>   

                <tr>   
                    <td align='right'>total Eglise :</td>
                    <td><div id="eglise" class='bi' style='color:green;text-align: right'><?php if(isset($a)){ echo $a->e_argent.' ariary';}else{echo '0 ariary';} ?></div></td>
                </tr>

                <tr>   
                    <td align='right'>total :</td>
                    <td><div id="total" class='bi' style='color:green;text-align: right'><?php if(isset($a)){ echo $a->d_argent_total.' ariary';}else{echo '0 ariary';} ?></div></td>
                </tr>
            </table>
        </center>

        </div>
     </div>
    
     <div  class="reset" data-aos="zoom-in">
            <h3>
                    avez vous deja verse les l'argent
            </h3>
    
                <center>
                        <button class='btn btn-success' style="width: 5vh" id="oui">
                                oui
                            </button>


                            <button class='btn btn-error' style="width: 5vh" id="non">
                            non
                            </button>
                </center>

            </div>

<div id='update'>

</div>

</div>
    <script>
    $(document).ready(function(){
        $(".cont").show();
        $(".cont").fadeIn(800);
        <?php
            if(isset($_POST['id'])){
                echo '$(".reset").fadeOut(800);';
                echo '$(".cont").fadeOut(800);';
            }else{
                echo '$(".reset").fadeIn(800);';
            }
        ?>
        $('#Depose').click(function(){
            var test_user=$('#user').val()*1;
           
           if(isNaN(test_user) === false){
                var user=$('#user').val()*1;
           }else{
                var user=$('#id_user').val()*1;
           }

            var M20= $("#M20").val();
            var M10= $("#M10").val();
            var M5= $("#M5").val();
            var M2= $("#M2").val();
            var M1= $("#M1").val();
            var C5= $("#C5").val();
            var C2= $("#C2").val();
            var C1= $("#C1").val();
            var P5= $("#P50").val();
            var P2= $("#P20").val();
            var P1= $("#P10").val();

            var BM20= M20*20000;
            var BM10= M10*10000;
            var BM5= M5*5000;
            var BM2= M2*2000;
            var BM1= M1*1000;
            var BC5= C5*500;
            var BC2= C2*200;
            var BC1= C1*100;
            var BP5= P5*50;
            var BP2= P2*20;
            var BP1= P1*10;

            var totalBilletage= BM20 + BM10 + BM5 + BM2 + BM1 + BC5 + BC2 + BC1 + BP5 + BP2 + BP1;

            var Ampafoliny = $('#Ampafoliny').val()*1;
            var Mission = $('#Mission').val()*1;
            var Sekoly = $('#Sekoly').val()*1;
            var Fanambinana = $('#Fanambinana').val()*1;
            var Tsingeritaona = $('#Tsingeritaona').val()*1;
            var sabata13 = $('#sabata13').val()*1;
            var Fandrosoana = $('#Fandrosoana').val()*1;
            var Fanatitra = $('#Fanatitra').val()*1;
            var Fiangonana=$('#Fiangonana').val()*1;
            var Fampandroana=$('#Fampandroana').val()*1;
            var Faritra=$('#Faritra').val()*1;

            var recu=$('#recu').val()*1;

            var totalArgent = Ampafoliny + Mission + Sekoly + Fanambinana + Tsingeritaona + sabata13 + Fandrosoana + Fanatitra + Fiangonana + Fampandroana + Faritra;
            var totalfedererarion = Ampafoliny + Mission + Sekoly + Fanambinana + Tsingeritaona + sabata13 + Fandrosoana + Fanatitra;
            var totalEglise=  Fiangonana + Fampandroana + Faritra;
            if( totalBilletage == totalArgent){

                var data = [recu,user,totalArgent];
                var billetage = [M20,M10,M5,M2,M1,C5,C2,C1,P5,P2,P1];
                var federation= [totalfedererarion,Ampafoliny,Mission,Sekoly,Fanambinana,Tsingeritaona,sabata13,Fandrosoana,Fanatitra]
                var eglise = [totalEglise,Fiangonana,Fampandroana,Faritra];

<?php
    if(isset($_POST['id'])){
        echo " $.ajax({
                url:'../app/insertDB/update_users.php',
                type:'POST',
                data:{data : data,billetage : billetage,federation : federation,eglise : eglise },
                success: function(data){
                    message(data);
                    $('html body').animate({scrollTop:0},500); 
                }
        });";
    }
    else{
        echo " $.ajax({
            url:'../app/insertDB/insert_argent.php',
            type:'POST',
            data:{data : data,billetage : billetage,federation : federation,eglise : eglise },
            success: function(data){
                message(data);
            }
    });
            $('html body').animate({scrollTop:0},500); 
            $('.user').slideUp(500);
            $('input').val('');
            $('.bi').html('0 ariary');
    ";
    }
?>

            }else{
                message('<b style="color:red">Error au comptage de billetage</b>');

            }

        });

        $('#user').keyup(function(){  
            var query = $(this).val();  

            if(isNaN(query) === true){
                $(".user").empty();

                if(query != '')  
                    {  
                        $.ajax({
                                url:'../app/ajax/fetch.php',
                                method:"POST",  
                                data:{query:query},  
                                success:function(data)  
                                {  
                                    $('#countryList').fadeIn();  
                                    $('#countryList').html(data);  
                                }  
                        });  
                    }
        }else{

            var data = $("#user").val();
            $.ajax({
                url:"../app/ajax/user.php",
                method:'POST',
                cache:false,
                data:{data:data},
                success:function(data){
                    $(".user").empty();
                    $(".user").slideDown(00);
                    $(".user").append(data);
                }
            });
        }
    });  
     $(document).on('click', 'li', function(){  
          $('#user').val($(this).text());  
          $('#countryList').fadeOut(); 
          var id=$(this).attr('data');
          $('#id_user').val(id);
     }); 
    
        $(".federation").keyup(function(){

            var Ampafoliny = $('#Ampafoliny').val()*1;
            var Mission = $('#Mission').val()*1;
            var Sekoly = $('#Sekoly').val()*1;
            var Fanambinana = $('#Fanambinana').val()*1;
            var Tsingeritaona = $('#Tsingeritaona').val()*1;
            var sabata13 = $('#sabata13').val()*1;
            var Fandrosoana = $('#Fandrosoana').val()*1;
            var Fanatitra = $('#Fanatitra').val()*1;
            var data = Ampafoliny + Mission + Sekoly + Fanambinana + Tsingeritaona + sabata13 + Fandrosoana + Fanatitra;
                
                $('#federation').empty();
                $('#federation').append(data+' ariary');

        });

        $('.eglise').keyup(function(){
            /*   popo   */
            var Fiangonana=$('#Fiangonana').val()*1;
            var Fampandroana=$('#Fampandroana').val()*1;
            var Faritra=$('#Faritra').val()*1;

            var data = Fiangonana + Fampandroana + Faritra;

            $('#eglise').empty();
            $('#eglise').append(data+' ariary');

         });

         $('.form-control').keyup(function(){
           
            var data =  total();
            $('#total').empty();
            $('#total').append('<b>'+data+' ariary</b>');

        });

        $('input').keyup(function(){
            
            var M20= $("#M20").val();
            var M10= $("#M10").val();
            var M5= $("#M5").val();
            var M2= $("#M2").val();
            var M1= $("#M1").val();
            var C5= $("#C5").val();
            var C2= $("#C2").val();
            var C1= $("#C1").val();
            var P5= $("#P50").val();
            var P2= $("#P20").val();
            var P1= $("#P10").val();

            var BM20= M20*20000;
            var BM10= M10*10000;
            var BM5= M5*5000;
            var BM2= M2*2000;
            var BM1= M1*1000;
            var BC5= C5*500;
            var BC2= C2*200;
            var BC1= C1*100;
            var BP5= P5*50;
            var BP2= P2*20;
            var BP1= P1*10;

            $(".M20").html(BM20+' ar');
            $(".M10").html(BM10+' ar');
            $(".M5").html(BM5+' ar');
            $(".M2").html(BM2+' ar');
            $(".M1").html(BM1+' ar');
            $(".C5").html(BC5+' ar');
            $(".C2").html(BC2+' ar');
            $(".C1").html(BC1+' ar');
            $(".P50").html(BP5+' ar');
            $(".P20").html(BP2+' ar');
            $(".P10").html(BP1+' ar');

            var totalBilletage= BM20 + BM10 + BM5 + BM2 + BM1 + BC5 + BC2 + BC1 + BP5 + BP2 + BP1;

            $('.billetage_total').html(totalBilletage+' ar');
            var ecar = totalBilletage - total()
            $('.ecar').html(ecar+' ar');

            
    
        });

        $('#oui').click(function(){
            $.ajax({
                url:'../app/ajax/reset_billetage.php',
                success:function(data){
                    message(data);
                    $(".cont").fadeOut(300,function(){
                    $(".cont").hide();
                    $(".reset").fadeOut();
                });
                }
            })
        });

        $("#non").click(function(){
            $(".cont").fadeOut(300,function(){
                $(".cont").hide();
                $(".reset").fadeOut();
            });
        });

        $('#update').click(function(){
            $.ajax({
                url:'../app/ajax/comfirm_insert.php',
                success:function(data){
                    $('.total').hide()
                    $('.billetage').hide()
                    $(".add_ol").empty();
                    $(".add_ol").append(data);
                    $(".add_ol").addClass('update');
                    $('#update').hide();
                }
            })
        });

    });
    
    function total(){
            var Ampafoliny = $('#Ampafoliny').val()*1;
            var Mission = $('#Mission').val()*1;
            var Sekoly = $('#Sekoly').val()*1;
            var Fanambinana = $('#Fanambinana').val()*1;
            var Tsingeritaona = $('#Tsingeritaona').val()*1;
            var sabata13 = $('#sabata13').val()*1;
            var Fandrosoana = $('#Fandrosoana').val()*1;
            var Fanatitra = $('#Fanatitra').val()*1;
            var Fiangonana=$('#Fiangonana').val()*1;
            var Fampandroana=$('#Fampandroana').val()*1;
            var Faritra=$('#Faritra').val()*1;
            var data = Ampafoliny + Mission + Sekoly + Fanambinana + Tsingeritaona + sabata13 + Fandrosoana + Fanatitra + Fiangonana + Fampandroana + Faritra;
            return data;
    }

    function message(data){
        $(".message").fadeIn(1000);
        $(".message").show();
        $(".message").empty();
        $(".message").append("<div data-aos='fade-up' style='top:84vh' class='sms'>"+data+"</div>");
        $(".message").fadeOut(5000);
    }
    </script>