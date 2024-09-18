<?php
$expRegPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,16}$/";
$expRegCorreo = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
// Verificar si se ha enviado el formulario
//Validacion y registro de Implemento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $correo = $_POST["correo"];
    $usuario = $_POST["user"];
    $clave = $_POST["pass"];
    $claveconf = $_POST["pass2"];
    // Conectar a la base de datos
    include_once("db.php");
    if (preg_match($expRegCorreo, $correo)) {
        if ($clave != $claveconf) {
            echo '<div class="alert alert-warning" role="alert">Las claves no coinciden</div>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registrarse.html'>";
        } else {
            if (preg_match($expRegPass, $clave)) {
                #Encriptación de contraseña
                $contrasena = md5($clave);
                $arr2 = str_split($contrasena);

                for ($i = 0; $i < strlen($contrasena); $i++) {
                    $pass = $pass . $arr2[$i] . "y" . $i * 3;
                }
                
                $conectar = conn();
                $stmt = mysqli_prepare($conectar, "SELECT * FROM acceso WHERE email = ?");
                mysqli_stmt_bind_param($stmt, "s", $correo);
                mysqli_stmt_execute($stmt);
                $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
                $total=mysqli_num_rows($resultado);

                if($total==0){
                    $sql = "INSERT INTO acceso ( user, pass, email) VALUES (?, ?, ?)";
                    // Preparar la sentencia SQL para insertar una nueva reserva en la base de datos
                    $stmt = $conectar->prepare($sql);
                    //bind  
                    $stmt->bind_param("sss", $usuario, $pass, $correo);
                    // Ejecutar la sentencia SQL
                    if ($stmt->execute()) {
                        echo '<div class="alert alert-success" role="alert">Usuario registrado correctamente</div>';
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.html'>";
                    } else {
                        echo '<div class="alert alert-warning" role="alert"> Error en registro: </div>' . $stmt->error;
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registrarse.html'>";
                    }
                    $stmt->close();
                    $conectar->close();
                }else{
                    echo '<div class="alert alert-warning" role="alert">El correo ya existe</div>';
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registrarse.html'>";
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">La contraseña no cumple con los requisitos</div>';
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registrarse.html'>";
            }
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">El correo no es válido</div>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registrarse.html'>";
    }
}
?>