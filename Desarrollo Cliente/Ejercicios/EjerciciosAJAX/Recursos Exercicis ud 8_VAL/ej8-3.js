const SERVER =
  "http://localhost/Practicas_JS/EjerciciosAJAX/Recursos%20Exercicis%20ud%208_VAL/Exercici%208.3.php";
const btnDetener = document.querySelector("#detener");
const btnAnterior = document.querySelector("#anterior");
const btnSiguiente = document.querySelector("#siguiente");
const ticker = document.querySelector("#ticker");

let feedNoticias = [];
let currentIndex = 0;

window.addEventListener("load", () => {
  let isActive = true;
  let timer = startTimer();

  btnDetener.addEventListener("click", function () {
    if (isActive) {
      clearInterval(timer);
      isActive = false;
    } else {
      timer = startTimer();
      isActive = true;
    }
  });

  btnAnterior.addEventListener("click", function () {
    console.log("clicked");
    if (currentIndex > 0) {
      let noticia = feedNoticias[--currentIndex];
      ticker.innerHTML = `<p>${noticia.news} - ${new Date(
        noticia.time
      ).toLocaleTimeString()}</p>`;
    }
  });
  btnSiguiente.addEventListener("click", function () {
    console.log("clicked siguiente");
    if (currentIndex < feedNoticias.length - 1) {
      let noticia = feedNoticias[++currentIndex];
      ticker.innerHTML = `<p>${noticia.news} - ${new Date(
        noticia.time
      ).toLocaleTimeString()}</p>`;
    }
  });
});

async function getNoticias() {
  let request = new XMLHttpRequest();
  request.open("get", SERVER);
  request.onreadystatechange = () => {
    if (request.status == 200 && request.readyState == 4) {
      feedNoticias.push({
        news: request.responseText,
        time: new Date().getTime(),
      });
    }
  };
  request.send();
}

function showNoticias() {
  currentIndex = feedNoticias.length - 1;
  let noticia = feedNoticias[currentIndex];
  ticker.innerHTML = `<p>${noticia.news} - ${new Date(
    noticia.time
  ).toLocaleTimeString()}</p>`;
}

function startTimer() {
  try {
    let timer = setInterval(async () => {
      await getNoticias();
      showNoticias();
    }, 1000);
    return timer;
  } catch (error) {
    console.error(error);
  }
}
