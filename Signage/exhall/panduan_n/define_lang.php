<?php
session_start();
        //get session when first load page
        if(!isset($_SESSION['lang'])){
        $_SESSION['lang']=1;

         }
        
        if($_SESSION['lang']==1) {
            include('lang_en.php');
        }else if($_SESSION['lang']==2) {
            include('lang_in.php');
        }
?>