window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

let p = document.createElement("p");

function ejercicio() {
  let palabra = prompt("Introduce una palabra");
  let contador = 0;

  if (palabra != "" && palabra != null) {
    let vector = palabra.split("");

    vector.forEach((a) => {
      if (a == "a" || a == "e" || a == "i" || a == "o" || a == "u") {
        contador++;
      }
    });
  }

  p.innerHTML = contador;
  document.body.appendChild(p);
}
