<?php
require "conexion.php";


$usuario = addslashes($_POST['usuario']);
$pswd = addslashes($_POST['pswd']);

$comparar = "SELECT * FROM usuario WHERE usuario='$usuario' AND pswd='$pswd'";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {
  session_start();
  $_SESSION["autentificado"] = "SI";
  header("Location: panel.php");
} else {

  echo '
    <script> 
      alert("ERROR EN LA AUTENTIFICACION");
      location.href = "index.php?errorusuario=SI";
    </script>
   ';
}
mysqli_free_result($resultado);
mysqli_close($conectar);
