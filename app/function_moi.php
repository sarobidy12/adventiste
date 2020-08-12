<?php

    function moi($id){

        if($id == 12){
            return "decembre";
        }
        elseif($id == 11){
            return "novembre";
        }
        elseif($id == 10){
            return "octobre";
        }
        elseif($id ==9){
            return "septembre";
        }
        elseif($id == 8){
            return "aout";
        }
        elseif($id == 7){
            return "juiller";
        }
        elseif($id == 6){
            return "juin";
        }
        elseif($id == 5){
            return "mai";
        }
        elseif($id == 4){
            return "avril";
        }
        elseif($id == 3){
            return "mars";
        }
        elseif($id == 2){
            return "fevrier";
        }
        elseif($id == 01){
            return "janvier";
        }
        else{
            return "error";
        }

    };
        
    function numWeek(){

        if(7 >= date('j') AND date('j') <= date('t') AND date('N') >= 6){
            return 1;
        }
        else if(14 >= date('j')  AND date('N') >= 6){
            return 2;
        }
        else if(21 >= date('j')  AND date('N') >= 6){
            return 3;
        }
        else if(28 >= date('j')  AND date('N') >= 6){
            return 4;
        }
        else if(31 >= date('j')  AND date('N') >= 6){
            return 5;
        }
        else{
            echo 'La deposition est resever le week-end seulment';
            exit;
        }
        
    }
    

?>