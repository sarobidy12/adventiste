<?php


    function __autoload($name){
        
        $data =  str_replace('app\classe\\','',$name);
 
        require 'class/'.$data.'.php';

 }

 



?>