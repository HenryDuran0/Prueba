<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionaria ???</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <?php
        include "header.php";
        include "buttons.php";
    ?>

    <div class="cont3">
        <img src="Images/slide.jpg" alt="" class="img_slide">
        <div class="img_text">
            <h1>Concesionaria ???</h1>
            <h2>Vehículos para todos</h2>
            <a href="citas.php">Carrito</a>
        </div>
    </div>

    <div class="cont4">
       <div class="div_txt_cont4">
            <h2>Contamos con el vehículo de tus sueños</h2>
            <br><br>
            <h3>¡No te quedes esperando! Estrena ya.</h3>
       </div>
    </div>
    
    <div class="cont5" id="vehicle-list"></div>
    <br><br><br><br><br><br>
    
    <?php
        include("footer.php");
    ?>
    
</body>
</html>