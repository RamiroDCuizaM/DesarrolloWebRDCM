function cargarContenido(abrir) {

    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
    
}

function crear()
{
    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    var datos=new FormData(document.querySelector('#form-insertar'));
    ajax.open("post", "create.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send(datos);
}

function formEditar(id) {
    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("GET", `formeditar.php?id=${id}`, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send();

}

function editar()
{
    var ajax = new XMLHttpRequest();
    var datos=new FormData(document.querySelector('#form-editar'));
    ajax.open("POST", "edit.php", true)
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send(datos);
}
function eliminar(id) { 
    if (dialog("Estas seguro que quieres eliminar")) {
        ajax.open("GET", `delete.php?id=${id}`, true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.querySelector('#contenido').innerHTML = ajax.responseText;
            }
        }
        ajax.send();
    
    }
}

function mostrarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#men').innerHTML = ajax.responseText;
            document.querySelector('#men').style.display = 'block';  // Mostrar el contenedor después de cargar
        }
    }
    ajax.send();
}


function cargarGaleria() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('princip').innerHTML = data;
        });
}

function cargarFormulario() {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', 'formulario.html', true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('princip').innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}


function mostrarBotones() {
    const botonesHTML = `
        <div class="botones-grid">
            <button onclick="mostrarContenido('Contenido del botón 1')">1</button>
            <button onclick="cargarGaleria()">2</button>

            <button onclick="cargarFormulario()">3</button>

            <button onclick="mostrarContenido('Contenido del botón 4')">4</button>
            <button onclick="mostrarContenido('Contenido del botón 5')">5</button>
        </div>
    `;
    const menDiv = document.getElementById('men');
    menDiv.innerHTML = botonesHTML;
    menDiv.style.display = 'block'; 
    mostrarMensaje();
}


function mostrarContenido(texto) {
    document.getElementById('princip').innerText = texto;
}


function mostrarMensaje() {
    const mensaje = "Ramiro David Cuiza Muraña - 35-5325";
    document.getElementById('mensaj').innerText = mensaje;
}