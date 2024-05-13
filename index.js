//Imports
const express = require('express');
const cors = require('cors');
const conexion = require('./conexion');

//Initialize app
const app = express();

//Use imports
app.use(express.json());
app.use(cors());

/*
 *  METHODS
 */

//Root of api
app.get('/', (req, res) => {
    res.send('API concesionaria');
})

//Visualize vehicules of DB
app.get('/api/vehicles', (req, res) => {
    conexion.query("SELECT * FROM vehiculo", (error, results) => {
        if (error) {
            console.error("Error al ejecutar la consulta:", error);
            res.status(500).json({ error: 'Error al obtener datos de la base de datos' });
            return;
        }
        res.send(results);
    });
})

//Visualize a specified vehicule by its id
app.get('/api/vehicles/:id', (req, res) => {
    conexion.query("SELECT * FROM vehiculo WHERE id_vehiculo = " + req.params.id, (error, results) => {
        if (error) {
            console.error("Error al ejecutar la consulta:", error);
            res.status(500).json({ error: 'Error al obtener datos de la base de datos' });
            return;
        }
        res.send(results); // Enviar los resultados como respuesta JSON al frontend
    });
})

//Create a new vehicle by using post method
app.post('/api/vehicles', (req, res) => {
    const { brand, model, year, price } = req.body;

    //Validates if theres any empty field
    if (!brand || !model || !year || !price) {
        return res.status(400).json({ error: 'Todos los campos son requeridos' });
    }

    //Use a query to create a vehicle in DB
    conexion.query("INSERT INTO vehiculo (marca, modelo, año, precio) VALUES (?, ?, ?, ?)", [brand, model, year, price], (error, result) => {
        if (error) {
            console.error("Error al insertar el vehículo:", error);
            return res.status(500).json({ error: 'Error al insertar el vehículo en la base de datos' });
        }

        res.status(201).json({ message: 'Vehículo añadido exitosamente' });
    });
});

//Update vehicle from DB
app.put('/api/vehicles/:id', (req, res) => {
    const id = req.params.id;
    const { field, value } = req.body;

    // Verificar si el ID proporcionado es un número válido
    if (isNaN(id)) {
        return res.status(400).json({ error: 'El ID debe ser un número válido' });
    }

    // Verificar si el campo y el valor fueron proporcionados en la solicitud
    if (!field || !value) {
        return res.status(400).json({ error: 'El campo y el valor son requeridos' });
    }

    // Verificar si el campo proporcionado es válido (deberías validar los campos permitidos)
    // Por ejemplo, podrías tener una lista de campos permitidos en tu base de datos y verificar si el campo proporcionado está en esa lista.

    // Modificar el campo especificado del vehículo en la base de datos
    conexion.query(`UPDATE vehiculo SET ${field} = ? WHERE id_vehiculo = ?`, [value, id], (error, result) => {
        if (error) {
            console.error("Error al modificar el vehículo:", error);
            return res.status(500).json({ error: 'Error al modificar el vehículo en la base de datos' });
        }

        // Verificar si se modificó algún registro
        if (result.affectedRows === 0) {
            return res.status(404).json({ error: 'El vehículo con el ID proporcionado no existe' });
        }

        res.status(200).json({ message: 'Vehículo modificado exitosamente' }); // Devolver un mensaje de éxito
    });
});

//Delete vehicle from DB
app.delete('/api/vehicles/:id', (req, res) => {
    const id = req.params.id;

    // Verificar si el ID proporcionado es un número válido
    if (isNaN(id)) {
        return res.status(400).json({ error: 'El ID debe ser un número válido' });
    }

    // Eliminar el vehículo de la base de datos
    conexion.query("DELETE FROM vehiculo WHERE id_vehiculo = ?", [id], (error, result) => {
        if (error) {
            console.error("Error al eliminar el vehículo:", error);
            return res.status(500).json({ error: 'Error al eliminar el vehículo de la base de datos' });
        }

        // Verificar si se eliminó algún registro
        if (result.affectedRows === 0) {
            return res.status(404).json({ error: 'El vehículo con el ID proporcionado no existe' });
        }

        res.status(200).json({ message: 'Vehículo eliminado exitosamente' }); // Devolver un mensaje de éxito
    });
});

//port config
const port = process.env.port || 4000;
app.listen(port, () => console.log(`Escuchando en el puerto ${port}...`));


/*
 *  Usuarios
 */

//Visualize vehicules of DB
app.get('/api/users', (req, res) => {
    conexion.query("SELECT id_usuario, usuario FROM usuario", (error, results) => {
        if (error) {
            console.error("Error al ejecutar la consulta:", error);
            res.status(500).json({ error: 'Error al obtener datos de la base de datos' });
            return;
        }
        res.send(results);
    });
})

//Visualize a specified vehicule by its id
app.get('/api/users/:id', (req, res) => {
    conexion.query("SELECT id_usuario, usuario FROM usuario WHERE id_usuario = " + req.params.id, (error, results) => {
        if (error) {
            console.error("Error al ejecutar la consulta:", error);
            res.status(500).json({ error: 'Error al obtener datos de la base de datos' });
            return;
        }
        res.send(results); // Enviar los resultados como respuesta JSON al frontend
    });
})

//Create a new vehicle by using post method
app.post('/api/users', (req, res) => {
    const { usuario, pswd } = req.body;

    //Validates if theres any empty field
    if (!usuario || !pswd) {
        return res.status(400).json({ error: 'Todos los campos son requeridos' });
    }

    //Use a query to create a vehicle in DB
    conexion.query("INSERT INTO usuario (usuario, pswd) VALUES (?, ?)", [usuario, pswd], (error, result) => {
        if (error) {
            console.error("Error al agregar usuario:", error);
            return res.status(500).json({ error: 'Error al agregar usuario en la base de datos' });
        }

        res.status(201).json({ message: 'Usuario añadido exitosamente' });
    });
});
