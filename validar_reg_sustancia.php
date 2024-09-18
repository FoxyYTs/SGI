<?php
        // Verificar si se ha enviado el formulario
        //Validacion y registro de insumo
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger datos del formulario
            $id_sustancia = $_POST["id_sustancia"];
            $ficha_seguridad = $_POST["ficha_seguridad"];
            $tel_emergencia = $_POST["tel_emergencia"];
            $formula = $_POST["formula_quimica"];
            $palabra = $_POST["palabra_seguridad"];
            $numCAS = $_POST["numCAS"];
            $insumo = $_POST["insumo_fk"];
            echo "palabra: $palabra<br>";

            // Conectar a la base de datos
            include_once("db.php");
            $conectar = conn(); //conexion a la base de datos
            $sql = "INSERT INTO sustancia (id_sustancia, ficha_seguridad, tel_emergencia, formula_quimica, palabra_seguridad_fk, numCAS, insumo_fk) VALUES (?, ?, ?, ?, ?, ?, ?)";
            // Preparar la sentencia SQL para insertar una nueva reserva en la base de datos
            $stmt = $conectar->prepare($sql);
            //bind
            $stmt->bind_param("isssisi", $id_sustancia, $ficha_seguridad, $tel_emergencia, $formula, $palabra, $numCAS, $insumo);
            // Ejecutar la sentencia SQL
            if ($stmt->execute()) {
                echo '<div class="alert alert-success" role="alert">Insumo registrado correctamente</div>';
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registro_insumo.php'>";
            } else {
                echo '<div class="alert alert-warning" role="alert"> Error al registrar insumo: </div>' . $stmt->error;
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=registro_insumo.php'>";
            }
            $stmt->close();
            $conectar->close();
        }

?>