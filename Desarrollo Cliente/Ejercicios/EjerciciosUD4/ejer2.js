class Animal {
  constructor(nombre, especie, patas) {
    this.nombre = nombre;
    this.especie = especie;
    this.patas = patas;
  }
  getNombre() {
    return this.nombre;
  }
  setNombre(nombre) {
    this.nombre = nombre;
  }
  getEspecie() {
    return this.especie;
  }
  setEspecie() {
    this.especie = especie;
  }
  getPatas() {
    return this.patas;
  }
  setPatas() {
    this.patas = patas;
  }
}
class Vaca extends Animal {
  constructor(nombre, especie, patas, leche) {
    super(nombre, especie, patas);
    this.leche = leche;
  }
  getLeche() {
    return this.leche;
  }
  setLeche(leche) {
    this.leche = leche;
  }
  ordenyar(cantidad) {
    cantidad > this.leche
      ? console.log("No le queda tanta leche a la vaca.")
      : (this.leche -= cantidad);
    console.log("A la vaca le quedan " + this.leche);
  }
}
class Tigre extends Animal {
  constructor(nombre, especie, patas, victimas) {
    super(nombre, especie, patas);
    this.victimas = victimas;
  }
  getVictimas() {
    return this.victimas;
  }
  setVictimas(victimas) {
    this.victimas = victimas;
  }
  cazar() {
    this.victimas++;
    console.log("El tigre ha cazado a " + this.victimas);
  }
}

const vaca = new Vaca("Lola", "Bovino", 4, 20);
console.log("Prueba del método ordenyar de la Vaca:");
vaca.ordenyar(5);
vaca.ordenyar(25);

const tigre = new Tigre("Whiskas", "Felino", 4, 0);
console.log("\nPrueba del método cazar del Tigre:");
tigre.cazar();
tigre.cazar();
