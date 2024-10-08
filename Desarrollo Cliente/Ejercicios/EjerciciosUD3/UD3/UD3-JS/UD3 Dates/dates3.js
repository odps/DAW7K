window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let userMes = prompt("Introduce un mes (valor numerico)");
  let userAnyo = prompt("Introduce un año (valor numerico)");

  if (
    isNaN(userMes) ||
    isNaN(userAnyo) ||
    userMes < 1 ||
    userMes > 12 ||
    userAnyo < 1970 ||
    userAnyo > 2100
  ) {
    alert("Los valores introducidos no son correctos");
  } else {
    let mes = parseInt(userMes);
    let anyo = parseInt(userAnyo);
    let diasDelMes = new Date(anyo, mes, 0).getDate();
    let fecha = new Date(anyo, mes - 1);

    for (let i = 1; i <= diasDelMes; i++) {
      fecha.setDate(i);
      if (i == 1) {
        document.body.appendChild(fnGeneraH(fecha.getFullYear()));
      }

      document.body.appendChild(
        fnGeneraP(
          fecha.toLocaleDateString("es-ES", {
            weekday: "long",
            month: "long",
            day: "numeric",
          })
        )
      );
    }
  }
}

function fnGeneraP(texto) {
  let p = document.createElement("p");
  p.textContent = texto;
  return p;
}

function fnGeneraH(texto) {
  let p = document.createElement("h1");
  p.textContent = texto;
  return p;
}
