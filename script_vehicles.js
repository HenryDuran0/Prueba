/*
 *  Display vehicles data from DB
 */


document.addEventListener('DOMContentLoaded', () => {
    // Realizar una solicitud GET para obtener los datos de la API
    fetch('http://localhost:4000/api/vehicles')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener los datos de vehículos.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos de vehículos obtenidos:', data);
            // Llamar a la función para desplegar los datos en la página HTML
            displayVehicles(data);
        })
        .catch(error => {
            console.error('Error al obtener los datos de vehículos:', error);
            // Aquí puedes manejar el error, por ejemplo, mostrando un mensaje de error al usuario.
        });
});

// Función para desplegar los datos de vehículos en la página HTML
function displayVehicles(vehicles) {
    const vehicleList = document.getElementById('vehicle-complete-list');
    vehicles.forEach(vehicle => {
        
        const listItem = document.createElement('li');
        listItem.innerHTML = `ID: ${vehicle.id_vehiculo}, Marca: ${vehicle.marca}, Modelo: ${vehicle.modelo}, Año: ${vehicle.año}, Precio: ${vehicle.precio}, Imagen: `; 
        
        // Crear elemento de imagen
        const img = document.createElement('img');
        img.src = vehicle.imagen; // Establecer la URL de la imagen
        img.style.maxWidth = '100px'; // Establecer un ancho máximo opcional

        // Agregar la imagen al listItem
        listItem.appendChild(img);

        // Crear botón de eliminar
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.addEventListener('click', () => {
            // Llamar a la función para eliminar el vehículo correspondiente
            deleteVehicle(vehicle.id_vehiculo);
        });
        
        // Agregar el botón de eliminar al listItem
        listItem.appendChild(deleteButton);

        // Agregar el listItem a la lista de vehículos
        vehicleList.appendChild(listItem);
    });
}

/*
 *  Delete vehicle from DB
 */

function deleteVehicle(vehicleId) {
    if (confirm('¿Estás seguro de que quieres eliminar este vehículo?')) {
        // Make a delete request to api
        fetch(`http://localhost:4000/api/vehicles/${vehicleId}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al eliminar el vehículo.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Vehículo eliminado:', data);
            // Aquí puedes actualizar la lista de vehículos en la página si lo deseas
        })
        .catch(error => {
            console.error('Error al eliminar el vehículo:', error);
            // Aquí puedes manejar el error, por ejemplo, mostrando un mensaje de error al usuario.
        });
    }
}

/*
 * Create new vehicle to DB 
 */

//Obtain form by its id
const formCreate = document.getElementById("saveVehicle");

//Add an listener for the button
formCreate.addEventListener("submit", (event) => {
    event.preventDefault();
    
    //Get the values by them ids
    let vehicleBrand = document.getElementById("marca").value;
    let vehicleModel = document.getElementById("modelo").value;
    let vehicleYear = document.getElementById("año").value;
    let vehiclePrice = document.getElementById("precio").value;
    let vehicleImage = document.getElementById("imagen").files[0];
    
    let formData = new FormData();
    formData.append('brand', vehicleBrand);
    formData.append('model', vehicleModel);
    formData.append('year', vehicleYear);
    formData.append('price', vehiclePrice);
    formData.append('image', vehicleImage);

    //Send the values to api
    fetch('http://localhost:4000/api/vehicles', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al guardar el vehículo.');
        }
        return response.json();
    })
    .then(data => {
        console.log('Vehículo guardado exitosamente:', data);
        alert("Vehículo guardado exitosamente");
    })
    .catch(error => {
        console.error('Error al guardar el vehículo:', error);
        alert("Error al guardar vehículo");
    });
});

/*
 * Update vehicle DB data   
 */

//Obtain form by its id
const formUpdate = document.getElementById("editVehicle");

//Add an listener for the button
formUpdate.addEventListener("submit", (event) => {
    event.preventDefault();
    
    //Get the values by them ids
    let id = document.getElementById("id").value;
    let field = document.getElementById("field").value;
    let value = document.getElementById("value").value;

    //Send the values to api
    fetch(`http://localhost:4000/api/vehicles/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            field: field,
            value: value
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al modificar el vehículo');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Imprime el mensaje de éxito
        alert("Vehículo modificado exitosamente");
    })
    .catch(error => {
        console.error('Error al modificar el vehículo:', error);
        alert("Error al modificar el vehículo");
    });
});

/*
 * Update vehicle image DB data   
 */

//Obtain form by its id
const formUpdateImage = document.getElementById("editVehicleImage");

//Add an listener for the button
formUpdateImage.addEventListener("submit", (event) => {
    event.preventDefault();
    
    //Get the values by them ids
    let id = document.getElementById("idImg").value;
    let image = document.getElementById("image").files[0];

    console.log("id: "+id);

    let formData = new FormData();
    formData.append('image', image);

    //Send the values to api
    fetch(`http://localhost:4000/api/vehiclesImg/${id}`, {
        method: 'PUT',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al modificar el vehículo');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Imprime el mensaje de éxito
        alert("Vehículo modificado exitosamente");
    })
    .catch(error => {
        console.error('Error al modificar el vehículo:', error);
        alert("Error al modificar el vehículo");
    });
});