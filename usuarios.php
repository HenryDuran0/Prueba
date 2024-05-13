<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
    <br><br><br><br><br><br>
    
    <div class="cont5">
        <table class="tab_serv">
            <tr class="tab_header">
                <th>ID</th>
                <th>Usuario</th>
                <th>Eliminar</th>
            </tr>

            <?php
                require "conexion.php";
                $todos_datos = "SELECT * FROM usuario ORDER BY id_usuario ASC";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)){
            ?>
                <tr class="table_rows">
                    <td><?php echo $fila{"id_usuario"} ?></td>
                    <td><?php echo $fila{"usuario"} ?></td>
                    <td class="tabla_elim">
                        <a href="#" onclick="validar('eliminar_usua.php?id=<?php echo $fila['id_usuario']; ?>')">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    <br><br><br><br><br><br>

    <div class="cont_ag_us">
        <h2>Nuevo usuario</h2>
        <br><br><br>
        <form action="guardar_usua.php" method="post" class="form_usua">
            <label for="nombre">Nombre*:</label>
            <input type="text" id="nombre" name="nombre">
            <br><br>

            <label for="pswd">Contraseña*:</label>
            <input type="password" id="pswd" name="pswd">
            <br><br>

            <button type="submit">Agregar</button>
        </form>
    </div>
    <br><br><br><br><br><br>

    <?php 
        include("footer.php");
    ?>

    <script>
        function validar(url) {
            var eliminar = confirm("Se eliminará el usuario")
            if(eliminar == true) {
                window.location = url;
            }
        }
    </script>

</body>
</html>