<?php

                require "../function_moi.php";
                require "../connectDB.php";
                require "../class/total.php";
                require "../autoload.php";

                use app\classe\use_database;

                        //20mil
                        if($_POST['billetage'][0] === "0"){
                                $M20 = 0;
                        }else{
                                $M20 = -$_POST['billetage'][0]; 
                        }

                        //10mil
                        if($_POST['billetage'][1] === "0"){
                                $M10 = 0;
                        }else{
                                $M10 = -$_POST['billetage'][1]; 
                        }

                        //5mil
                        if($_POST['billetage'][2] === "0"){
                                $M5 = 0;
                        }else{
                                $M5 = -$_POST['billetage'][2]; 
                        }

                        //2mil
                        if($_POST['billetage'][3] === "0"){
                                $M2 = 0;
                        }else{
                                $M2 = -$_POST['billetage'][3]; 
                        }

                        //2mil
                        if($_POST['billetage'][4] === "0"){
                                $M1 = 0;
                        }else{
                                $M1 = -$_POST['billetage'][4]; 
                        }

                        //500
                        if($_POST['billetage'][5] === "0"){
                                $C5 = 0;
                        }else{
                                $C5 = -$_POST['billetage'][5]; 
                        }

                        //200
                        if($_POST['billetage'][6] === "0"){
                                $C2 = 0;
                        }else{
                                $C2 = -$_POST['billetage'][6]; 
                        }

                        //100
                        if($_POST['billetage'][7] === "0"){
                                $C1 = 0;
                        }else{
                                $C1 = -$_POST['billetage'][7]; 
                        }

                        if(billetage($database,"B_M20") < $_POST['billetage'][0]){
                                
                                echo error($_POST['billetage'][0],billetage($database,"B_M20"),"20.000");
                        }
                        elseif(billetage($database,"B_M10") < $_POST['billetage'][1]){
                                echo error($_POST['billetage'][1],billetage($database,"B_M20"),"10.000");
                        }
                        elseif(billetage($database,"B_M5") < $_POST['billetage'][2]){
                                echo error($_POST['billetage'][2],billetage($database,"B_M5"),"5.000");
                        }
                        elseif(billetage($database,"B_M2") < $_POST['billetage'][3]){
                                echo error($_POST['billetage'][3],billetage($database,"B_M2"),"2.000");
                        }
                        elseif(billetage($database,"B_M1") <  $_POST['billetage'][4]){
                                echo error($_POST['billetage'][4],billetage($database,"B_M1"),"1.000");
                        }
                        elseif(billetage($database,"B_C5") < $_POST['billetage'][5]){
                                echo error($_POST['billetage'][5],billetage($database,"B_C5"),"500");
                        }
                        elseif(billetage($database,"B_C2") <  $_POST['billetage'][6]){
                                echo error($_POST['billetage'][6],billetage($database,"B_C2"),"200");
                        }
                        elseif(billetage($database,"B_C1") <  $_POST['billetage'][7]){
                                echo error($_POST['billetage'][7],billetage($database,"B_C1"),"100");
                        }else{

                                        $ry= $database->prepare("INSERT INTO billetage_users(
                                                id_users,
                                                B_M20,
                                                B_M10,
                                                B_M5,
                                                B_M1,
                                                B_M2,
                                                B_C5,
                                                B_C2,
                                                B_C1,
                                                B_T5,
                                                B_T2,
                                                b_T10,
                                                week_billetage,
                                                month_billetage,
                                                years_billetage
                                        ) 
                                        
                                        VALUE(
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?
                                        )");
                    
                                        $ry->execute(array("0",
                                                        $M20,
                                                        $M10,
                                                        $M5,
                                                        $M2,
                                                        $M1,
                                                        $C5,
                                                        $C2,
                                                        $C1,
                                                        "0",
                                                        "0",
                                                        "0",
                                                        "0",
                                                        "0",
                                                        "0"
                                                        ));
                
                $new = new use_database;

                $req= $new->prepare("SELECT * FROM argent_now WHERE id=?",array("1"));
                $a= $req->fetch(PDO::FETCH_OBJ);
                                               
                $insert = $database->prepare("INSERT INTO depense(argent,categorie,sous_categorie,sabata_depense,month_depense,years_depense,date_depense) VALUE(?,?,?,?,?,?,now())");
                $insert->execute(array($_POST['data'][0],$_POST['data'][1],$_POST['data'][2],numWeek(),intval(date('m'),0), date('Y')));
                                                
                        if($a->argent_now > $_POST['data'][0]){
                        $argent = $a->argent_now - $_POST['data'][0];
                        $new->prepare("UPDATE argent_now SET argent_now=? WHERE id=?",array($argent,'1'));
                                echo '
                                <b style="color:green">tous est bien ete insere</b>
                                ';
                        }
                        else{
                                echo '
                                       <b style="color:red"> Depense est largement superieur au restant  </b>
                                ';
                        }
                                 
                };

                function error($a,$b,$d){
                        $c = $a - $b;
                        return "
                        <b style='color:red'> s billet sont insuffissant pour cette operation il vous manque $c billet de $d arriary </b>. 
                        ";
                }
?>
