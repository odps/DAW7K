window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

let p = document.createElement("p");

function ejercicio() {
  let palabra = prompt("Introduce una palabra");
  if (palabra != "" && palabra != null) {
    palabra = palabra.toUpperCase().trim();
    p.innerHTML = palabra;
    document.body.appendChild(p);
  }
}
