window.addEventListener("load", function () {
  const btn = document.querySelector("#btn");
  const divs = document.querySelectorAll("div");
  btn.addEventListener("click", function () {
    divs[0].textContent = randomGenerator();
    divs[1].textContent = randomGenerator();
    divs[2].textContent = greaterOf(
      parseInt(divs[0].textContent),
      parseInt(divs[1].textContent)
    );
  });
});
function randomGenerator() {
  return Math.floor(Math.random() * 100);
}
function greaterOf(a, b) {
  return a > b ? a : b;
}
