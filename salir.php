<?php

session_start();
session_destroy();
echo '
    <script> 
      alert("Se ha cerrado la sesión exitosamente");
      location.href = "index.php";
    </script>
   ';
