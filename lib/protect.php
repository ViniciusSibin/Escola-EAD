<?php
if(!function_exists("protect")){
    function protect($admin){

        if(!isset($_SESSION)){
            session_start();
        }
        
        if(!isset($_SESSION['usuario'])){
            header("Location: login.php");
        }

        if($admin == 1 && $_SESSION['admin'] != 1){
            header("Location: login.php");
        }
    }
}