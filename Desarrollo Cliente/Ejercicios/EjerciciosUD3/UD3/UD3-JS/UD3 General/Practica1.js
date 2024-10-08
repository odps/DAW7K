window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  const meses = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ];

  while (document.body.querySelector("p")) {
    document.body.removeChild(document.body.getElementsByTagName("p"));
  }

  meses.forEach((mes) => {
    let p = document.createElement("p");
    p.innerText = mes;
    document.body.appendChild(p);
  });
}
