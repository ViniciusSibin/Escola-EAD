<?php
    $host = 'localhost';
    $user = 'sistema';
    $pass = 'sistema1234';
    $db = 'vtecead';

    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno){
        die("A conexão com o banco de dados falhou");
    }
?>