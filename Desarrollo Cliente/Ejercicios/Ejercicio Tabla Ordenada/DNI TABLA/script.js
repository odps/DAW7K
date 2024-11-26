class Persona {
  nombre;
  apellido;
  dni;

  constructor(nombre, apellido, dni) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.dni = dni;
  }

  static compareNombre(personaA, personaB) {
    if (personaA.nombre > personaB.nombre) {
      return 1;
    } else if (personaA.nombre < personaB.nombre) {
      return -1;
    } else return 0;
  }
  static compareApellido(personaA, personaB) {
    if (personaA.apellido > personaB.apellido) {
      return 1;
    } else if (personaA.apellido < personaB.apellido) {
      return -1;
    } else return 0;
  }
  static compareDni(personaA, personaB) {
    if (personaA.dni > personaB.dni) {
      return 1;
    } else if (personaA.dni < personaB.dni) {
      return -1;
    } else return 0;
  }

  get nombre() {
    return this.nombre;
  }
  get apellido() {
    return this.apellido;
  }
  get dni() {
    return this.dni;
  }
}

class Contenedor {
  personas;
  constructor() {
    this.personas = new Array();
  }
  addPersona(persona) {
    if (typeof persona === "object") this.personas.push(persona);
  }
  getLista() {
    return this.personas;
  }

  creaRow() {
    let fragment = document.createDocumentFragment();
    this.personas.forEach(function (persona) {
      let tr = document.createElement("tr");
      let tdNombre = document.createElement("td");
      let tdApellido = document.createElement("td");
      let tdDni = document.createElement("td");

      tdNombre.innerText = persona.nombre;
      tdApellido.innerText = persona.apellido;
      tdDni.innerText = persona.dni;

      tr.appendChild(tdNombre);
      tr.appendChild(tdApellido);
      tr.appendChild(tdDni);
      fragment.appendChild(tr);
    });
    return fragment;
  }
  actualizaTabla(table) {
    table.innerHTML = "";
    table.appendChild(this.creaRow());
  }
  sortNombre() {
    this.personas.sort(Persona.compareNombre);
  }
  sortApellido() {
    this.personas.sort(Persona.compareApellido);
  }
  sortDni() {
    this.personas.sort(Persona.compareDni);
  }
}
//Variables
const tabla = document.querySelector("#tabla");
const btnNombre = document.querySelector("#nombre");
const btnApellido = document.querySelector("#apellido");
const btnDni = document.querySelector("#dni");

// Objetos de prueba
let contenedor = new Contenedor();
let persona1 = new Persona("Armando", "Legos", "12345678A");
let persona2 = new Persona("Ana", "Pons", "87654321B");
let persona3 = new Persona("Elsa", "Pito", "45687321C");
contenedor.addPersona(persona1);
contenedor.addPersona(persona2);
contenedor.addPersona(persona3);

//Cargar los eventos

window.document.addEventListener("DOMContentLoaded", () => {
  contenedor.actualizaTabla(tabla);

  btnNombre.addEventListener("click", function () {
    console.log("nombre");
    contenedor.sortNombre();
    contenedor.actualizaTabla(tabla);
  });

  btnApellido.addEventListener("click", function () {
    console.log("apellido");
    contenedor.sortDni();
    contenedor.actualizaTabla(tabla);
  });

  btnDni.addEventListener("click", function () {
    console.log("dni");
    contenedor.sortDni();
    contenedor.actualizaTabla(tabla);
  });
});
