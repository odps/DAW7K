window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let fecha = new Date();
  let p = document.createElement("p");
  p.textContent =
    "Hoy es " +
    fecha.toLocaleString("es-ES", {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric",
    }) +
    " y son las " +
    fecha.toLocaleString("es-ES", {
      hour: "2-digit",
      minute: "2-digit",
    }) +
    " horas.";
  document.body.appendChild(p);
}
