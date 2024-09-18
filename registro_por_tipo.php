<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - SGI LAB MANAGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff !important;
        }

        .nav-link {
            color: #555 !important;
        }

        .nav-link.active {
            color: #007bff !important;
        }

        .background-section {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('ruta/a/tu/imagen-de-fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="principal.php">LAB MANAGER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="insumos.php">INSUMOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buscar_insumo.html">BUSCAR INSUMO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro_insumo.php">REGISTRO INSUMO</a><!--Venimos de esta ventana-->
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        // Verificar si se ha enviado el formulario
        //Validacion y registro de insumo
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger datos del formulario
            $nombre_insumo = $_POST["nombre_insumo"];
            $tipo_insumo = $_POST["tipo_insumo"];
            $foto = $_POST["foto"];
            $stock = $_POST["stock"];
            $ubicacion = $_POST["ubicacion"];
            $und_medida = $_POST["und_medida"];
            $ficha_tec = $_POST["ficha_tecnica"];
            $id_insumo = 0;

            // Conectar a la base de datos
            include_once("db.php");
            $conectar = conn(); //conexion a la base de datos
            $sql = "INSERT INTO insumo (nombre_insumo, tipo_insumo, foto, stock_insumo, ubicacion_fk, und_medida_fk, ficha_tecnica) VALUES (?, ?, ?, ?, ?, ?, ?)";
            // Preparar la sentencia SQL para insertar una nueva reserva en la base de datos
            $stmt = $conectar->prepare($sql);
            //bind
            $stmt->bind_param("sssisis", $nombre_insumo, $tipo_insumo, $foto, $stock, $ubicacion, $und_medida, $ficha_tec);
            // Ejecutar la sentencia SQL
            if ($stmt->execute()) {
                echo '<div class="alert alert-success" role="alert">Insumo registrado correctamente</div>';
                $id_insumo = $conectar->insert_id;
            } else {
                echo '<div class="alert alert-warning" role="alert"> Error al registrar insumo: </div>' . $stmt->error;
            }
            $stmt->close();
        }
        echo '<h2 class="mt-5">Registro de ' . $tipo_insumo   . '</h2>';
        //Registro según el tipo de insumo
        if ($tipo_insumo == 'SUSTANCIA') {
            //En caso de que el tipo de insumo sea sustancia
        ?>
            <form action="validar_reg_sustancia.php" method="POST">
                <div class="form-group">
                    <label for="id_sustancia">Id. sustancia:</label>
                    <input type="text" class="form-control" name="id_sustancia" required>
                </div>
                <div class="form-group">
                    <label for="ficha_seguridad">Ficha de seguridad:</label>
                    <input type="text" class="form-control" name="ficha_seguridad" required>
                </div>
                <div class="form-group">
                    <label for="tel_emergencia">Telefono de emergencia:</label>
                    <input type="text" class="form-control" name="tel_emergencia" required>
                </div>
                <div class="form-group">
                    <label for="formula_quimica">Formula Química:</label>
                    <input type="text" class="form-control" name="formula_quimica" required>
                </div>
                <div class="form-group">
                    <label for="palabra_seguridad">Palabra de seguridad:</label>
                    <?php
                    include_once("db.php");
                    $sql = "SELECT * FROM palabra_seguridad ORDER BY id_palabra ASC";
                    $conectar = conn(); //crear la conexión a la b.d.
                    $result = mysqli_query($conectar, $sql) or trigger_error("Error:", mysqli_error($conectar));
                    ?>
                    <select class="form-control" name="palabra_seguridad" required>
                        <option selected>Palabra</option>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_palabra'] . '">' . $row['palabra'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numCAS">Número CAS:</label>
                    <input type="number" class="form-control" name="numCAS" required>
                </div>
                <div class="form-group">
                    <label for="insumo_fk">Insumo asociado:</label>
                    <?php
                    echo '<input class="form-control" type="number" value="' . $id_insumo . '" placeholder="' . $id_insumo . '" disabled>'; ?>
                    <input type="hidden" name="insumo_fk" value="<?php echo $id_insumo; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        <?php
        } else {
            //En caso de que el tipo de insumo sea implemento
            //id_implemento, guia_uso_lab, insumo_fk
        ?>
            <form action="validar_reg_implemento.php" method="POST">
                <div class="form-group">
                    <label for="id_implemento">Id. implemento:</label>
                    <input type="number" class="form-control" name="id_implemento" required>
                </div>
                <div class="form-group">
                    <label for="guia_uso">Instrucciones de uso:</label>
                    <input type="text" class="form-control" name="guia_uso" required>
                </div>
                <div class="form-group">
                    <label for="insumo">Insumo asociado:</label>
                    <?php
                    echo '<input class="form-control" type="number" value="' . $id_insumo . '" placeholder="' . $id_insumo . '" disabled>'; ?>
                    <input type="hidden" name="insumoI_fk" value="<?php echo $id_insumo; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        <?php
        }
        $conectar->close();
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>