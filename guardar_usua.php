<?php

require "conexion.php";

$nombre = $_POST["nombre"];
$pswd = $_POST["pswd"];

$insertar = "INSERT INTO usuario (usuario, pswd) VALUES ('$nombre', '$pswd')";

$query = mysqli_query($conectar, $insertar);

if ($query){
  echo "
  <script>
    alert( 'Datos guardados exitosamente' );
    location.href= 'usuarios.php'
  </script>
  ";
} else{
  echo "Error al intentar guardar el usuario";
}

