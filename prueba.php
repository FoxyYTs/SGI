<?php
    require 'funciones.php';
    $clave = "Password123@";
    echo $clave;
    $pass = encriptar($clave);
    echo $pass;
    $user = "LuzDelly";

    include_once("db.php");
    $conectar=conn();
    $stmt = mysqli_prepare($conectar, "SELECT * FROM acceso WHERE user = ? AND pass = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    // Mostrar resultados en una tabla HTML
    if ($resultado->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
        // Recorrer cada fila del resultado
        while($row = $resultado->fetch_assoc()) {
            echo "<tr><td>" . $row["user"] . "</td><td>" . $row["email"] . "</td><td>" . $row["pass"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    
    // Cerrar conexión
    $conectar->close();
?>