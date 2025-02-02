const SERVER = 'http://localhost/Practicas_JS/EjerciciosAJAX/Recursos%20Exercicis%20ud%208_VAL/Exercici%208.1.txt';
window.addEventListener("load",()=>{
    const info = document.querySelector("#info");

    let request = new XMLHttpRequest();
try {
    request.open('get', SERVER);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            info.innerHTML = request.responseText;
        }
    };
    request.send();
} catch (error) {
    console.error(error);
}
});