/*
 * Display vehicules from DB  
 */

//Display data in frontend
document.addEventListener('DOMContentLoaded', () => {
    //Make a get request 
    fetch('http://localhost:4000/api/vehicles')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener los datos de vehículos.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos de vehículos obtenidos:', data);
            displayVehicles(data);
        })
        .catch(error => {
            console.error('Error al obtener los datos de vehículos:', error);
        });
});

//Displayy data from DB in the frontend list
function displayVehicles(vehicles) {
    const vehicleList = document.getElementById('vehicle-list');
    vehicles.forEach(vehicle => {
        const listItem = document.createElement('li');
        listItem.textContent = `ID: ${vehicle.id_vehiculo}, Brand: ${vehicle.marca}, Model: ${vehicle.modelo}, Year: ${vehicle.año}, Price: ${vehicle.precio}`;
        vehicleList.appendChild(listItem);
    });
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
    let vehicleBrand = document.getElementById("brand").value;
    let vehicleModel = document.getElementById("model").value;
    let vehicleYear = document.getElementById("year").value;
    let vehiclePrice = document.getElementById("price").value;

    //Create a vector with the values and store it in a variable
    let vehicle = {
        brand: vehicleBrand,
        model: vehicleModel,
        year: vehicleYear,
        price: vehiclePrice
    };

    //Send the values to api
    fetch('http://localhost:4000/api/vehicles', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(vehicle)
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
const formUpdate = document.getElementById("updateVehicle");

//Add an listener for the button
formUpdate.addEventListener("submit", (event) => {
    event.preventDefault();
    
    //Get the values by them ids
    let id = document.getElementById("id").value;
    let fieldToModify = document.getElementById("field").value;
    let newValue = document.getElementById("value").value;

    //Send the values to api
    fetch(`http://localhost:4000/api/vehicles/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            field: fieldToModify,
            value: newValue
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
 * Delete vehicle from DB  
 */

//Make DELETE request 
const formDelete = document.getElementById("deleteVehicle");

//Add an listener for the button
formDelete.addEventListener("submit", (event) => {
    event.preventDefault();
    
    //Get the values by them ids
    let id = document.getElementById("id").value;

    fetch(`http://localhost:4000/api/vehicles/${id}`, {
        method: 'DELETE'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al eliminar el vehículo');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Imprime el mensaje de éxito
        alert("Vehículo eliminado exitosamente");
    })
    .catch(error => {
        console.error('Error al eliminar el vehículo:', error);
        alert("Error al eliminar el vehículo");
    });

});

