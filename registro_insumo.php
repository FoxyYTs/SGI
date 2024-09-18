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
                    <a class="nav-link active" href="registro_insumo.php">REGISTRO INSUMO</a><!--Estamos en esta ventana-->
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Registro de Insumo</h2>
        <form action="registro_por_tipo.php" method="POST">
            <div class="form-group">
                <label for="nombre_insumo">Nombre del Insumo:</label>
                <input type="text" class="form-control" name="nombre_insumo" required>
            </div>
            <div class="form-group">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <select class="form-control" name="tipo_insumo" required>
                    <option selected disabled>Seleccionar Tipo</option>
                    <option value="SUSTANCIA">SUSTANCIA</option>
                    <option value="IMPLEMENTO">IMPLEMENTO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Enlace a Foto del Insumo:</label>
                <input type="text" class="form-control" name="foto" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <select class="form-control" name="ubicacion" required>
                    <option selected disabled>Seleccionar Ubicación</option>
                    <?php
                    include_once("db.php");
                    $sql = "SELECT id_ubicacion FROM ubicacion ORDER BY id_ubicacion ASC";
                    $conectar = conn(); //crear la conexión a la b.d.
                    $result = mysqli_query($conectar, $sql) or trigger_error("Error:", mysqli_error($conectar));
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['id_ubicacion'] . "'>" . $row['id_ubicacion'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="und_medida">Unidad de Medida:</label>
                <select class="form-control" name="und_medida" required>
                    <option selected disabled>Seleccionar Unidad de Medida</option>
                    <?php
                    include_once("db.php");
                    $sql = "SELECT * FROM unidad_medida ORDER BY id_medida ASC";
                    $conectar = conn(); //crear la conexión a la b.d.
                    $result = mysqli_query($conectar, $sql) or trigger_error("Error:", mysqli_error($conectar));
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['id_medida'] . "'>" . $row['nombre_medida'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ficha_tecnica">Enlace a ficha técnica:</label>
                <input type="text" class="form-control" name="ficha_tecnica" required>
            </div>
            <button type="submit" class="btn btn-primary">Siguiente</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>