class Empleado {
  nombre;
  edad;
  nif;

  constructor(nombre, edad, nif) {
    this.nombre = nombre;
    this.edad = edad;
    this.nif = nif;
  }

  muestraInfo() {
    return `Nombre: ${this.nombre}\nEdad: ${this.edad}\nNIF: ${this.nif}`;
  }
}

class EmpleadoTemporal extends Empleado {
  #sueldo = 1100;
  fechaAlta;
  fechaBaja;
  constructor(nombre, edad, nif, alta, baja) {
    super(nombre, edad, nif);
    this.fechaAlta = alta;
    this.fechaBaja = baja;
  }
  get sueldo() {
    return this.#sueldo;
  }
  muestraInfo() {
    return (
      super.muestraInfo() +
      `\nFecha de Alta: ${this.fechaAlta}\nFecha de Baja: ${
        this.fechaBaja
      }\nSueldo a percibir: ${this.calculaSueldo()}`
    );
  }
  calculaSueldo() {
    return this.sueldo;
  }
}

class EmpleadoPorHoras extends Empleado {
  #precioHora = 10;
  horasTrabajadas;

  constructor(nombre, edad, nif, horasTrabajadas) {
    super(nombre, edad, nif);
    this.horasTrabajadas = horasTrabajadas;
  }

  get precioHora() {
    return this.#precioHora;
  }

  muestraInfo() {
    return (
      super.muestraInfo() +
      `\nPrecio Hora: ${this.precioHora}\nHoras Trabajadas: ${
        this.horasTrabajadas
      }\nA percibir: ${this.calculaSueldo()}`
    );
  }
  calculaSueldo() {
    return this.#precioHora * this.horasTrabajadas;
  }
}

class EmpleadoFijo extends Empleado {
  #sueldo = 1100;
  anyoAlta;
  constructor(nombre, edad, nif, anyoAlta) {
    super(nombre, edad, nif);
    this.anyoAlta = anyoAlta;
  }
  get sueldo() {
    return this.#sueldo;
  }
  muestraInfo() {
    return (
      super.muestraInfo() +
      `\nFecha de Alta: ${
        this.anyoAlta
      }\nSueldo a percibir: ${this.calculaSueldo()}`
    );
  }
  calculaSueldo() {
    let complemento = 1.1 * new Date().getFullYear() - this.anyoAlta;
    return this.sueldo + complemento;
  }
}
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
