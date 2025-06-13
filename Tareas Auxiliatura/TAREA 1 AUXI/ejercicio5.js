let pantallaInferior = document.querySelector(".inferior");
let pantallaSuperior = document.querySelector(".superior");

let valor1 = undefined;
let valor2 = undefined;
let operacion = undefined;

let teclasNumeros = document.querySelectorAll(".numero");

teclasNumeros.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    pantallaInferior.innerHTML += tecla.innerHTML;
  });
});

let teclasOperaciones = document.querySelectorAll(".operacion");

teclasOperaciones.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    // Operaciones que solo necesitan un solo número y calculan al instante
    if (
      tecla.id === 'factorial' ||
      tecla.id === 'logaritmo' ||
      tecla.id === 'raiz'
    ) {
      valor1 = parseFloat(pantallaInferior.innerHTML);
      if (isNaN(valor1)) return;
      operacion = tecla.id;
      pantallaSuperior.innerHTML = operacionDisplayName(operacion) + '(' + valor1 + ')';
      calcular();
    } else {
      // Operaciones binarias que esperan dos operandos
      if (pantallaInferior.innerHTML === '') return;
      valor1 = parseFloat(pantallaInferior.innerHTML);
      pantallaSuperior.innerHTML = pantallaInferior.innerHTML;
      pantallaInferior.innerHTML = '';
      if (tecla.id === 'potencia') {
        operacion = 'potencia';
        pantallaSuperior.innerHTML += ' ^';
      } else {
        operacion = tecla.innerHTML;
        pantallaSuperior.innerHTML += ' ' + operacion;
      }
    }
  });
});

let teclaIgual = document.querySelector("#igual");
teclaIgual.addEventListener("click", () => {
  if (operacion === undefined) return;
  if (
    operacion === 'potencia' ||
    operacion === '+' ||
    operacion === '-' ||
    operacion === '*' ||
    operacion === '/'
  ) {
    valor2 = parseFloat(pantallaInferior.innerHTML);
    if (isNaN(valor2)) return;
    pantallaSuperior.innerHTML = valor1 + ' ' + operacionDisplayName(operacion) + ' ' + valor2;
  }
  calcular();
});

function calcular() {
  let resultado = undefined;
  switch (operacion) {
    case '+':
      resultado = valor1 + valor2;
      break;
    case '-':
      resultado = valor1 - valor2;
      break;
    case '*':
      resultado = valor1 * valor2;
      break;
    case '/':
      resultado = valor1 / valor2;
      break;
    case 'potencia':
      resultado = Math.pow(valor1, valor2);
      break;
    case 'raiz':
      if (valor1 < 0) {
        resultado = 'Error';
      } else {
        resultado = Math.sqrt(valor1);
      }
      break;
    case 'logaritmo':
      if (valor1 <= 0) {
        resultado = 'Error';
      } else {
        resultado = Math.log10(valor1);
      }
      break;
    case 'factorial':
      if (!Number.isInteger(valor1) || valor1 < 0) {
        resultado = 'Error';
      } else {
        resultado = factorial(valor1);
      }
      break;
    default:
      break;
  }
  pantallaInferior.innerHTML = resultado;
  if (typeof resultado === 'number') {
    valor1 = resultado;
  } else {
    valor1 = undefined;
  }
  valor2 = undefined;
  operacion = undefined;
}

function factorial(n) {
  if (n === 0 || n === 1) return 1;
  let fact = 1;
  for (let i = 2; i <= n; i++) {
    fact *= i;
  }
  return fact;
}

function operacionDisplayName(op) {
  switch (op) {
    case 'factorial':
      return '!';
    case 'logaritmo':
      return 'log';
    case 'raiz':
      return '√';
    case 'potencia':
      return '^';
    default:
      return op;
  }
}

let allClearButton = document.querySelector("#all-clear");
let deleteButton = document.querySelector("#delete");

allClearButton.addEventListener("click", () => {
  valor1 = undefined;
  valor2 = undefined;
  operacion = undefined;
  pantallaInferior.innerHTML = '';
  pantallaSuperior.innerHTML = '';
});

deleteButton.addEventListener("click", () => {
  pantallaInferior.innerHTML = pantallaInferior.innerHTML.slice(0, -1);
});