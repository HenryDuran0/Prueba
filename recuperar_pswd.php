<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript">
        var codigo_generado = 0;

        function valida_enviar() {
            //Checa que no esten vacio el campo
            if(document.form_rec_psw.email.value.length == 0) {
                alert("Campo obligatorio vacio");
                document.form_rec_psw.email.focus();
                return 0;
            }

            //Genera el codigo
            codigo_generado = Math.floor(1000 + Math.random() * 9000);

            //Asigna el codigo al campo vacio
            document.getElementById("codigo_generado").value = codigo_generado;

            //Envia formulario
            alert("codigo generado: " + codigo_generado);
            document.form_rec_psw.submit();
        }
    </script>

</head>
<body>
    <?php 
        include("header.php");
        include("buttons.php");
    ?>

    <div class="div_titulo">
        <h2>Recuperar contraseña</h2>
    </div>

    <div class="cont_rec_pswd">
        <form action="raw_enviar_mailer.php" name="form_rec_psw" method="post" class="formu_rec_pswd">
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <input type="hidden" id="codigo_generado" name="codigo_generado">
            <br><br>

            <button onclick="valida_enviar()">Enviar</button>
        </form>
    </div>

    <br><br><br><br><br>

    <?php 
        include("footer.php");
    ?>
</body>
</html>