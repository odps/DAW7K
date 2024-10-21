window.addEventListener("load", () => {
  const btn = document.getElementById("btn");
  const img = document.querySelector("img");

  btn.addEventListener("click", () => {
    let random = Math.floor(Math.random() * images.length);
    img.src = images[random];
  });
});

const images = [
  "../img/1.jpg",
  "../img/2.jpg",
  "../img/3.jpg",
  "../img/4.jpg",
  "../img/5.jpg",
];
