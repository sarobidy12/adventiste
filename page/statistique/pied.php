<?php
    

    include("../app/connectDB.php");

    use app\classe\use_database;
    use app\classe\getUser;

    $tresorie= $new->prepare("SELECT * FROM membres WHERE function_church = ?",array("1"));
    $a= $tresorie->fetch(PDO::FETCH_OBJ);
     $a1=$a->id;

    $ancien= $new->prepare("SELECT * FROM membres WHERE function_church = ?",array("2"));
    $b= $ancien->fetch(PDO::FETCH_OBJ);
     $a2=$b->id;

    $ai= $new->prepare("SELECT * FROM membres WHERE function_church = ?",array("3"));
    $c= $ai->fetch(PDO::FETCH_OBJ);
     $a3=$c->id;

?>
<table>
    <tr>
            <td style="font-family:calibri;font-size:1.4vh; width:35vh">
                <b>Saram-padefasana:..................................................</b>
            </td>
            
            <td style="font-family:calibri;font-size:1.4vh; width:35vh">
                <b>Ny Mpitahiry vola:</b><?= getUser::nom($a1) ?> <?= getUser::prenom($a1)  ?>
            </td>
            <td style="font-family:calibri;font-size:1.4vh; width:35vh">
                <b>Hita sy hohamarina tamin'ny :............
            </td>
            <td style="font-family:calibri;font-size:1.4vh; width:35vh">
                <b>Mpitahiry vola Mpanampy: </b><?= getUser::nom($a2) ?> <?= getUser::prenom($a2)  ?>
            </td>
    </tr>
    <tr>
            <td style="font-family:calibri;font-size:1.4vh;width:35vh">
                <b>Totalin'ny vola arotsaka amin'ny federasiona : ........</b>
            </td>
            
            <td style="font-family:calibri;font-size:1.4vh">
                <b>Adress :</b><?= getUser::adress($a1);?>
            </td>
            <td style="font-family:calibri;font-size:1.4vh">
                <b>Ny Loholona (na tale) : </b><?= getUser::nom($a3) ?> <?= getUser::prenom($a3)  ?>
            </td>
            <td style="font-family:calibri;font-size:1.4vh">
                <b> Adress: </b><?= getUser::adress($a2);?>
            </td>
    </tr>
    <tr>
            <td style="font-family:calibri;font-size:1.4vh;width:35vh" >
                <b>Nalefany tamin'ny:..................................................</b>
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b> tel N':</b><?= getUser::telephone($a1);?>
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b> tel N':</b><?= getUser::telephone($a3);?>
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b> tel N':</b><?= getUser::telephone($a2);?>
            </td>

    </tr>
    <tr>
            <td style="font-family:calibri;font-size:1.4vh;width:35vh" >
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b>Sonia</b>
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b>Sonia</b>
            </td>
            <td style="font-family:calibri;font-size:1.4vh;">
                <b>Sonia</b>
            </td>

    </tr>


</table>
