function modal(id) {
    console.log("Entro")
    var contenido = document.getElementById('data');
    document.getElementById('myModal').style.display = 'block';
    fetch(`portada.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            contenido.innerHTML = (`<h1>${data[0].titulo}</h1>
                <img src="images/${data[0].imagen}" alt="">`);
        })
}

function cerrarModal() {
    document.getElementById('myModal').style.display = 'none';
}

function cargarContenido(abrir) {

    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
            agregarHistorial(n)
        }
    }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
    
}


function mostrarInicio() {
    document.getElementById("nombre").textContent = "Ramiro David Cuiza Muraña";
    document.getElementById("cu").textContent = "35-5325";
document.getElementById("fecha").textContent = "31/05/2025";
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "contador.php", true);
    ajax.onload = function () {
        if (ajax.status === 200) {
            document.getElementById("visitas").innerText = ajax.responseText;
        }
    };
    ajax.send();
}

function generarTabla() {
    const colores = [
        "#FF0000", "#00FF00", "#0000FF",
        "#FFA500", "#800080", "#FFC0CB",
        "#808080", "#00FFFF", "#00FF00"
    ];
    
    var contenido = document.getElementById("contenido");
    contenido.innerHTML = ``;

    const contenedorTabla = document.createElement('div');
    contenedorTabla.style.display = "flex";
    contenedorTabla.style.justifyContent = "center";
    contenedorTabla.style.marginTop = "20px";
    contenedorTabla.style.padding = "10px";
    
    const tabla = document.createElement('table');

    let fila;
    colores.forEach((color, index) => {
        if (index % 3 === 0) { 
            fila = document.createElement('tr');
            tabla.appendChild(fila);
        }
        const celda = document.createElement('td');
        celda.style.backgroundColor = color;
        celda.style.width = "100px";
        celda.style.height = "100px";
        celda.style.textAlign = "center";
        celda.style.border = "2px solid black";
        celda.dataset.color = color; 

         celda.addEventListener("click", function() {
            let seccion = document.getElementById(select.value);
            if (seccion) {
                seccion.style.backgroundColor = color;
            }
        });

        fila.appendChild(celda);
    });

    const select = document.createElement("select");
    select.id = "seccionSelect";

    const opciones = ["barra", "menu", "contenido", "historial"];
    opciones.forEach(opcion => {
    let option = document.createElement("option");
    option.value = opcion;
    option.textContent = opcion; 
    select.appendChild(option);
});

    contenedorTabla.appendChild(select);
    contenedorTabla.appendChild(tabla);
    contenido.appendChild(contenedorTabla);
}


function Historial(texto) {
    const historial = document.getElementById("historial");
    const p = document.createElement("p");
    p.textContent = texto;
    historial.appendChild(p);
}

let botonesMenu = document.getElementsByClassName('boton');

        function botones() {
            for (let i = 0; i < botonesMenu.length; i++) {
                botonesMenu[i].style.display = (botonesMenu[i].style.display == 'none') ? 'block' : 'none';
            }
        }