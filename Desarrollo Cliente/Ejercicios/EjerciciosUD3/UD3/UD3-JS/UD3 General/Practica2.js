window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let valors = [true, 5, false, "hola", "adeu", 2];
  let palabra = "";
  let bools = new Array();
  let nums = new Array();

  for (let i = 0; i < valors.length; i++) {
    switch (typeof valors[i]) {
      case "string":
        if (valors[i].length > palabra.length) palabra = valors[i];
        break;
      case "boolean":
        bools.push(valors[i]);
        break;
      case "number":
        nums.push(valors[i]);
        break;
    }
  }
  console.log(palabra);
  console.log(...bools);
  console.log(...cincoOperaciones(nums));
}

function cincoOperaciones(a) {
  resultados = new Array();
  resultados.push("Suma: " + (a[0] + a[1]));
  resultados.push("Resta: " + (a[0] - a[1]));
  resultados.push("Mult: " + a[0] * a[1]);
  resultados.push("Division: " + a[0] / a[1]);
  resultados.push("Modulo: " + (a[0] % a[1]));
  return resultados;
}
