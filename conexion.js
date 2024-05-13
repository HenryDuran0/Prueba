let mysql = require("mysql");

let conexion = mysql.createConnection({
    host: "localhost",
    port: "3307",
    database: "concesionaria",
    user: "root",
    password: ""
});

conexion.connect(function(err) {
    if (err) {
        throw err;
    } else {
        console.log("Conexión exitosa");
    }
});

module.exports = conexion;
