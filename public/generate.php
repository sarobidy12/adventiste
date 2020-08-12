<style>

</style>

<?php

function rey($rey,$ry){

    $database = new \PDO('mysql:host=127.0.0.1;dbname=adventiste','root','');
    $database->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    $requette = $database->query($rey);
    $a= $requette->fetchall(PDO::FETCH_OBJ);
    $num=0;
    foreach($a AS $b):
        $num += $b->$ry;
    endforeach;
    return $num;

};

function total($database,$sabata,$name_colon,$moi,$anne){

    $requette = $database->query("SELECT sum($name_colon) FROM deposition WHERE week_deposition = $sabata AND  month_deposition = $moi AND years_deposition = $anne");
    $a= $requette->fetchall();
    return $a[0][0];

};


    include("../app/class/total.php");
    include("../app/connectDB.php");
    include("../app/autoload.php");

    use app\classe\use_database;
    use app\classe\getUser;
    $new = new use_database;
    
    $moi= $_GET['m'];
    $sabata=$_GET['w'];
    $anne=$_GET['y'];
            
            $ligne_total = bd_row($database,$sabata,$moi,$anne);

            $ligne=  ceil(bd_row($database,$sabata,$moi,$anne)/20);
            $b=1;
            $u=20;
            $f=18000;
            
echo "<table border='0.5'>";

if($ligne_total <= 20){
    include("../page/statistique/en_tete.php");
    echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">Totalin\'ny nafindra</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '</tr>';
    foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata  LIMIT 20") AS $a):
    echo '<tr>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
        echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
    echo '</tr>';
    endforeach;
    
    echo '<tr>';
    echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny isan-tsanganana na Afindra </b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","d_argent_total")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_argent")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_ampafolony")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_mission_federation")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sekoly_sabate")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fanambinana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_tsingeritaona")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sabata_13")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fandrosoana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_faritra_oasis")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_argent")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fiangonana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g =(rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fampandrosoana")) + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_faritra_manokana")).'</b></td>';
    echo '</tr>';
    include("../page/statistique/pied.php");


}

