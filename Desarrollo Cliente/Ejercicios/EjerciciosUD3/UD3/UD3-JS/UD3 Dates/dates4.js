window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let fecha = new Date();
  let fecha30 = new Date();
  fecha30.setDate(fecha.getDate() + 30);
  let fecha60 = new Date();
  fecha60.setDate(fecha.getDate() + 60);
  let fecha90 = new Date();
  fecha90.setDate(fecha.getDate() + 90);

  let p = document.createElement("p");
  p.innerText =
    "Fecha actual: " +
    fecha.toLocaleDateString("es-ES", {
      day: "numeric",
      month: "long",
      year: "numeric",
    }) +
    "\nFecha 30 dias: " +
    fecha30.toLocaleDateString("es-ES", {
      day: "numeric",
      month: "long",
      year: "numeric",
    }) +
    "\nFecha 60 dias: " +
    fecha60.toLocaleDateString("es-ES", {
      day: "numeric",
      month: "long",
      year: "numeric",
    }) +
    "\nFecha 90 dias: " +
    fecha90.toLocaleDateString("es-ES", {
      day: "numeric",
      month: "long",
      year: "numeric",
    });

  document.body.appendChild(p);
}
