window.addEventListener("load", () => {
  document.getElementById("btn").addEventListener("click", ejercicio);
});

function ejercicio() {
  let uniqueNumbers = new Set();
  let p = document.createElement("p");

  while (uniqueNumbers.size < 1000) {
    let randomNumber = Math.floor(Math.random() * (10000 + 1));
    uniqueNumbers.add(randomNumber);
  }

  p.innerText = Array.from(uniqueNumbers).sort((a, b) => a - b);
  document.body.appendChild(p);
}
