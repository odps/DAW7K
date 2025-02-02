const urlSitio = document.querySelector('#recurso');
const contenido = document.querySelector('#contenidos');
const enviarBtn = document.querySelector('#enviar');
const estados = document.querySelector('#estados');
const codigo = document.querySelector('#codigo');
const cabeceras = document.querySelector('#cabeceras');

window.addEventListener('load', ()=>{
    urlSitio.value = location.href;
    enviarBtn.addEventListener('click', () => makeRequest(urlSitio.value));
})

function makeRequest(url) {
    let request = new XMLHttpRequest();
    request.open('get', url);
    request.onreadystatechange = function () {
        estados.innerHTML += request.readyState + "\n";
        codigo.innerHTML = request.status + " \n" + request.statusText;
        cabeceras.innerHTML += request.getAllResponseHeaders() + "\n";
        if (request.readyState == 4 && request.status == 200)
            contenido.innerHTML = request.responseText;
    };
    request.send();
}