function Empleado(nombre, edad, nif) {
  this.nombre = nombre;
  this.edad = edad;
  this.nif = nif;
}

Empleado.prototype.muestraInfo = function () {
  return `Nombre: ${this.nombre}\nEdad: ${this.edad}\nNIF: ${this.nif}`;
};

// Empleado Temporal --------------------------------------

function EmpleadoTemporal(nombre, edad, nif, alta, baja) {
  this.nombre = nombre;
  this.edad = edad;
  this.nif = nif;

  this.fechaAlta = alta;
  this.fechaBaja = baja;
  this.sueldo = 1100;
}

EmpleadoTemporal.prototype.muestraInfo = Empleado.prototype.muestraInfo;

EmpleadoTemporal.prototype.muestraInfo = function () {
  return (
    Empleado.prototype.muestraInfo() +
    `\nFecha de Alta: ${this.fechaAlta}\nFecha de Baja: ${
      this.fechaBaja
    }\nSueldo a percibir: ${this.calculaSueldo()}`
  );
};

EmpleadoTemporal.prototype.calculaSueldo = function () {
  return this.sueldo;
};

// Empleado Por Horas --------------------------------------

function EmpleadoPorHoras(nombre, edad, nif, horasTrabajadas) {
  this.precioHora = 10;
  this.nombre = nombre;
  this.edad = edad;
  this.nif = nif;
  this.horasTrabajadas = horasTrabajadas;
}

EmpleadoPorHoras.prototype.getPrecioHora = function () {
  return this.precioHora;
};

EmpleadoPorHoras.prototype.muestraInfo = Empleado.prototype.muestraInfo;

EmpleadoPorHoras.prototype.muestraInfo = function () {
  return (
    Empleado.prototype.muestraInfo() +
    `\nPrecio Hora: ${this.precioHora}\nHoras Trabajadas: ${
      this.horasTrabajadas
    }\nA percibir: ${this.calculaSueldo()}`
  );
};

EmpleadoPorHoras.prototype.calculaSueldo = function () {
  return this.precioHora * this.horasTrabajadas;
};

//Empleado Fijo --------------------------------------

function EmpleadoFijo(nombre, edad, nif, anyoAlta) {
  this.sueldo = 1100;
  this.nombre = nombre;
  this.edad = edad;
  this.nif = nif;
  this.anyoAlta = anyoAlta;
}

EmpleadoFijo.prototype.getPrecioHora = function () {
  return this.sueldo;
};

EmpleadoFijo.prototype.muestraInfo = Empleado.prototype.muestraInfo;

EmpleadoFijo.prototype.muestraInfo = function () {
  return (
    Empleado.prototype.muestraInfo() +
    `\nFecha de Alta: ${
      this.anyoAlta
    }\nSueldo a percibir: ${this.calculaSueldo()}`
  );
};

EmpleadoFijo.prototype.calculaSueldo = function () {
  let complemento = 1.1 * new Date().getFullYear() - this.anyoAlta;
  return this.sueldo + complemento;
};

// Pruebas -------------------
let empleado1 = new Empleado("Normal", 25, "1000a");
console.log(empleado1.muestraInfo());

console.log("------------------");

let empleado2 = new EmpleadoTemporal(
  "Temporal",
  25,
  "1000a",
  "02 - diciembre",
  "02 - febrero"
);
console.log(empleado2.muestraInfo());

console.log("------------------");

let empleado3 = new EmpleadoPorHoras("Horas", 25, "1000a", 50);
console.log(empleado3.muestraInfo());

console.log("------------------");

let empleado4 = new EmpleadoFijo("Fijo", 25, "1000a", 2020);
console.log(empleado4.muestraInfo());
