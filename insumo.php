<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - SGI LAB MANAGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

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

        .container {
            margin-top: 50px;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-responsive {
            margin-top: 20px;
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

        footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #007bff;
            color: white;
            text-align: center;
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
                    <a class="nav-link" href="registro_insumo.php">REGISTRO INSUMO</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0"><i class="fas fa-search"></i> Buscar Insumo</h4>
                    </div>
                    <div class="card-body">
                        <form action="insumo.php" method="post">
                            <div class="form-group">
                                <label for="id_insumo"><i class="fas fa-barcode"></i> Código de Insumo:</label>
                                <input type="text" class="form-control" placeholder="Ingrese el código de insumo" name="id_insumo" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo_insumo"><i class="fas fa-list"></i> Tipo de Insumo:</label>
                                <select class="form-control" name="tipo_insumo" required>
                                    <option value="" selected disabled>Seleccione el tipo de insumo</option>
                                    <option value="0">SUSTANCIA</option>
                                    <option value="1">IMPLEMENTO</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-search"></i>
                                Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mostrar insumo específico-->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" or isset($_GET['id_insumo'])) {
        include_once("db.php");
        $id_insumo = isset($_GET['id_insumo']) ? $_GET['id_insumo'] : $_POST['id_insumo'];
        $tipo_insumo = isset($_GET['tipo_insumo']) ? $_GET['tipo_insumo'] : $_POST['tipo_insumo'];
        //$insumo = $_POST['id_insumo'];
        //$tipo = $_POST['tipo_insumo'];

        $conectar = conn(); // Conexión a la base de datos

        if ($tipo_insumo == "0" or $tipo_insumo == "SUSTANCIA" or $tipo_insumo == "sustancia") {
            $sql = "SELECT insumo.*, UPPER(insumo.tipo_insumo) AS tipo_insumo, 
                    sustancia.id_sustancia, sustancia.ficha_seguridad, 
                    sustancia.tel_emergencia, sustancia.formula_quimica, 
                    sustancia.numCAS, palabra_seguridad.palabra, unidad_medida.nombre_medida 
                    FROM insumo
                    JOIN unidad_medida ON unidad_medida.id_medida = insumo.und_medida_fk
                    JOIN sustancia ON sustancia.insumo_fk = insumo.id_insumo
                    JOIN palabra_seguridad ON palabra_seguridad.id_palabra = sustancia.palabra_seguridad_fk
                    WHERE insumo.id_insumo = '$id_insumo'";
        } elseif ($tipo_insumo == "1" or $tipo_insumo == "IMPLEMENTO" or $tipo_insumo == "implemento") {
            $sql = "SELECT insumo.*, UPPER(insumo.tipo_insumo) AS tipo_insumo, 
                    implemento.id_implemento, implemento.guia_uso_lab, 
                    unidad_medida.nombre_medida 
                    FROM insumo
                    JOIN unidad_medida ON unidad_medida.id_medida = insumo.und_medida_fk
                    JOIN implemento ON implemento.insumoI_fk = insumo.id_insumo
                    WHERE insumo.id_insumo = '$id_insumo'";
        } else {
            echo "<div class='container mt-4'><div class='alert alert-danger' role='alert'>El tipo proporcionado no existe.</div></div>";
            exit;
        }

        $result = mysqli_query($conectar, $sql) or trigger_error("Error: ", mysqli_error($conectar));

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="container mt-4"><div class="card text-center">';
                echo '<div class="card-header"><h4 class="card-title">' . $row['nombre_insumo'] . '</h4></div>';
                echo '<div class="row g-0">';
                echo '<div class="col-md-4"><img src="' . $row['foto'] . '" class="img-fluid rounded-start" alt="Foto ' . $row['nombre_insumo'] . '"></div>';
                echo '<div class="col-md-8"><div class="card-body"><ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"><h6>Insumo: </h6>' . $row['id_insumo'] . '</li>';
                echo '<li class="list-group-item"><h6>Tipo: </h6>' . $row['tipo_insumo'] . '</li>';
                echo '<li class="list-group-item"><h6>Stock: </h6>' . $row['stock_insumo'] . '</li>';
                echo '<li class="list-group-item"><h6>Ubicación: </h6>' . $row['ubicacion_fk'] . '</li>';
                echo '<li class="list-group-item"><h6>Unidad de medida: </h6>' . $row['nombre_medida'] . '</li>';
                if ($tipo_insumo == "0" or $tipo_insumo == "SUSTANCIA" or $tipo_insumo == "sustancia") {
                    echo '<li class="list-group-item"><h6>Sustancia activa: </h6>' . $row['id_sustancia'] . '</li>';
                    echo '<li class="list-group-item"><h6>Emergencia: </h6>' . $row['tel_emergencia'] . '</li>';
                    echo '<li class="list-group-item"><h6>Formula: </h6>' . $row['formula_quimica'] . '</li>';
                    echo '<li class="list-group-item"><h6>CAS: </h6>' . $row['numCAS'] . '</li>';
                    echo '<li class="list-group-item"><h6>Palabra de seguridad: </h6>' . $row['palabra'] . '</li>';
                    echo '<li class="list-group-item"><a href="' . $row['ficha_seguridad'] . '" class="card-link">Ficha de seguridad</a></li>';
                } else {
                    echo '<li class="list-group-item"><h6>Implemento: </h6>' . $row['id_implemento'] . '</li>';
                    echo '<li class="list-group-item"><h6>Guia de uso: </h6><p>' . $row['guia_uso_lab'] . '</p></li>';
                }
                echo '</ul></div></div></div></div></div>';
            }
        } else {
            echo "<div class='container mt-4'><div class='alert alert-warning' role='alert'>No se encontraron resultados para el insumo proporcionado.</div></div>";
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>