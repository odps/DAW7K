window.addEventListener("load", () => {
  const rows = document.querySelectorAll("tr");
  const cells = document.querySelectorAll("td");
  let timer = new Date();

  function mezclar() {
    const cellArray = Array.from(cells);
    for (let i = cellArray.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [cellArray[i].innerHTML, cellArray[j].innerHTML] = [
        cellArray[j].innerHTML,
        cellArray[i].innerHTML,
      ];
      [cellArray[i].id, cellArray[j].id] = [cellArray[j].id, cellArray[i].id];
    }
  }

  mezclar(); //Comentar para desactivar el mezclado

  cells.forEach((cell) => {
    cell.addEventListener("click", () => {
      const row = cell.parentNode;
      const upperRow = row.previousElementSibling;
      const lowerRow = row.nextElementSibling;

      //Definimos el movimiento de las celdas en el eje horizontal
      if (cell.nextElementSibling && cell.nextElementSibling.id == "blanco") {
        [cell.nextElementSibling.innerHTML, cell.innerHTML] = [
          cell.innerHTML,
          cell.nextElementSibling.innerHTML,
        ];
        [cell.id, cell.nextElementSibling.id] = [
          cell.nextElementSibling.id,
          cell.id,
        ];
      }
      if (
        cell.previousElementSibling &&
        cell.previousElementSibling.id == "blanco"
      ) {
        [cell.previousElementSibling.innerHTML, cell.innerHTML] = [
          cell.innerHTML,
          cell.previousElementSibling.innerHTML,
        ];
        [cell.id, cell.previousElementSibling.id] = [
          cell.previousElementSibling.id,
          cell.id,
        ];
      }

      //Definimos el movimiento de las celdas en el eje vertical
      if (upperRow && upperRow.children[cell.cellIndex].id == "blanco") {
        [upperRow.children[cell.cellIndex].innerHTML, cell.innerHTML] = [
          cell.innerHTML,
          upperRow.children[cell.cellIndex].innerHTML,
        ];
        [upperRow.children[cell.cellIndex].id, cell.id] = [
          cell.id,
          upperRow.children[cell.cellIndex].id,
        ];
      }
      if (lowerRow && lowerRow.children[cell.cellIndex].id == "blanco") {
        [lowerRow.children[cell.cellIndex].innerHTML, cell.innerHTML] = [
          cell.innerHTML,
          lowerRow.children[cell.cellIndex].innerHTML,
        ];
        [lowerRow.children[cell.cellIndex].id, cell.id] = [
          cell.id,
          lowerRow.children[cell.cellIndex].id,
        ];
      }
    });
  });

  //Comprobar si se ha completado el puzzle, se utiliza el id de las celdas para comprobar si están en la posición correcta.
  document.getElementById("comprobar").addEventListener("click", () => {
    let row1 = Array.from(rows[0].querySelectorAll("td")).reduce(
      (acc, cell) => acc + parseInt(cell.id),
      0
    );
    let row2 = Array.from(rows[1].querySelectorAll("td")).reduce(
      (acc, cell) => acc + parseInt(cell.id),
      0
    );
    let row3 = Array.from(rows[2].querySelectorAll("td")).reduce(
      (acc, cell) => acc + parseInt(cell.id),
      0
    );
    let row4 = Array.from(rows[3].querySelectorAll("td")).reduce(
      (acc, cell) => {
        if (cell.id != "blanco") {
          acc += parseInt(cell.id);
        }
        return acc;
      },
      0
    );

    if (row1 == 10 && row2 == 26 && row3 == 42 && row4 == 42) {
      let time = new Date() - timer;
      alert(
        "Haz ganado! 🎉, tardaste " + (time / 1000).toFixed(2) + " segundos"
      );
    }
  });
});
