<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administrativo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        include("seguridad.php");
        include("header.php");
    ?>

<div class="cont2">
    <a href="panel.php">INICIO</a>
    <a href="vehiculos.php">VEHICULOS</a>
    <a href="usuarios.php">USUARIOS</a>
    <a href="salir.php">CERRAR SESIÓN</a>
</div>

    <div class="div_titulo">
        <h2>Bienvenido</h2>
    </div>


</body>
</html>