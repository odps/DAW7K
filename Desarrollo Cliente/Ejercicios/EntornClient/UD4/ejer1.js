const Empresa = {
  nombre: "IES Abastos",
  direccion: "c/ Alberic 18, Valencia",
  telefono: "123456789",
  nif: "a1234567b",
};

function Cliente(nombre, direccion, telefono, dni) {
  this.nombre = nombre;
  this.direccion = direccion;
  this.telefono = telefono;
  this.dni = dni;
}

function Elemento(descripcion, precio, cantidad) {
  this.descripcion = descripcion;
  this.precio = precio;
  this.cantidad = cantidad;
}

function Factura(cliente, elemento, formaPago) {
  this.cliente = cliente;
  this.elemento = elemento;
  this.formaPago = formaPago;
  this.iva = 0.21;
  this.total = 0;
}

Factura.prototype.empresa = Empresa;

Factura.prototype.calculaImporte = function () {
  let total = 0;
  for (let i = 0; i < this.elemento.length; i++) {
    total += this.elemento[i].precio * this.elemento[i].cantidad;
  }
  total = total + total * this.iva;
  this.total = total;
  return total;
};

Factura.prototype.imprimeFactura = function () {
  this.calculaImporte();
  console.log(`
    Empresa: ${this.empresa.nombre}
    Dirección: ${this.empresa.direccion}
    Teléfono: ${this.empresa.telefono}
    NIF: ${this.empresa.nif}

    Cliente: ${this.cliente.nombre}
    Dirección: ${this.cliente.direccion}
    Teléfono: ${this.cliente.telefono}
    DNI: ${this.cliente.dni}

    Elementos:
    ${this.elemento
      .map(
        (elem) => `- ${elem.descripcion}: ${elem.cantidad} x ${elem.precio}€`
      )
      .join("\n")}

    Forma de pago: ${this.formaPago}
    IVA: ${this.iva * 100}%
    Total: ${this.total.toFixed(2)}€
  `);
};

let testCliente = new Cliente(
  "Juan Perez",
  "123 Mercadona",
  "987654321",
  "12345678A"
);

let elemento1 = new Elemento("Item 1", 10, 2);
let elemento2 = new Elemento("Item 2", 15, 1);
let elemento3 = new Elemento("Item 3", 20, 3);

let factura = new Factura(
  testCliente,
  [elemento1, elemento2, elemento3],
  "Credit Card"
);

factura.imprimeFactura();
