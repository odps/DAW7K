// let fechaHoy = new Date();
// let output = fechaHoy.toLocaleDateString("es-ES", {
//   month: "long",
//   weekday: "long",
//   year: "numeric",
//   day: "numeric",
// });
// console.log(output);

// let timer = new Date();
// window.prompt("whats your name");
// timer -= new Date();
// window.alert("Has tardado: " + -timer / 100 + "s  ");

// let calendario = new Date();
// calendario.setDate(1);
// while (calendario.getMonth() + 1 == 12) {
// console.log(
// calendario.toLocaleDateString("es-ES", {
// day: "2-digit",
// weekday: "long",
// month: "short",
// year: "numeric",
// })
// );
// calendario.setDate(calendario.getDate() + 1);
// }

let fecha = new Date();

function imprimeHora() {
  console.log(fecha);
  fecha.setSeconds(fecha.getSeconds() + 1);
}
function stopTimer(timer) {
  clearInterval(timer);
}

let timer = setInterval(imprimeHora, 1000);
stopTimer(timer);
