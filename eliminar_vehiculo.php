<?php
include("seguridad.php");
require "conexion.php";

$id = $_GET["id"];
//echo $id;

$eliminar = "DELETE FROM vehiculo WHERE id_vehiculo = $id";

$query = mysqli_query($conectar, $eliminar);

if ($query){
  echo "
  <script>
  alert( 'Vehiculo eliminado de la base de datos' );
  location.href= 'vehiculos.php'
  </script>
  ";
}
else{
  echo "Error al intentar eliminar vehiculo";
}