
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
        listItem.textContent = `ID: ${vehicle.id_vehiculo}, Marca: ${vehicle.marca}, Modelo: ${vehicle.modelo}, Año: ${vehicle.año}, Precio: ${vehicle.precio}, Imagen: `; 
        const img = createElement('img');
        img.src = vehicle.imagen;
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
    let vehicleBrand = document.getElementById("marca").value;
    let vehicleModel = document.getElementById("modelo").value;
    let vehicleYear = document.getElementById("año").value;
    let vehiclePrice = document.getElementById("precio").value;
    
    //Image
    let fileInput = document.getElementById("imagen");
    if (fileInput.files.length > 0) {
        // Obtiene el primer archivo seleccionado
        const file = fileInput.files[0];
        
        // Obtiene la extensión del archivo
        const fileName = file.name;
        const fileExtension = fileName.split('.').pop().toLowerCase();
    
        // Verifica si la extensión del archivo es válida
        if (['png', 'jpg', 'jpeg', 'webp', 'gif'].includes(fileExtension)) {
          // El archivo es una imagen válida
          console.log('El archivo seleccionado es una imagen:', fileName);
          var rutaDestino = 'fotos/' + new Date() + fileName;
        } else {
          console.log('El archivo seleccionado no es una imagen válida.');
        }
      } else {
        console.log('No se seleccionó ningún archivo.');
      }


    //Create a vector with the values and store it in a variable
    let vehicle = {
        brand: vehicleBrand,
        model: vehicleModel,
        year: vehicleYear,
        price: vehiclePrice,
        image: rutaDestino
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