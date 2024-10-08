window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

let p = document.createElement("p");

function ejercicio() {
  let palabra = prompt("Introduce una palabra");
  let palabraNew = "";

  if (palabra != "" && palabra != null) {
    palabra = palabra.split("");
    for (let i = 0; i < palabra.length; i++) {
      palabraNew += palabra[i] + "-";
    }
    palabraNew = palabraNew.slice(0, -1);
    p.innerHTML = palabraNew;
    document.body.appendChild(p);
  }
}
