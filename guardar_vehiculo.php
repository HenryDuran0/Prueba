<?php

require "conexion.php";

$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$año = $_POST["año"];
$precio = $_POST["precio"];

$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImg = $_FILES['imagen']['name'];
$tipoImg = $_FILES['imagen']['type'];

$rutaEnServidor = 'fotos';

date_default_timezone_set('UTC');
$nombreImgFecha = date('Y-m-d').'-'.$nombreImg;

$rutaDestino = $rutaEnServidor.'/'.$nombreImgFecha;

if($tipoImg == "image/jpeg" or $tipoImg == "image/png" or $tipoImg == "image/webp" or $tipoImg == "image/jpg" or $tipoImg == "image/svg" or $tipoImg == "") {
  move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
  echo "
  <script>
    alert('Extensión de archivo no permitada');
    window.history.go(-1);
  </script>
  ";
  exit;
}

//Validar peso de foto
$pesoImg = $_FILES['img']['size'];
if($pesoImg > 999000) {
  echo "
  <script>
    alert('Foto demasiado pesada');
    window.history.go(-1);
  </script>
  ";
  exit;
}

$insertar = "INSERT INTO vehiculo (marca, modelo, año, precio, imagen) VALUES ('$marca', '$modelo', '$año', '$precio', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query){
  echo "
  <script>
    alert( 'Datos guardados exitosamente' );
    location.href= 'vehiculos.php'
  </script>
  ";
} else{
  echo "Error al intentar guardar el vehiculo";
}

