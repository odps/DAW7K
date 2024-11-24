//Variables elementos DOM

//Dar de alta en sistema
const productoAlta = document.getElementById("producto2");
const precioAlta = document.getElementById("precio2");
const altaBtn = document.getElementById("alta").querySelector("button");

//Elementos a agregar a la factura
const select = document.getElementById("producto");
const precio = document.getElementById("precio");
const unidades = document.getElementById("unidades");
const importe = document.getElementById("importe");
const addBtn = document.querySelectorAll(".verde")[1];

//Tabla
const tabla = document.querySelector("tbody");
const tfoot = document.getElementById("tfoot");
let grandTotal = document.querySelector('#tfoot td[align="right"]');

const borrarBtn = document.querySelector(".btn-danger");

// Clases

class Producto {
  constructor(nombre, precio) {
    this.nombre = nombre;
    this.precio = precio;
  }
  getNombre() {
    return this.nombre;
  }
  getPrecio() {
    return this.precio;
  }
  setNombre(nombre) {
    this.nombre = nombre;
  }
  setPrecio(precio) {
    this.precio = precio;
  }
}

class Catalogo {
  constructor() {
    this.productos = new Map();
  }

  addProducto(producto) {
    if (producto instanceof Producto)
      this.productos.set(producto.getNombre(), producto);
  }

  getProducto(nombre) {
    return this.productos.get(nombre);
  }

  getProductos() {
    return this.productos;
  }

  updateSelect(sel) {
    sel.textContent = "";
    let fragment = document.createDocumentFragment();

    let option = document.createElement("option");
    option.textContent = "Seleccione un producto...";
    fragment.appendChild(option);

    this.productos.forEach(function (prod) {
      let option = document.createElement("option");
      option.value = prod.getNombre();
      option.textContent = prod.getNombre();
      fragment.appendChild(option);
    });

    sel.appendChild(fragment);
  }
}

function createRow(name, price, amount, total) {
  let tr = document.createElement("tr");

  let nameCell = document.createElement("td");
  nameCell.textContent = name;
  tr.appendChild(nameCell);

  let priceCell = document.createElement("td");
  priceCell.textContent = price;
  tr.appendChild(priceCell);

  let amountCell = document.createElement("td");
  amountCell.textContent = amount;
  tr.appendChild(amountCell);

  let totalCell = document.createElement("td");
  totalCell.textContent = total;
  totalCell.className = "totalCell";
  tr.appendChild(totalCell);

  let deleteCell = document.createElement("td");
  deleteCell.innerHTML = "<button class='delete'>X</button>";
  deleteCell.style.width = "15px";
  tr.appendChild(deleteCell);

  return tr;
}

function calculaTotales() {
  let totales = document.querySelectorAll(".totalCell");
  return [...totales].reduce(function (acc, total) {
    return acc + parseFloat(total.innerHTML);
  }, 0);
}

// Muestra y oculta la division de alta de productos
function mostrar() {
  var e = document.getElementById("alta"); //recoge todo el elemento alta
  if (e.style.display == "block") {
    //si se ve
    e.style.display = "none"; //que no se vea
  } else {
    //si no
    e.style.display = "block"; //que se vea
  }
}

//Instanciacion de Catalogo
let catalogo = new Catalogo();

//Asignacion de eventos

document.addEventListener("DOMContentLoaded", eventAsign);

function eventAsign() {
  altaBtn.addEventListener("click", () => {
    if (isNaN(precioAlta.value)) {
    } else {
      let item = new Producto(productoAlta.value, precioAlta.value);
      catalogo.addProducto(item);
      catalogo.updateSelect(select);
    }
  });

  select.addEventListener("change", () => {
    let item = catalogo.getProducto(select.value);
    if (item != undefined) {
      precio.value = item.getPrecio();
    }
    if (!isNaN(unidades.value)) {
      importe.value = precio.value * unidades.value;
    }
  });

  unidades.addEventListener("change", () => {
    if (!isNaN(unidades.value)) {
      importe.value = precio.value * unidades.value;
    }
  });

  addBtn.addEventListener("click", () => {
    if (catalogo.getProducto(select.value) != undefined) {
      let row = createRow(
        select.value,
        precio.value,
        unidades.value,
        importe.value
      );

      tabla.appendChild(row);

      grandTotal.innerText = calculaTotales();
    }
  });

  borrarBtn.addEventListener("click", () => {
    tabla.innerHTML = "";
    grandTotal.innerText = "0.00";
  });

  tabla.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete")) {
      event.target.parentElement.parentElement.remove();
      grandTotal.innerText = calculaTotales();
    }
  });
}
