<?php


include("../autoload.php");
include("../connectDB.php");
use app\classe\use_database;
    $use = new use_database;
    $req= $use->prepare("SELECT * FROM argent_now WHERE id=?",array("1"));
    $a= $req->fetch(PDO::FETCH_OBJ);
    if($a->argent_now === "0"){
        $insert = $database->prepare('INSERT INTO deposition_federation(
                        numero_recu,
                        id_users,
                        argent_total,
                        ampafoliny,
                        mission_federation,
                        sekoly_sabate,
                        fanabinana,
                        tsingeritaona,
                        sabata_13,
                        fandrosoana,
                        faritra_oasis,
                        day_deposition_federation,
                        week_deposition_federation,
                        month_deposition_federation,
                        years_deposition_federation
                    )
                    
                    VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ');
                
                    $insert->execute(array(
                        "0",
                        "0",
                        $_POST['id'],
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0", 
                        "0",
                        (intval(date('m'),0)-1),
                        date('Y')
                    )
                    );

                    $insert_deposition = $database->prepare('INSERT INTO deposition(
                        d_numero_recu,
                        d_id_users,
                        d_argent_total,
                        f_argent,
                        f_ampafolony,
                        f_mission_federation,
                        f_sekoly_sabate,
                        f_fanambinana,
                        f_tsingeritaona,
                        f_sabata_13,
                        f_fandrosoana,
                        f_faritra_oasis,
                        e_argent,
                        e_fiangonana,
                        e_fampandrosoana,
                        e_faritra_manokana,
                        week_deposition,
                        month_deposition,
                        years_deposition
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
                            ?,
                            ?,
                            ?,
                            ?,
                            ?
                        )
                    ');

                    $insert_deposition->execute(array(
                        "0" ,
                        "0",
                        $_POST['id'],
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        "0",
                        (intval(date('m'),0)-1),
                        date('Y')
                    ));

                    
                    $insert_eglise = $database->prepare('INSERT INTO deposition_eglise(
                        num_recu,
                        argent,
                        id_users,
                        fiangonana,
                        fampandrosoana,
                        faritra_manokana,
                        day_deposition_eglise,
                        week_deposition_eglise,
                        month_deposition_eglise,
                        years_deposition_eglise
                    )
                    
                    VALUE(?,?,?,?,?,?,?,?,?,?) ');
                
                    $insert_eglise->execute(array(
                        "0",
                        $_POST['id'],
                        "0",
                        "0",
                        "0",
                        "0",
                        "0", 
                        "0",
                        (intval(date('m'),0) -1),
                        date('Y')
                    )
                    
                    );
                    $use->prepare("UPDATE argent_now SET argent_now=? WHERE id=?",array($_POST['id'],'1'));
    }
    else{
        echo "vous ne pouver pas utiliser un montant de depart car il y a deja ";
    }


?>