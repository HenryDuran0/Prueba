<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bod">
    <br><br><br><br><br><br>

    <div class="cont_login">
        <br>
        <h2>CONCESIONARIA ???</h2>
        <br>
        <hr>
        <br><br>
        <a href="index.php">Pantalla principal</a>
        <br><br>

        <form action="autentificar.php" method="post">
            <div class="cont_login_inps">
                <label for="usuario">USUARIO: </label>
                <input type="text" id="usuario" name="usuario">
                <br>

                <label for="pswd">CONTRASEÑA: </label>
                <input type="password" id="pswd" name="pswd"/>
                <br><br>

                <a href="recuperar_pswd.php">¿Olvidaste tu contraseña?</a>
                <br><br>
                <button type="submit">Iniciar sesión</button>
            </div>
        </form>

        
        
    </div>

    <div class="footer"></div>
</body>
</html>