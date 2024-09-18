<?php
    require 'funciones.php';
    include_once("db.php");
    $conectar=conn();

    $user = mysqli_real_escape_string($conectar, $_POST["user"]);
    $token = mysqli_real_escape_string($conectar,$_POST["token"]);
    $pass = mysqli_real_escape_string($conectar, $_POST["password"]);
    $pass2 = mysqli_real_escape_string($conectar,$_POST["password2"]);

    if($pass == $pass2){
        $clave = md5($pass);
        $stmt = mysqli_prepare($conectar, "UPDATE acceso SET password = ? WHERE user = ? AND token_password = ? AND request_password = '1' LIMIT 1");
        mysqli_stmt_bind_param($stmt, "sss", $clave, $user, $token);
        mysqli_stmt_execute($stmt);
        $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
        $total=mysqli_num_rows($resultado);
        if ($total>0) {
            mysqli_stmt_bind_result($stmt,$token, $user);
            $stmt->fetch();
            return true;
        } else {
            return false;
        }
    }
?>