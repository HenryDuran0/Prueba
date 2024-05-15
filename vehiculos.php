<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body class="bod">
    <?php
        include("seguridad.php");
        include("header.php");
    ?>

    <div class="cont2">
        <a href="panel.php">INICIO</a>
        <a href="vehiculos.php">VEHICULOS</a>
        <a href="usuarios.php">USUARIOS</a>
        <a href="salir.php">CERRAR SESIÓN</a>
    </div>
    <br><br><br><br><br><br>

    <div class="vehiculos_admin">
        <h1>Lista de Vehículos</h1>
        <ul id="vehicle-complete-list"></ul>    
    </div>

    <div class="nuevo_vehiculo">
        <h1>EDITAR VEHICULO</h1>
        <form class="form_vehiculo" id="editVehicle">
            
            <label for="id">ID:</label>
            <input id="id" name="id" type="text" maxlength="4">
            <br><br><br>

            <label for="field">Campo:</label>
            <select name="field" id="field">
                <option value="marca">Marca</option>
                <option value="modelo">Modelo</option>
                <option value="año">Año</option>
                <option value="precio">Precio</option>
                <option value="descripcion">Descripción</option>
            </select>
            <br><br><br>

            <label for="value">Valor:</label>
            <input id="value" name="value" type="text" maxlength="50">
            <br><br><br>
            
            <button class="btn_guard_vehiculo">EDITAR VEHICULO</button>
        </form>
    </div>
    <br><br><br><br><br><br>

    <div class="nuevo_vehiculo">
        <h1>REEMPLAZAR IMAGEN DE VEHICULO</h1>
        <form class="form_vehiculo" id="editVehicleImage">
            
            <label for="id">ID:</label>
            <input id="idImg" name="idImg" type="text" maxlength="4">
            <br><br><br>

            <label for="image">Imagen:</label>
            <input id="image" name="image" type="file">
            <br><br><br>
            
            <button class="btn_guard_vehiculo">REEMPLAZAR IMAGEN</button>
        </form>
    </div>
    <br><br><br><br><br><br>
    
    <div class="nuevo_vehiculo">
        <h1>NUEVO VEHICULO</h1>
        <form class="form_vehiculo" id="saveVehicle" enctype="multipart/form-data">
            
            <label for="marca">Marca:</label>
            <input id="marca" name="marca" type="text" maxlength="50">
            <br><br><br>

            <label for="modelo">Modelo:</label>
            <input id="modelo" name="modelo" type="text" maxlength="50">
            <br><br><br>

            <label for="año">Año: </label>
            <input id="año" name="año" type="text" maxlength="4" >
            <br><br><br>

            <label for="precio">Precio:</label>
            <input id="precio" name="precio" type="text" maxlength="10">
            <br><br><br>

            <label for="imagen">Foto:</label>
            <input type="file" id="imagen" name="imagen"
            class="file">
            <br><br><br><br><br><br>

            <button class="btn_guard_vehiculo">GUARDAR VEHICULO</button>
        </form>
    </div>
    <br><br><br><br><br><br>

    <script src="script_vehicles.js"></script>


    <?php 
        include("footer.php");
    ?>

    <script>
        function validar(url) {
            var eliminar = confirm("Se eliminará el vehiculo de la base de datos")
            if(eliminar == true) {
                window.location = url;
            }
        }
    </>

</body>
</html>