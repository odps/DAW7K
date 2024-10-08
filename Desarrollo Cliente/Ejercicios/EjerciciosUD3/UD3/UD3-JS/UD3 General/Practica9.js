window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let miPi = Math.PI.toPrecision(3);

  console.log(Math.PI);
  console.log(miPi);
}
