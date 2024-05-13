<?php
include("seguridad.php");
require "conexion.php";

$id = $_GET["id"];
//echo $id;

$eliminar = "DELETE FROM usuario WHERE id_usuario = $id";

$query = mysqli_query($conectar, $eliminar);

if ($query){
  echo "
  <script>
  alert( 'Usuario eliminado de la BD' );
  location.href= 'usuarios.php'
  </script>
  ";
}
else{
  echo "TRONÓ";
}