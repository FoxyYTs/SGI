<?php
    $usuario = $_POST["user"];
    $clave = $_POST["pass"];
    echo $clave;
    $contrasena = md5($clave);
    echo $contrasena;
    $arr2 = str_split($contrasena);
    for($i=0;$i<strlen($contrasena);$i++){
        $pass=$pass.$arr2[$i]."y".$i*3;
    }
    echo $pass;
    include_once("db.php");
    $conectar=conn();
    $stmt = mysqli_prepare($conectar, "SELECT * FROM acceso WHERE user = ? AND pass = ?");
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $pass);
    mysqli_stmt_execute($stmt);
    $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
    $total=mysqli_num_rows($resultado);
    if($total>0){
        echo "<br>Usuario y clave correctos";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=principal.php'>";
    }else{
        echo '<div class="alert alert-warning" role="alert">Usuario y clave incorrectos</div>';
        //Redirigir el usuario al inicio nuevamente
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.html'>";
    }
    mysqli_stmt_close($stmt);
?>