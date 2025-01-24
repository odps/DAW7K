const SERVER = "http://localhost:3000";

window.addEventListener("load", () => {
  let request = new XMLHttpRequest();
  const contenido = document.querySelector("#user");

  request.open("GET", SERVER + "/users");
  request.onreadystatechange = function () {
    if (this.status == 200 && this.readyState == 4) {
      let response = JSON.parse(this.response);
      contenido.innerHTML = response[3].username;
    }
  };
  request.send();

  document
    .getElementById("userForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = {
        id: document.getElementById("id").value,
        username: document.getElementById("username").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
        created_at: document.getElementById("created_at").value,
      };

      fetch(SERVER + "/users", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log("Success:", data);
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
});
