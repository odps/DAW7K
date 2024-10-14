let str = "hola mundo";

String.prototype.truncate = function (tamanyo) {
  return this.slice(0, tamanyo);
};

console.log(str.truncate(4));
