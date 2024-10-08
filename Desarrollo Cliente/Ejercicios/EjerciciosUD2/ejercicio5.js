let body = document.body;
let numero = prompt("Numero de filas");

if (isNaN(numero)) {
    body.innerHTML = "Error"
} else {

    for (let i = 1; i <= numero; i++) {

        for (let j = 0; j < i; j++) {
            body.innerHTML += i;
        }

        body.innerHTML += "<br>";
    }
    
}