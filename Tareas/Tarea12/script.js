let currentPage = 1;
let currentSearch = "";
let currentOrder = "personas.id";
let currentAsc = "asc";


const modal = document.getElementById("myModal");
const modalTitle = document.getElementById("titulo-modal");
const modalContent = document.getElementById("contenido-modal");
const closeModal = () => modal.style.display = "none";


document.querySelector('.close').onclick = closeModal;
window.onclick = (e) => e.target == modal && closeModal();


document.addEventListener('DOMContentLoaded', () => {
    cargarPagina(currentPage, currentSearch, currentOrder, currentAsc);
});


async function crearPersona() {
    const form = document.querySelector("#form-crear");
    const formData = new FormData(form);

    try {
        const response = await fetch("create.php", {
            method: "POST",
            body: formData
        });
        const result = await response.json();

        if (result.success) {
            mostrarMensaje("Éxito", result.message);
            closeModal();
            cargarPagina(currentPage, currentSearch, currentOrder, currentAsc);
        } else {
            mostrarMensaje("Error", result.error);
        }
    } catch (error) {
        mostrarMensaje("Error", "Error de conexión");
    }
}


async function cargarPagina(pagina, buscar = "", orden = "personas.id", ascendente = "asc") {
    currentPage = pagina;
    currentSearch = buscar;
    currentOrder = orden;
    currentAsc = ascendente;

    const url = `read.php?pagina=${pagina}&buscar=${buscar}&orden=${orden}&asendente=${ascendente}`;
    
    try {
        const response = await fetch(url);
        const data = await response.json();
        document.getElementById("contenido").innerHTML = renderizarTablaRead(data);
    } catch (error) {
        console.error("Error:", error);
    }
}


async function editar(id) {
    try {
        const response = await fetch(`formeditar.php?id=${id}`);
        const html = await response.text();
        
        modalTitle.innerHTML = "Editar Persona";
        modalContent.innerHTML = html;
        modal.style.display = "block";
    } catch (error) {
        console.error("Error:", error);
    }
}

async function guardarEditar() {
    const form = document.querySelector("#form-edit");
    const formData = new FormData(form);

    try {
        const response = await fetch("edit.php", {
            method: "POST",
            body: formData
        });
        const result = await response.json();

        if (result.success) {
            mostrarMensaje("Éxito", result.message);
            closeModal();
            cargarPagina(currentPage, currentSearch, currentOrder, currentAsc);
        } else {
            mostrarMensaje("Error", result.error);
        }
    } catch (error) {
        mostrarMensaje("Error", "Error de conexión");
    }
}


async function eliminar(id) {
    if (!confirm("¿Eliminar este registro permanentemente?")) return;

    try {
        const response = await fetch(`delete.php?id=${id}`);
        const result = await response.json();

        if (result.success) {
            mostrarMensaje("Éxito", result.message);
            cargarPagina(currentPage, currentSearch, currentOrder, currentAsc);
        } else {
            mostrarMensaje("Error", result.error);
        }
    } catch (error) {
        mostrarMensaje("Error", "Error de conexión");
    }
}



function mostrarMensaje(titulo, mensaje) {
    modalTitle.innerHTML = titulo;
    modalContent.innerHTML = `<p>${mensaje}</p>`;
    modal.style.display = "block";
}

function abrirModalCrear() {
    fetch('forminsertar.php')
        .then(response => response.text())
        .then(html => {
            modalTitle.innerHTML = "Nueva Persona";
            modalContent.innerHTML = html;
            modal.style.display = "block";
        });
}

