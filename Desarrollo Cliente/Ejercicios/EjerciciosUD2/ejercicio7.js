let body = document.body;

let filas = prompt("Numero de filas");
let columnas = prompt("Numero de columnas");
let cTabla="";
let contador = 1;

cTabla+="<table>";


for (let i = 0; i < columnas; i++) {

    cTabla += "<tr>"

    for (let j = 0; j < filas; j++) {
        cTabla += `<td> ${contador++} </td>`;        
    }

    cTabla += "</tr>"
    
}

cTabla+="</table>";
body.innerHTML=cTabla;

