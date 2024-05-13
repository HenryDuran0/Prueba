<?php
    // Verificar si se ha enviado el formulario
    if(isset($_POST['enviar'])) {
        // Obtener el correo electrónico del formulario
        $email = $_POST["correo"];

        // Verificar que el correo electrónico no esté vacío
        if(!empty($email)) {
            // Incluir el archivo de conexión
            require "conexion.php";

            // Obtener las contraseñas del formulario
            $pswd1 = $_POST['pswd1'];
            $pswd2 = $_POST['pswd2'];

            // Verificar que las contraseñas coincidan
            if($pswd1 == $pswd2) {
                // Actualizar la contraseña en la base de datos
                $editar = "UPDATE usuario SET pswd = '$pswd1' WHERE usuario = '$email'";
                $query = mysqli_query($conectar, $editar);
                        
                if($query) {
                    echo '
                    <script>  
                        alert("Contraseña reestablecida exitosamente");
                        location.href = "index.php";
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                        alert("Error al intentar reestablecer contraseña");
                    </script>
                    ';
                }
            } else {
                echo '
                <script>
                    alert("Las contraseñas tienen que coincidir"); 
                </script>
                ';
            }
        } else {
            echo '
            <script>
                alert("No se proporcionó un correo electrónico");
            </script>
            ';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reestablecer Contraseña</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>

    <br><br><br><br><br>

    <div class="cont_codigo">
        <form name="form_pswd" method="post" class="formu_codigo">
            <label for="pswd1">Nueva contraseña:</label>
            <input type="text" id="pswd1" name="pswd1">
            <br><br>
            <label for="pswd2">Confirme su contraseña:</label>
            <input type="text" id="pswd2" name="pswd2">
            <br><br>
            <input type="hidden" name="correo" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </div>
</body>
</html>
