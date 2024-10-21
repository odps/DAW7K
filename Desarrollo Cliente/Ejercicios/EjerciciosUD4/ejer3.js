String.prototype.reverse = function () {
  return this.split("").reverse().join("");
};

let str = "Hola como estas";
console.log(str);
console.log(str.reverse());
