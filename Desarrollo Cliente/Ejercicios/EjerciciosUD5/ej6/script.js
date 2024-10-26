const imgs = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"];

window.addEventListener("load", function () {
  const btn = document.querySelector("#btn");

  btn.addEventListener("click", function () {
    let filas = document.querySelector("#filas").value;
    let columnas = document.querySelector("#columnas").value;

    //Se elimina la tabla y boton anterior si existe.
    let tabla = document.querySelector("table");
    if (tabla != null) {
      tabla.remove();
    }
    let prueba = document.querySelector("#prueba");
    if (prueba != null) {
      prueba.remove();
    }

    //Se crea una tabla nueva y se insertan los valores del select.
    let tablaNueva = createTable(filas, columnas);
    tablaNueva.querySelectorAll("td").forEach((td) => {
      td.appendChild(createSelection(imgs));
      document.body.appendChild(tablaNueva);
    });

    
    let pruebaBtn = createButton("Prueba", "prueba");
    pruebaBtn.addEventListener("click", function () {

      tablaNueva.querySelectorAll("td").forEach((td) => {
        let select = td.querySelector("select");
        let img = select.value;
        td.removeChild(select);
        td.appendChild(createImage("./img/"+img));
      });
    });




    document.body.appendChild(pruebaBtn);
  });
});

//Funciones auxiliares para la creacion de elementos.
function createTable(row, col) {
  let table = document.createElement("table");

  for (let i = 0; i < row; i++) {
    table.insertRow();
    for (let j = 0; j < col; j++) {
      table.rows[i].insertCell();
    }
  }
  table.id = "table";
  table.style.margin = "auto";
  return table;
}

function createSelection(array) {
  if (!Array.isArray(array)) {
    return false;
  } else {
    let select = document.createElement("select");
    select.id = "select";
    array.forEach((element) => {
      let option = document.createElement("option");
      option.value = element;
      option.text = element;
      select.appendChild(option);
    });

    return select;
  }
}

function createButton(value, id) {
  let baseid = id != null ? id : "";
  let btn = document.createElement("button");
  btn.id = baseid;
  btn.textContent = value;
  return btn;
}

function createImage(src) {
  let img = document.createElement("img");
  img.width = 100;
  img.height = 100;
  img.src = src;
  return img;
}
