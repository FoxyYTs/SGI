<?php
    require 'funciones.php';
    include_once("db.php");
    $conectar=conn();


    $arr = array('"',"/");

    if(empty($_POST["user"]) || empty($_POST["token"]) || empty($_POST["password"]) || empty($_POST["password2"])){
        header("Location: index.html");
        exit;
    }
    $user = str_replace($arr, '', $_POST["user"]);
    $token = str_replace($arr, '',$_POST["token"]);
    $pass = mysqli_real_escape_string($conectar, $_POST["password"]);
    $pass2 = mysqli_real_escape_string($conectar,$_POST["password2"]);
    
    if($pass == $pass2){
        $clave = encriptar($pass);
        if(actualizarPass($clave,$user, $token)){
            echo "Contraseña cambiada";
            header("Location: index.html");
        }else{
            echo "Error al cambiar contraseña";
            header("Location: recuperar.html");
        }
    }
?>