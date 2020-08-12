<?php

    function total_element_eglise($database,$name_colon,$moi,$anne){

        $requette = $database->query("SELECT sum($name_colon) FROM deposition_eglise WHERE month_deposition_eglise = $moi AND years_deposition_eglise= $anne");

        $a= $requette->fetchall();

        return $a[0][0];

    };

    function total_element_federation($database,$name_colon,$moi,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_federation WHERE month_deposition_federation = $moi AND years_deposition_federation= $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };
    
    function total_element_eglise_users($database,$id,$name_colon,$moi,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_eglise WHERE id_users =$id AND   month_deposition_eglise = $moi AND years_deposition_eglise= $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

    function total_element_federation_users($database,$id,$name_colon,$moi,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_federation WHERE id_users = $id  AND   month_deposition_federation = $moi AND years_deposition_federation= $anne");
        $a= $requette->fetchall();
        return $a[0][0];

    };


    function total_element_federation_by_sabat($database,$name_colon,$moi,$sabata,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_federation WHERE month_deposition_federation = $moi AND week_deposition_federation = $sabata AND years_deposition_federation= $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

    
    function total_element_eglise_by_sabat($database,$name_colon,$moi,$sabata,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_eglise WHERE  month_deposition_eglise = $moi AND week_deposition_eglise = $sabata AND years_deposition_eglise= $anne");
        $a= $requette->fetchall();
        return $a[0][0];

    };

    function total_element_federation_by_sabat_users($database,$id,$name_colon,$moi,$sabata,$anne){

        $requette = $database->query("SELECT sum($name_colon) FROM deposition_federation WHERE  id_users =$id  AND month_deposition_federation = $moi AND week_deposition_federation = $sabata AND years_deposition_federation= $anne");
        $a= $requette->fetchall();
        return $a[0][0];

    };

    
    function total_element_eglise_by_sabat_users($database,$id,$name_colon,$moi,$sabata,$anne){
        $requette = $database->query("SELECT sum($name_colon) FROM deposition_eglise WHERE  id_users = $id  AND month_deposition_eglise = $moi AND week_deposition_eglise = $sabata AND years_deposition_eglise= $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

    
    function totaldepenseMonth($database,$moi,$anne){
        $requette = $database->query("SELECT sum(argent) FROM depense WHERE  month_depense = $moi  AND years_depense = $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

     
    function totaldepenseMonth_byCategorie($database,$categorie,$moi,$anne){
        $requette = $database->query("SELECT sum(argent) FROM depense WHERE  categorie = $categorie AND month_depense = $moi  AND years_depense = $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

    function totaldepenseMonth_bysabata($database,$sabata,$moi,$anne){
        $requette = $database->query("SELECT sum(argent) FROM depense WHERE  sabata_depense = $sabata AND month_depense = $moi  AND years_depense = $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

    
    function totaldepense_bysabata_categorie($database,$sabata,$categorie,$moi,$anne){
        $requette = $database->query("SELECT sum(argent) FROM depense WHERE  sabata_depense = $sabata AND categorie = $categorie AND month_depense = $moi  AND years_depense = $anne");
        $a= $requette->fetchall();
        return $a[0][0];
    };

 
    function bd_row($database,$sabata,$moi,$anne){
        $requette = $database->query("SELECT COUNT(*) FROM deposition WHERE   week_deposition =$sabata AND month_deposition = $moi AND years_deposition= $anne");
        $a= $requette->fetchall();
        return $a[0][0];

    };
     
    function billetage($database,$sabata){
        $requette = $database->query("SELECT sum($sabata) FROM billetage_users");
        $a= $requette->fetchall();
        return $a[0][0];
    };

?>