const SERVER =
  "http://localhost/Practicas_JS/EjerciciosAJAX/Recursos%20Exercicis%20ud%208_VAL/Exercici%208.4.php";

const disponibilidad = document.querySelector("#disponibilidad");
const comprobar = document.querySelector("#comprobar");
const login = document.querySelector("#login");

window.addEventListener("load", () => {
  comprobar.addEventListener("click", function (event) {
    event.preventDefault();
    const name = login.value;
    checkName(name);
  });
});

async function serverRequest(type, info) {
  const response = await fetch(SERVER, {
    method: type,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `login=${encodeURIComponent(info)}`,
  });

  if (response.ok) {
    return response.text();
  } else {
    throw new Error("Ha ocurrido un error");
  }
}

async function checkName(name) {
  try {
    let response = await serverRequest("POST", name)
      .then((valor) => {
        valor = valor.split(";")[0];
        if (valor == "si") {
          disponibilidad.innerHTML = "Este nombre SI esta disponible";
        } else {
          console.log(valor);
          disponibilidad.innerHTML = "Este nombre NO esta disponible";
        }
      })
      .catch((error) => console.error(error));
  } catch (error) {
    console.error("Ha ocurrido un error", error);
  }
}
