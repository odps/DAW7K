window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

let p = document.createElement("p");

function ejercicio() {
  let palabra = prompt("Introduce una palabra");
  let index;

  if (palabra != "" && palabra != null) {
    palabra = palabra.toLowerCase();

    if (palabra.includes("a")) {
      index = palabra.indexOf("a");
    } else if (palabra.includes("e")) {
      index = palabra.indexOf("e");
    } else if (palabra.includes("i")) {
      index = palabra.indexOf("i");
    } else if (palabra.includes("o")) {
      index = palabra.indexOf("o");
    } else if (palabra.includes("u")) {
      index = palabra.indexOf("u");
    } else {
      index = -1;
    }
  }

  p.innerHTML =
    index != -1
      ? `La primera vocal se encuentra en la posición ${index}`
      : "No se ha encontrado ninguna vocal";
  document.body.appendChild(p);
}
