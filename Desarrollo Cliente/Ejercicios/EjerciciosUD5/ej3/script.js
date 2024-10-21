//TIENE UN PROBLEMA CON LAS RUTAS DE IMAGEN EN EL CODIGO

window.addEventListener("load", function () {
  const img = document.querySelector("img");
  const btnPrev = document.getElementById("prev");
  const btnNext = document.getElementById("next");
  const path = "../img/";
  const images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"];

  btnNext.addEventListener("click", () => {
    let rutaActual = img.src.split("/").pop();

    if (rutaActual === images[images.length - 1]) {
      img.src = path + images[0];
    } else {
      img.src = path + images[images.indexOf(rutaActual) + 1];
    }
  });

  btnPrev.addEventListener("click", () => {
    let rutaActual = img.src.split("/").pop();
    if (rutaActual === images[0]) {
      img.src = path + images[images.length - 1];
    } else {
      img.src = path + images[images.indexOf(rutaActual) - 1];
    }
  });
});
