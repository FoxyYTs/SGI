<?php
    require "funciones.php";
    
    if(empty($_GET["user"]) || empty($_GET["token"])){
        header("Location: index.html");
    }

    $user = $mysqli->real_scape_string($_GET['user']);
    $token = $mysqli->real_scape_string($_GET['token']);
?>