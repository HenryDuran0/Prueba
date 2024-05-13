<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        include("header.php");
        include("buttons.php");
    ?>

    <div class="div_titulo">
        <h2>Cerrajeria MasterKey</h2>
        <h3>40 años de experiencia nos respaldan</h3>
    </div>

    <div class="cont7">
        <div class="div_img1">
            <img src="Images/cerrajero_1.jpg" alt="">
            <h2>Servicios de alta calidad</h2>
            <h3>Especializados en múltiples servicios, MasterKey le ofrece lo impensable.</h3>
        </div>

        <div class="div_img2">
            <img src="Images/cerrajero_2.jpg" alt="">
            <h2>Personal preparado</h2>
            <h3>En MasterKey, preparamos a cada uno de nuestros trabajadores para realizar un trabajo impecable, sin dañar su patrimonio.</h3>
        </div>

        <div class="div_img3">
            <img src="Images/cerrajero_3.png" alt="">
            <h2>¿Tiene una empresa?</h2>
            <h3>Le ofrecemos los más avanzados sitemas de seguridad a nivel industrial para su empresa.</h3>
        </div>
    </div>

    <div class="encuentranos">
        <div class="enc_div_izq">
            <h2 class="tit_left">Encuentranos en nuestra sucursal</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21067.016194038926!2d-89.65430028252742!3d21.026383033207956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56744214482f11%3A0x5f1591d8d97b1ab9!2sCERRAJERIA%20BETHEL%20PLUS!5e0!3m2!1ses!2smx!4v1702065843871!5m2!1ses!2smx" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map_left"></iframe>
        </div>

        <div class="enc_div_der">
            <h2 class="tit_right">Te explicamos más sobre nosotros</h2>
            <iframe width="800" height="400" src="https://www.youtube.com/embed/Okudc3XploY?si=YEvXSdh3m5loXLX0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="vid_right"></iframe>
        </div>
        
    </div>
    <br><br><br><br><br><br>

    <?php
        include("footer.php");
    ?>
</body>
</html>