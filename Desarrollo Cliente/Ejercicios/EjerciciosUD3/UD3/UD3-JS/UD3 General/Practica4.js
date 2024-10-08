window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let palabra = prompt("Introduce una palabra.");
  if (palabra.match(/^[A-Z]+$/)) {
    alert("Esta compuesta solo por mayusculas.");
  } else if (palabra.match(/^[a-z]+$/)) {
    alert("Esta compuesta solo por minusculas.");
  } else alert("Palabra mixta o no valida.");
}
