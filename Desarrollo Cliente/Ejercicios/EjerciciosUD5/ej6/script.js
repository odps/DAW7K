window.addEventListener("load", function () {
  const btn = document.querySelector("#btn");
  const imgs = ["img1", "img2", "img3", "img4", "img5"];

  btn.addEventListener("click", function () {
    let filas = document.querySelector("#filas").value;
    let columnas = document.querySelector("#columnas").value;

    let tabla = document.querySelector("table");
    if (tabla != null) {
      while (tabla.hasChildNodes()) {
        tabla.removeChild(tabla.firstChild);
      }
    }

    let tablaNueva = createTable(filas, columnas, imgs);
    document.body.appendChild(tablaNueva);
  });
});

//Creador de tablas
function createTable(row, col, opts) {
  let table = document.createElement("table");

  for (let i = 0; i < row; i++) {
    table.insertRow();
    for (let j = 0; j < col; j++) {
      table.rows[i].insertCell();
    }
  }

  table.id = "table";
  table.querySelectorAll("td").forEach((td) => {
    td.appendChild(createSelection(opts));
  });

  return table;
}
//Metodo auxiliar para la creacion de selects.
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