elseif($ligne_total <= 40){
    include("../page/statistique/en_tete.php");
    echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">Totalin\'ny nafindra</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
    echo '</tr>';
    foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata LIMIT 20") AS $a):
    echo '<tr>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
        echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
    echo '</tr>';
    endforeach;
    
    echo '<tr>';
    echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny isan-tsanganana na Afindra </b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","d_argent_total")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_argent")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_ampafolony")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_mission_federation")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sekoly_sabate")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fanambinana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_tsingeritaona")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sabata_13")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fandrosoana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_faritra_oasis")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_argent")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fiangonana")).'</b></td>';
    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g =(rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fampandrosoana")) + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_faritra_manokana")).'</b></td>';
    echo '</tr>';
 

     $fin = $ligne_total - 20;
    $no = $u -1;
    include("../page/statistique/en_tete.php");
          echo '<tr>';
                echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny nafindra</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k).'</b></td>';
                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g).'</b></td>';
          echo '</tr>';

      foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata LIMIT $fin OFFSET $no") AS $a):
          echo '<tr>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
    echo '</tr>';
          endforeach;
          echo '<tr>';
                  echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b></b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'d_argent_total',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_argent',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_ampafolony',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_mission_federation',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_sekoly_sabate',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_fanambinana',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_tsingeritaona',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_sabata_13',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_fandrosoana',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_faritra_oasis',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_argent',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_fiangonana',$moi,$anne)).'</td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_fampandrosoana',$moi,$anne) +  total($database,$sabata,'e_faritra_manokana',$moi,$anne)).'</td>';
          echo '</tr>';
    echo "</table>";
    include("../page/statistique/pied.php");

}
else{

      for($i =1 ;$i < ($ligne - 1) ; $i++){
                  if($i==1){
                    include("../page/statistique/en_tete.php");
                            echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">Totalin\'ny nafindra</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh">-</td>';
                            echo '</tr>';
                            foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata LIMIT 20") AS $a):
                            echo '<tr>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
                            echo '</tr>';
                            endforeach;

                            echo '<tr>';
                                echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny isan-tsanganana na Afindra </b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","d_argent_total")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_argent")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_ampafolony")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_mission_federation")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sekoly_sabate")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fanambinana")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_tsingeritaona")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_sabata_13")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_fandrosoana")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","f_faritra_oasis")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_argent")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k= rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fiangonana")).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g =(rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_fampandrosoana")) + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_faritra_manokana")).'</b></td>';
                                echo '</tr>';

                        

                  }
                  include("../page/statistique/en_tete.php");
                            echo '<tr>';
                                echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny nafindra</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k).'</b></td>';
                                echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g).'</b></td>';
                            echo '</tr>';

                            foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata LIMIT 20 OFFSET $u") AS $a):
                                echo '<tr>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
                                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
                                echo '</tr>';
                            endforeach;

                      echo '<tr>';
                            echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny isan-tsanganana na Afindra </b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n =  $n +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","d_argent_total")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p = $p + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_argent")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q = $q +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_ampafolony")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w =  $w +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_mission_federation")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r =  $r +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_sekoly_sabate")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t = $t +   rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_fanambinana")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y = $y +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_tsingeritaona")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j =  $j +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_sabata_13")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s =  $s + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_fandrosoana")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d = $d +  rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","f_faritra_oasis")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f= $d + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","e_argent")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k= $k + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","e_fiangonana")).'</b></td>';
                            echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g = $g + (rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT  20 OFFSET $u ","e_fampandrosoana")) + rey("SELECT * FROM deposition WHERE week_deposition = $sabata AND month_deposition= $moi AND week_deposition= $sabata LIMIT 20","e_faritra_manokana")).'</b></td>';
                     echo '</tr>';
                      $u += 20;
          }

        $fin = $ligne_total - $u;
          $no = $u;
          include("../page/statistique/en_tete.php");
            echo '<tr>';
                  echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny nafindra</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($n).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($p).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($q).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($w).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($r).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($t).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($y).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($j).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($s).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($d).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($f).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($k).'</b></td>';
                  echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($g).'</b></td>';
            echo '</tr>';
            foreach($new->query("SELECT * FROM deposition WHERE month_deposition= $moi AND week_deposition= $sabata LIMIT $fin OFFSET $no") AS $a):
                echo '<tr>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.$b++.'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: start;padding:1vh;font-size:1vh;font-family:calibri"><b>'.getUser::nom($a->d_id_users).' '.getUser::prenom($a->d_id_users).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_numero_recu).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->d_argent_total).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_argent).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_ampafolony).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_mission_federation).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sekoly_sabate).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fanambinana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_tsingeritaona).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_sabata_13).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_fandrosoana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->f_faritra_oasis).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_argent).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format($a->e_fiangonana).'</b></td>';
                    echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(($a->e_fampandrosoana + $a->e_faritra_manokana)).'</b></td>';
                echo '</tr>';
                endforeach;
                echo '<tr>';
                        echo '<td colspan="3" style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>Totalin\'ny isan-tsanganana na Afindra</b></td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'d_argent_total',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_argent',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_ampafolony',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_mission_federation',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_sekoly_sabate',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_fanambinana',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_tsingeritaona',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_sabata_13',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_fandrosoana',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'f_faritra_oasis',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_argent',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_fiangonana',$moi,$anne)).'</td>';
                        echo '<td style="height: 1.5vh;text-align: end;padding:1vh;font-size:1vh"><b>'.number_format(total($database,$sabata,'e_fampandrosoana',$moi,$anne) +  total($database,$sabata,'e_faritra_manokana',$moi,$anne)).'</td>';
                echo '</tr>';
          echo "</table>";
          include("../page/statistique/pied.php");
      
        }


?>  

