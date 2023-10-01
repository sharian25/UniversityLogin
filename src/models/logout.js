/// Función para manejar la selección de opciones
function logout() {
    var seleccion = document.getElementById("logout").value;

    // Verificar la opción seleccionada
    if (seleccion === "logout") {
        // Realizar una solicitud al servidor para cerrar la sesión
        fetch('/src/models/logout.php', {
            method: 'POST',
            credentials: 'same-origin', // Incluye cookies en la solicitud si la URL es del mismo origen
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cerrar sesión');
            }
            return response.text();
        })
        .then(data => {
            // La sesión se cerró correctamente, redirigir al usuario a la página principal
            window.location.href = '/index.php'; // Cambia '/index.php' por la URL de tu página principal
        })
        .catch(error => {
            console.error(error);
            alert('Error al cerrar sesión');
        });
    } else {
        // Otras acciones según las demás opciones
        // Puedes agregar más casos según tus necesidades.
    }
}