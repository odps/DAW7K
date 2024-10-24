window.addEventListener("DOMContentLoaded", function () {
  const enlaces = document.querySelectorAll("a");
  let cont = 0;

  enlaces.forEach((enlace) => {
    let href = [...enlace.href];
    href.splice(4, 0, "s");
    enlace.href = href.join("");

    if (enlace.className == "importante") {
      enlace.name = "important" + cont;
      cont++;
      enlace.className = "resaltado";
    } else {
      enlace.className = "normal";
    }
  });
});
