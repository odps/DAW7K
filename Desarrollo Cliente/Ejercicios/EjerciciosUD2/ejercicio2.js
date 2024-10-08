var numero = parseInt(prompt("Intruce un numero"));
if (isNaN(numero)) document.body.append("Error.");

if (esPrimo(numero)) {
    document.body.append(`El numero ${numero} es primo\n`);
} else document.body.append(`El numero ${numero} no es primo\n`);

if (esPar(numero)) {
    document.body.append(`El numero ${numero} es par\n`);
} else
    document.body.append(`El numero ${numero} es impar\n`);


function esPrimo(n) {
    for(i=2;i<n;i++) {
        if(n%i==0)
            return false;
    }
    return true;
}

function esPar(n) {
    return n%2==0? true:false;
}