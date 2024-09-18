<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos - SGI LAB MANAGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        th,
        td {
            vertical-align: middle !important;
        }
    </style>
</head>

<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand active" href="principal.php">LAB MANAGER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="insumos.php">INSUMOS</a><!--Estamos en esta ventana-->
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
    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <?php
            include_once("db.php");
            $sql = "SELECT acceso.user, roles.nombre_rol, permisos.nombre_permiso FROM
            acceso
            JOIN roles ON acceso.roles_fk=roles.id_rol
            JOIN permiso_rol ON roles.id_rol = permiso_rol.rol_fk
            JOIN permisos ON permisos.id_permisos = permiso_rol.permiso_fk";
            ?>
            <h1 class="display-4">Bienvenido al SIG LAB MANAGER</h1>
            <p class="lead">Estamos trabajando en este proyecto, actualmente puedes testear el apartado "Buscar Insumo"
                donde encontrarás una tabla con todos los insumos y podrás buscar uno específico.</p>
            <hr class="my-4">
            <p class="mb-0">¡Explora y disfruta de las funcionalidades del sistema!</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>