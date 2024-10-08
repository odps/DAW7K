window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", inicio);
});

let dnis = [];
let intervalId;

function inicio() {
  ejercicio();
  intervalId = setInterval(ejercicio, 10000);
}

function ejercicio() {
  let respuesta = prompt(
    "Introduce el numero DNI / Escribe NO para salir y mostrar resultados."
  )
    .trim()
    .toLowerCase();

  if (respuesta === "no" || respuesta === "") {
    mostrarResultados();
    clearInterval(intervalId);
  } else if (calculaDNI(respuesta)) {
    alert("DNI Válido.");
  } else {
    alert("Número DNI no válido.");
  }
}

function calculaDNI(num) {
  const validos = [
    "T",
    "R",
    "W",
    "A",
    "G",
    "M",
    "Y",
    "F",
    "P",
    "D",
    "X",
    "B",
    "N",
    "J",
    "Z",
    "S",
    "Q",
    "V",
    "H",
    "L",
    "C",
    "K",
    "E",
  ];

  if (num.match(/^[0-9]{8}$/)) {
    if (validos[num % 23] === undefined) {
      return false;
    } else {
      dnis.push(num.concat(validos[num % 23]));
      return true;
    }
  }
  return false;
}

function mostrarResultados() {
  const p = document.createElement("p");
  p.textContent = "DNIs: " + dnis.join(", ");
  document.body.appendChild(p);
}
