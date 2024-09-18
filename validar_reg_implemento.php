<?php
        // Verificar si se ha enviado el formulario
        //Validacion y registro de Implemento
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger datos del formulario
            $id_implemento= $_POST["id_implemento"];
            $guia= $_POST["guia_uso"];
            $insumo= $_POST["insumoI_fk"];

            // Conectar a la base de datos
            include_once("db.php");
            $conectar = conn(); //conexion a la base de datos
            $sql = "INSERT INTO implemento (id_implemento, guia_uso_lab, insumoI_fk) VALUES (?, ?, ?)";
            // Preparar la sentencia SQL para insertar una nueva reserva en la base de datos
            $stmt = $conectar->prepare($sql);
            //bind
            $stmt->bind_param("isi", $id_implemento, $guia, $insumo);
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