// // Variables globales necesarias
// const contenido = document.getElementById("contenido");
// const resultsTable = document.getElementById("resultsTable");
// const mes = document.getElementById("mes");
// const anio = document.getElementById("anio");
// const result = document.getElementById("result");

// // Ejercicio 1
// async function ejercicio1() {
//   try {
//     const response = await fetch("cambiaratributos.html");
//     const html = await response.text();
//     contenido.innerHTML = html;

//     const apply = document.getElementById("apply");
//     const width = document.getElementById("width");
//     const height = document.getElementById("height");
//     const color = document.getElementById("color");
//     const element = document.getElementById("element");

//     apply.addEventListener("click", () => {
//       const selectedElement = document.getElementById(element.value);
//       selectedElement.style.width = `${width.value}px`;
//       selectedElement.style.height = `${height.value}px`;
//       selectedElement.style.backgroundColor = color.value;
//     });
//   } catch (error) {
//     console.error("Error cargando cambiaratributos.html:", error);
//   }
// }

// // Ejercicio 2
// async function ejercicio2() {
//   try {
//     const response = await fetch("tabla.html");
//     const data = await response.text();
//     contenido.innerHTML = data;

//     const tabla = document.getElementById("tabla");
//     tabla.addEventListener("click", async () => {
//       const results = await getCalc();
//       generateTable(results);
//     });
//   } catch (error) {
//     console.error("Error cargando tabla.html:", error);
//   }
// }

// async function getCalc() {
//   const form = document.querySelector("form");
//   const data = new FormData(form);

//   const response = await fetch("calcular.php", {
//     method: "POST",
//     body: data,
//   });

//   return await response.json();
// }

// function generateTable(results) {
//   resultsTable.innerHTML = ""; // Limpia tabla antes de insertar nuevos datos
//   results.forEach((element) => {
//     resultsTable.innerHTML += `
//       <tr>
//         <td>${element["num1"]}</td>
//         <td>${element["symbol"]}</td>
//         <td>${element["num2"]}</td>
//         <td>${element["equal"]}</td>
//         <td>${element["result"]}</td>
//       </tr>`;
//   });
//   resultsTable.style.display = "block";
// }

// // Ejercicio 3
// async function ejercicio3() {
//   try {
//     const response = await fetch("seleccionar.html");
//     const html = await response.text();
//     contenido.innerHTML = html;
//   } catch (error) {
//     console.error("Error cargando seleccionar.html:", error);
//   }
// }

// // Obtener calendario
// async function getCalendar() {
//   const mesValue = mes.value;
//   const anioValue = anio.value;

//   try {
//     const response = await fetch(`calendario.php?mes=${mesValue}&anio=${anioValue}`);
//     const html = await response.text();
//     result.innerHTML = html;
//   } catch (error) {
//     console.error("Error cargando calendario:", error);
//   }
// }

// Ejercicio 4 - Búsqueda de libros
async function search() {
  var contenedor;
  contenedor = document.querySelector(".results-grid");
  var searchbar = document.getElementById("searchbar");
  var prompt = searchbar.value;

  fetch("search.php?prompt=" + prompt)
    .then((response) => response.json())
    .then((data) => {
      contenedor.innerHTML = "";
      data.forEach((result) => {
        contenedor.innerHTML += `<button onclick="modalLibro(${result.id})">
          <img src="images/${result.imagen}" alt="${result.titulo}">
          <h2>${result.titulo}</h2>
      </button>`;
      });
    });
}



var modal = document.getElementById("myModal");
var openModalBtn = document.getElementById("openModalBtn");
var closeBtn = document.getElementsByClassName("close")[0];

mostrar = function () {
    modal.style.display = "block";
};

closeBtn.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

function modalLibro(id) {
    fetch(`libro.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            const contenedor = document.getElementById("contenido-modal");
            document.getElementById("titulo-modal").textContent = data.titulo;
            document.querySelector(".close").textContent = "x";
            mostrar();
            
            contenedor.innerHTML = `
                <img src="images/${data.imagen}" alt="${data.titulo}">
                <p>Autor: ${data.autor}</p>
                <p>Año: ${data.anio}</p>
                <p>Editorial: ${data.editorial}</p>`;
        });
}
