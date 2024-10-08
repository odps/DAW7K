window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let palabra = prompt("Introduce una palabra para saber si es palindromo.")
    .toLowerCase()
    .replaceAll(" ", "");
  let palabraInv = palabra.split("").toReversed().join("");

  if (palabra === palabraInv) {
    alert("Es Palindromo.");
  } else alert("No es palindromo");
}
