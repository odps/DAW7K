let jugador = parseInt(prompt("1.-Piedra | 2.-Papel | 3.-Tijeras"));
let pc = 0;
let puntosJugador = 0;
let puntosPc = 0;

if (isNaN(jugador)) {
    alert("Error");
} else {

    pc = Math.floor((Math.random() * 3) + 1);

    switch (jugador) {
        case 1:
            if (pc == 1) {
                puntosJugador++; puntosPc++;
            } else if (pc == 2) {
                puntosPc++
            } else puntosJugador++;
            break;
        case 2:
            if (pc == 2) {
                puntosJugador++; puntosPc++;
            } else if (pc == 3) {
                puntosPc++
            } else puntosJugador++;
            break;
        case 3:
            if (pc == 3) {
                puntosJugador++; puntosPc++;
            } else if (pc == 1) {
                puntosPc++
            } else puntosJugador++;
            break;
    }

    if(puntosJugador==puntosPc)
        document.body.innerHTML += "Empate! <br>";
    else puntosJugador>puntosPc? document.body.innerHTML+="Ganaste! <br>":document.body.innerHTML+="Perdiste! <br>";

    document.body.innerHTML +=`Puntuacion:<br>Jugador:${puntosJugador} <br>PC:${puntosPc}`;

}
