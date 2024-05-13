<?php

include "phpmailer/PHPMailerAutoload.php";
include "header.php";

$email = $_POST['email'];
$codigo_generado = $_POST['codigo_generado'];

$mail = new PHPMailer;

$mail->isSMTP();       
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587;   
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'tls';  
$mail->Username = 'cerrajeriamasterkey12@gmail.com';   
$mail->Password = 'vkvn olyf xlbm gdhx';  

$mail->setFrom('cerrajeriamasterkey12@gmail.com',  'Cerrajeria MasterKey');
$mail->addAddress($email, 'user');     // Add a recipient
$mail->addReplyTo('cerrajeriamasterkey12@gmail.com', 'Concesionaria');

$mail->isHTML(true);   

$mail->Subject = 'Recuperacion de contraseña';
$mail->Body = '<b>Email: </b>'.$email.'<br><b>Codigo: </b>'.$codigo_generado.'<br><b>No comparta este código con nadie.</b>';

if(!$mail->send()) {
    echo '
      <script>
        alert("Correo invalido");
      </script>
    ';
    //echo 'Algo salio mal intentalo de nuevo.<br>';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo '
    <script>
      alert("Se ha enviado un código de verificación a su correo");
    </script>
  ';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>verificacion de codigo</title>
  <link rel="stylesheet" href="styles.css">
  <script>
    //Obtiene el valor del codigo
    var codigo_generado = "<?php echo $codigo_generado; ?>";
    var email = "<?php echo $email; ?>";

    function valida_codigo() {
      //Checa que no este vacio el campo
      if(document.form_codigo.codigo_ingresado.value.length == 0) {
        alert("Campo obligatorio vacio");
        document.form_codigo.codigo_ingresado.focus();
        return false;
      }

      //Compara el codigo de usuario con el generado
      if(codigo_generado != document.getElementById("codigo_ingresado").value) {
        alert("Código incorrecto");
        location.href="recuperar_pswd.php";
        return false;
      } else {
        document.getElementById("correo").value = email;
        document.form_rec_psw.submit();
      }
    }
  </script>
</head>
  <body>
    <br><br><br><br><br>

    <div class="cont_codigo">
      <form action="reestablecer_pswd.php" name="form_codigo" method="post" class="formu_codigo">
        
        <label for="codigo_generado">Código de verificación:</label>
        <input type="text" id="codigo_ingresado" name="codigo_ingresado">
        <input type="hidden" id="correo" name="correo">
        <br><br>

        <button onclick="valida_codigo()">Enviar</button>
      </form>
  </div>
</body>
</html>