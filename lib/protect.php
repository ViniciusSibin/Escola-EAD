<?php

function protect($admin){
    if(isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }

    if(!isset($_SESSION['admin']) || ($admin == 1 && $_SESSION['admin'] != 1)){
        header("Location: login.php");
    }
}