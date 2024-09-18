<?php
    $clave = "Password123@";
    $validar = "7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93";

    $pass = "perro";
    $user = "JoseDaza";
    $token = "211c8c0e247f9abac6fe6c808f700b62";
    include_once("db.php");
    $conectar=conn();

    include_once("db.php");
    $conectar=conn();

    $stmt = mysqli_prepare($conectar,"UPDATE acceso SET pass = ?, request_password='0', token_password = '' WHERE user = ? AND token_password = ?");
    $stmt->bind_param("sis", $pass, $user, $token);
    $resultado = $stmt->execute();
    $stmt->close();
    if($resultado){
        echo "Contraseña cambiada";
    }else{
        echo "Error al cambiar contraseña";
    }
?>