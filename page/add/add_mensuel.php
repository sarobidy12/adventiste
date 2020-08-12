<?php
  
function numWeek(){

       if(29 <= date('j') AND date('j') <= date('t') AND date('N') >= 5){
        return 5;
       }
       else if(21 <= date('j') AND date('j') <= 28 AND date('N') >= 5){
        return 4;
       }
       else if(14 <= date('j') AND date('j') <= 21 AND date('N') >= 5){
        return 3;
       }
       else if(7 <= date('j') AND date('j') <= 14 AND date('N') >= 5){
        return 2;
       }
       else if(1 <= date('j') AND date('j') <= 7 AND date('N') >= 5){
        return 1;
       }
       else {
           echo 'df';
       }
       
}
  echo numWeek();
?>
