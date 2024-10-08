window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  for (let i = 0; i < 14; i++) {
    let casa = 0;
    let visita = 0;
    let empate = 0;

    for (let j = 0; j < 3; j++) {
      switch (Math.floor(Math.random() * 3) + 1) {
        case 1:
          casa++;
          break;
        case 2:
          visita++;
          break;
        case 3:
          empate++;
          break;
      }
      if (j == 2) {
        let p = document.createElement("p");
        p.innerHTML = `Casa: ${casa} Visita: ${visita} Empate: ${empate}`;
        document.body.appendChild(p);
      }
    }
    let p = document.createElement("p");
    p.innerHTML = "-------------------------------------";
    document.body.appendChild(p);
  }
}
