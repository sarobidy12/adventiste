<?php
session_start();

include('app/connectDB.php');
    if(isset($_POST['nom']) AND isset($_POST['mdp'])){
        $requette= $database->prepare("SELECT * FROM admins WHERE admin_nom=? AND admin_mdp=?");
        $requette->execute(array($_POST['nom'],$_POST['mdp']));
        if($requette->rowCount() == 1){
            $a= $requette->fetch(\PDO::FETCH_OBJ);
                if($a->admin_c == 1){
                    $_SESSION['admin']='admin-principale';
                }else{
                    $_SESSION['admin']='sous-admin';
                }
                header('location:public/');
        }else{
            $message='le nom utilisateur ou mot de passe invalid';
        }
    }else{
        $message='nom';
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
        
        <link rel="stylesheet" type="text/css"  href="public/css/style.css"/>
        <link rel="stylesheet" href="public/css/aos.css">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/bootstrap-theme.min.css">
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
                background-image: url('public/img/sugg/fond.jpg');
                background-size: cover;
                animation: fond 1500ms;
            }
            @keyframes fond{
                0%{
                    opacity: 0;
                }
                100%{
                    opacity: 1;
                }
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
<img src="public/img/sugg/layer1.png" id='logo'>
<div class='admin'b data-aos='fade-in'>
    <form action="" method="POST">
        <input type="text" class='admin-form' placeholder='Nom utilisateur' name="nom" id="">
        <input type="password" class='admin-form' placeholder='mot de passe' name="mdp" id="">
        <input type="submit" value='CONNEXION' class='sub-adm'>
    </form>
    <?php
        if(isset($message)){
            echo $message;
        }

    ?>
</div>
<script src="public/js/angular.min.js"></script>
<script src="public/js/angular.js"></script>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/aos.js"></script>
      <script>
      $(document).ready(function(){
        AOS.init({
            duration:1500
        })
      })
      </script>
    </body>
</html>