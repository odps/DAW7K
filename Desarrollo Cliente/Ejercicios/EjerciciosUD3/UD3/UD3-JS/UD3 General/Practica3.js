window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
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
  let dni = prompt("Introduce un DNI.");

  if (dni.match(/^[0-9]{8}[a-zA-Z]$/)) {
    let num = parseInt(dni);
    if (dni[dni.length - 1] == validos[num % 23]) alert("DNI Valido");
    else alert("DNI Incorrecto.");
  } else alert("DNI Incorrecto.");
}
