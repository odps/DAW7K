window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", start);
  document.getElementById("startStop").addEventListener("click", countdown);
  document.getElementById("pauseStop").addEventListener("click", stopCountdown);
});

let timer;

function start() {
  let hora = document.getElementById("hora");
  timer = setInterval(ejercicio, 1000);
}

function ejercicio() {
  hora.innerHTML = new Date().toLocaleTimeString("es-ES", {
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
  });
}

//STOPWATCH
let watch;
let isRunning = false;
let remainingSeconds = 0;

function countdown() {
  let display = document.getElementById("stopwatch");
  let btn = document.getElementById("startStop");
  btn.innerHTML = "Pausar";

  if (isRunning) {
    stopCountdown();
    btn.innerHTML = "Reanudar";
    return;
  }

  if (remainingSeconds === 0) {
    let seconds = prompt("Introduce los segundos");
    if (!isNaN(seconds) && seconds > 0) {
      remainingSeconds = parseInt(seconds);
    } else {
      alert("Introduce un valor válido");
      return;
    }
  }

  isRunning = true;
  watch = setInterval(function () {
    if (remainingSeconds <= 0) {
      display.innerHTML = "Cuenta finalizada";
      btn.innerHTML = "Empezar cuenta atras.";
      stopCountdown();
      remainingSeconds = 0;
    } else {
      display.innerHTML = remainingSeconds;
      remainingSeconds--;
    }
  }, 1000);
}

function stopCountdown() {
  clearInterval(watch);
  isRunning = false;
}
