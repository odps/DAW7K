function ejer1(){
function Elemento(descripcion, precio, cantidad) {
    this.precio = precio;
    this.cantidad = cantidad;
    this.descripcion = descripcion;
}
function Cliente(nombre, direccion, telefono, dni) {
    this.nombre = nombre;
    this.direccion = direccion;
    this.telefono = telefono;
    this.dni = dni;
}

const Empresa = {
    nombre: "Empre S.A",
    direccion : "c/ Alberique 18",
    telefono : "900123456",
    nif : "74185236A"
}

    function Factura(cliente, elementos, formaPago) {
        this.cliente = cliente;
        this.elementos = elementos;
        this.iva = 0.21;
        this.formaPago = formaPago;
        this.total = 0;

        this.calculaImporte= function () {
            this.elementos.forEach((elemento) => this.total += (elemento.precio * elemento.cantidad * this.iva))
        }
        this.imprimeFactura= function () {
            this.calculaImporte();
            return `
            \nEmpresa: ${this.empresa.nombre}
            \nNIF: ${this.empresa.nif}
            \nCliente: ${this.cliente.nombre}
            \nDNI: ${this.cliente.dni}
            \nProductos: ${elementos.map((elemento)=>`\n${elemento.descripcion} * ${elemento.precio}`)}
            \nIVA: ${this.iva}
            \nTipo de pago: ${this.formaPago}
            \nTotal: ${this.total};
            `;
        }
    }
    Factura.prototype.empresa = Empresa;
    let cliente = new Cliente("juan","calle","123","123A");
    let elemento1 = new Elemento("naranja",2,2);
    let elemento2 = new Elemento("pera",2,2);
    elementos = [elemento1, elemento2];
    let factura = new Factura(cliente, elementos, "Tarjeta");

    console.log(factura.imprimeFactura());

}
function ejer2() {
    class Animal {
        constructor(nombre, especie, patas) {
            this._nombre = nombre;
            this._especie = especie;
            this._patas = patas;
        }

        get nombre() {
            return this._nombre;
        }

        get especie() {
            return this._especie;
        }

        get patas() {
            return this._patas;
        }

        set nombre(nombre) {
            this._nombre = nombre;
        }

        set especie(especie) {
            this._especie = especie;
        }

        set patas(patas) {
            this._patas = patas;
        }

    }

    class Vaca extends Animal {
        constructor(nombre, especie, patas, leche) {
            super(nombre, especie, patas);
            this._leche = leche;
        }

        get leche() {
            return this._leche;
        }

        set leche(leche) {
            this._leche = leche;
        }

        ordenyar(litros) {
            if (litros > this.leche) {
                console.log(`No se puede ordenar ${litros} litros de leche, le quedan ${this.leche} litros`);
                return false
            } else {
                this.leche -= litros;
                console.log(`Se ha ordenado ${litros} litros de leche`);
                return true;
            }
        }
    }

    class Tigre extends Animal {
        constructor(nombre, especie, patas, victimas) {
            super(nombre, especie, patas);
            this._victimas = victimas;
        }

        get victimas() {
            return this._victimas;
        }
        set victimas(value) {
            this._victimas = value;
        }

        cazar(){
            this._victimas++;
            console.log(`El tigre ${this.nombre} ha cazado a un animal`);
        }
    }

    let vaca = new Vaca("Lola", "vaca", 4, 10);
    let tigre = new Tigre("Tigre", "tigre", 4, 0);
    console.log(tigre.victimas);
    console.log(vaca.leche);

    vaca.ordenyar(10);
    tigre.cazar();

}

function ejer3() {
    let str = "Hola mundo";
    String.prototype.reverse = function () {
        return this.split("").reverse().join("");
    }
    console.log(str);
    console.log(str.reverse());

}

function ejer4() {
    let str = "Hola mundo";
    String.prototype.truncate = function (n) {
        if (this.length > n) {
            return this.substring(0, n);
        } else {
            return this;
        }
    }
    String.prototype.truncate2 = function (n, agregado) {
        if (this.length > n) {
            return this.substring(0, n) + " " + agregado;
        } else {
            return this;
        }
    }
    console.log(str.truncate(5));
    console.log(str.truncate2(5, "...mundo"));
}
function ejer5(){
    Array.prototype.filtrar = function(elemento){
        for (let i = 0; i < this.length; i++) {
            if (this[i] === elemento) {
                this.splice(i, 1);
                return true;
            }
        }
        return false;
    }
    let myArray = ['apple', 'banana', 'cherry', 'orange'];
    console.log(myArray);
    myArray.filtrar('banana');
    console.log(myArray);
}

function ejer6() {
    Array.prototype.encontrar = function (elemento) {
        let posiciones = []
        for (let i = 0; i < this.length; i++) {
            if (this[i] === elemento) {
                posiciones.push(i);
            }
        }
        if (posiciones.length === 0) {
            return -1;
        } else {
            return posiciones;
        }
    }
    let myArray = ['apple', 'banana', 'cherry', 'orange', 'banana', 'banana'];
    console.log(myArray);
    console.log(myArray.encontrar('banana'));
}
function ejer7() {
    Array.prototype.agregador = function (elemento, repetir) {
  if (typeof repetir === 'boolean') {
      let existe = false;

      for (let i = 0; i < this.length; i++) {
          if (this[i] === elemento) {
              existe = true;
              break;
          }
      }
      if( (existe && repetir) || !existe) {
          this.push(elemento);
          return true;
      }
  }
  return false;
    }
    let myArray = ['apple', 'banana', 'cherry', 'orange'];
    console.log(myArray);
    console.log(myArray.agregador('banana', true));
    console.log(myArray);
}
function ejer8(){
    Object.prototype.implementa = function (nombre, metodo) {
        if (typeof this[nombre] === "function") {
            console.log("El objeto ya tiene un método llamado " + nombre);
            return false;
        } else {
            this[nombre] = metodo;
            return true;
        }
    }

    let objeto = {
        nombre: "Juan",
        edad: 25
    }

    console.log(objeto);
    console.log(objeto.implementa("saludar", function() {
        console.log("Hola, soy " + this.nombre);
    }));
    console.log(objeto);
    console.log(objeto.implementa("saludar", () => alert("hola")));
    objeto.saludar();
}