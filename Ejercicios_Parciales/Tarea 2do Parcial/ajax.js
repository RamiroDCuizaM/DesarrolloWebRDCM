let turno = 'X';
    document.getElementById('mensaje').textContent = "Turno " + turno;
    document.getElementById('1').style.backgroundColor='green';
    
    function marcar(id) {
      var marco = document.getElementById(id);
      if (marco.textContent == '') {
          marco.textContent = turno;
        turno = (turno == 'X') ? 'O' : 'X';
        document.getElementById('mensaje').textContent = "Turno " + turno;
      }else{
        alert("esa variable esta con contenido");
      }
    }


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

function calcular(){
        const numero = parseInt(document.getElementById('numero').value);
        const hasta = parseInt(document.getElementById('hasta').value);
        const resultado = document.getElementById('resultado');
        const operaciones = [];
        if (document.getElementById('suma').checked) operaciones.push('+');
        if (document.getElementById('resta').checked) operaciones.push('-');
        if (document.getElementById('multiplica').checked) operaciones.push('*');
        if (document.getElementById('divide').checked) operaciones.push('/');
        if (operaciones.length === 0) {
            resultado.innerHTML = '<p style="color:red;">Seleccione al menos una operación.</p>';
            return;
        }
        let html = '';
        operaciones.forEach(op => {
            html += `<table>
                <tr><th colspan="4">${op === '+' ? 'Suma' : op === '-' ? 'Resta' : op === '*' ? 'Multiplicación' : 'División'}</th></tr>
                <tr><th>X</th><th>${op}</th><th>${numero}</th><th>=</th></tr>`;
            for (let i = 1; i <= hasta; i++) {
                let resultadoOperacion;
                switch(op) {
                    case '+': resultadoOperacion = i + numero; break;
                    case '-': resultadoOperacion = i - numero; break;
                    case '*': resultadoOperacion = i * numero; break;
                    case '/': resultadoOperacion = (i / numero).toFixed(2); break;
                }
                html += `<tr>
                            <td>${i}</td>
                            <td>${op}</td>
                            <td>${numero}</td>
                            <td>${resultadoOperacion}</td>
                         </tr>`;
            }
            html += `</table><br>`;
        });
        resultado.innerHTML = html;
    };

function cargarContenidoF(abrir) {
var contenedor;
contenedor = document.getElementById('contenido');
fetch(abrir)
	.then(response => response.text())
	.then(data => contenedor.innerHTML=data);
}

function formEditar(id){    
    var url = `edit.php?id=${id}`
	var contenedor = document.getElementById('contenido');
	fetch(url)
		.then(response => response.text())
		.then(data => {
            contenedor.innerHTML = data 
            cargarContenidoF('listar.php');
        });
}