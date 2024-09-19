<?php
    require 'funciones.php';
    include_once("db.php");
    $conectar=conn();


    $arr = array('"',"/");

    if(empty($_GET["user"]) || empty($_GET["token"])){
        header("Location: index.html");
    }

    $user = str_replace($arr, '', $_POST["user"]);
    $token = str_replace($arr, '',$_POST["token"]);
    $pass = mysqli_real_escape_string($conectar, $_POST["password"]);
    $pass2 = mysqli_real_escape_string($conectar,$_POST["password2"]);    // Eliminar posibles barras al final de user y token
    


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