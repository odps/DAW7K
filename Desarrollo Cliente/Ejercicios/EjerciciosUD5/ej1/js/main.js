let links = document.querySelectorAll("a");
alert("Numero de enlaces: " + links.length);
alert("Penultimo enlace: " + links[links.length - 2].href);
alert(
  "Enlaces con destino a prueba: " +
    [...links].filter((a) => a.href == "http://prueba/").length
);
alert(
  "Numero de enlaces en el 3er parrafo: " +
    document.querySelectorAll("p")[2].querySelectorAll("a").length
);
