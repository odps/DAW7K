window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

let p = document.createElement("p");

function ejercicio() {
  let palabra = prompt("Introduce una palabra");
  let parentesis1, parentesis2;
  let entreParentesis;

  if (palabra != "" && palabra != null) {
    palabra = palabra.trim();

    parentesis1 = palabra.indexOf("(");
    parentesis2 = palabra.indexOf(")");

    entreParentesis = palabra.substring(parentesis1 + 1, parentesis2);
  }

  p.innerHTML = `La palabra introducida es: ${palabra} y entre los parentesis esta: ${entreParentesis}`;
  document.body.appendChild(p);
}
