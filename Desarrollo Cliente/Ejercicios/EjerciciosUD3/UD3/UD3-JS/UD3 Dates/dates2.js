window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let nombre, apellido1, apellido2;
  let antes = new Date();

  antes = antes.getTime();
  nombre = prompt("Introduce tu nombre");
  apellido1 = prompt("Introduce tu primer apellido");
  apellido2 = prompt("Introduce tu segundo apellido");

  let despues = new Date();
  despues = despues.getTime();
  let resultado = despues - antes;

  let p = document.createElement("p");
  p.innerHTML = `El tiempo que has tardado en escribir tu nombre es de ${(
    resultado / 1000
  ).toFixed(2)} segundos`;
  document.body.appendChild(p);

  console.log(resultado);
  console.log(antes);
  console.log(despues);
}
