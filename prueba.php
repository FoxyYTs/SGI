<?php
    $correo = "jose_daza82222@elpoli.edu.co";
    include_once("db.php");
    $conectar=conn();
    $stmt = mysqli_prepare($conectar, "UPDATE acceso SET request_password= '1', token_password = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
    $total=mysqli_num_rows($resultado);
    echo $resultado->fetch_assoc()["user"];
?>