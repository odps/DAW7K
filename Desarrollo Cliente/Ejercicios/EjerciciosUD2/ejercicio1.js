
var numero = parseInt(prompt("Intruce un numero"));
if (isNaN(numero)) document.body.append("Error.");

function factorialOf(value){
        if (value < 2) {
            return 1;
        } else
            return value * factorialOf(value - 1);
    }

document.body.append(factorialOf(numero));
