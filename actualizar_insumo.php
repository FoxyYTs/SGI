<?php
include_once("db.php");

// Verificar si se ha recibido el ID del insumo en la URL
if (isset($_GET['id_insumo'])) {
    $id_insumo = $_GET['id_insumo'];

    // Conectar a la base de datos
    $conectar = conn();

    // Obtener los datos actuales del insumo
    $sql = "SELECT * FROM insumo WHERE id_insumo = ?";
    $stmt = $conectar->prepare($sql);
    $stmt->bind_param("i", $id_insumo);
    $stmt->execute();
    $result = $stmt->get_result();
    $insumo = $result->fetch_assoc();

    // Verificar si se ha recibido el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $foto = $_POST["foto"];
        $stock = $_POST["stock"];
        $ubicacion = $_POST["ubicacion"];
        $medida = $_POST["und_medida"];

        // Preparar la sentencia SQL para actualizar el insumo
        $sql_update = "UPDATE insumo SET foto = ?, stock_insumo = ?, ubicacion_fk = ?, und_medida_fk = ? WHERE id_insumo = ?";
        $stmt_update = $conectar->prepare($sql_update);
        $stmt_update->bind_param("sisii", $foto, $stock, $ubicacion, $medida, $id_insumo);

        // Ejecutar la sentencia SQL
        if ($stmt_update->execute()) {
            echo '<script>alert("Insumo actualizado correctamente"); window.location.href = "insumos.php";</script>';
        } else {
            echo '<script>alert("Error al actualizar insumo: ' . $stmt_update->error . '");</script>';
        }
        $stmt_update->close();
    }
    $stmt->close();
    $conectar->close();
} else {
    echo '<script>alert("No se ha recibido un ID de insumo válido"); window.location.href = "insumos.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Insumo - SGI LAB MANAGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="principal.html">LAB MANAGER</a>
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

    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar Insumo</h1>
        <form action="actualizar_insumo.php?id_insumo=<?php echo $id_insumo; ?>" method="POST">
            <div class="form-group">
                <label for="foto">Enlace a foto de insumo:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <input type="text" class="form-control" name="foto" value="<?php echo $insumo['foto']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                    </div>
                    <input type="number" class="form-control" name="stock" value="<?php echo $insumo['stock_insumo']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <select class="form-control" name="ubicacion" required>
                        <option selected>Seleccione una ubicación</option>
                        <?php
                        $conectar = conn(); // Crear la conexión a la b.d.
                        $sql_ubicacion = "SELECT id_ubicacion FROM ubicacion ORDER BY id_ubicacion ASC";
                        $result_ubicacion = mysqli_query($conectar, $sql_ubicacion) or trigger_error("Error:", mysqli_error($conectar));
                        while ($row = mysqli_fetch_array($result_ubicacion)) {
                            $selected = ($row['id_ubicacion'] == $insumo['ubicacion_fk']) ? 'selected' : '';
                            echo "<option value='" . $row['id_ubicacion'] . "' $selected>" . $row['id_ubicacion'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="und_medida">Unidad de medida:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                    </div>
                    <select class="form-control" name="und_medida" required>
                        <option selected>Seleccione una unidad de medida</option>
                        <?php
                        $sql_medida = "SELECT * FROM unidad_medida ORDER BY id_medida ASC";
                        $result_medida = mysqli_query($conectar, $sql_medida) or trigger_error("Error:", mysqli_error($conectar));
                        while ($row = mysqli_fetch_array($result_medida)) {
                            $selected = ($row['id_medida'] == $insumo['und_medida_fk']) ? 'selected' : '';
                            echo "<option value='" . $row['id_medida'] . "' $selected>" . $row['nombre_medida'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>