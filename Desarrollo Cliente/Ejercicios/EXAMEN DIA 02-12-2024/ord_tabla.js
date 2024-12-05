//Cargar eventos
window.addEventListener("DOMContentLoaded", function () {
  const contenedor = document.getElementById("ul");
  const li = document.querySelectorAll("li");
  let flechas = document.querySelector("#imagenes");
  const flechaArriba = flechas.children[1];
  const flechaAbajo = flechas.children[0];

  li.forEach((item) => {
    item.addEventListener("click", function () {
      if (item.className === "selected") {
        item.className = "";
        item.style.backgroundColor = "white";
        flechas.style.display = "none";
      } else {
        item.style.backgroundColor = "lightblue";
        item.className = "selected";
        item.parentElement.insertBefore(flechas, item.nextSibling);
        flechas.style.display = "block";
      }
    });
  });

  flechaArriba.addEventListener("click", function () {
    console.log("arriba");
    let selected = document.querySelector(".selected");
    let padre = selected.parentElement;
    if (selected.previousElementSibling) {
      padre.insertBefore(selected, selected.previousElementSibling);
    }
  });

  flechaAbajo.addEventListener("click", function () {
    console.log("abajo");
    let selected = document.querySelector(".selected");
    let padre = selected.parentElement;
    if (
      selected.nextElementSibling &&
      selected.nextElementSibling !== flechas
    ) {
      padre.insertBefore(selected.nextElementSibling, selected);
    }
  });
}); // Fin de load
