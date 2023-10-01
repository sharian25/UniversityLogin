// Obtén referencias a los elementos del DOM
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modal = document.getElementById('myModal');

// Agrega un evento click para abrir el modal
openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
});

// Agrega un evento click para cerrar el modal
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Cierra el modal si se hace clic fuera de él
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
