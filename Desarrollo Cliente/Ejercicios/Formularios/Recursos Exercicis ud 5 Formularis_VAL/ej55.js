window.addEventListener("DOMContentLoaded", function () {
  //Variables globales del documento
  const formElements = document.forms[0];
  const labels = document.getElementsByTagName("label");
  const botonLimpiar = document.getElementById("limpiar");
  let obligatorios = [];

  //Anyadimos funcionalidad de limpiar al boton sin cambiar el type
  botonLimpiar.addEventListener("click", function () {
    for (let i = 1; i < 12; i++) {
      formElements[i].value = "";
    }
  });

  //Verificamos cuales campos son obligatorios
  for (let i = 0; i < labels.length; i++) {
    let texto = labels[i].innerText;
    if (new RegExp("\\*").test(texto)) {
      let associatedElement = labels[i].nextElementSibling;
      obligatorios.push(associatedElement);
    }
  }

  console.log(obligatorios);
});

//FUNCIONES PARA VALIDAR CAMPOS
function validaDNI(dni) {
  let validator = new RegExp("^\\d{8}[a-zA-Z]$");
  if (!validator.test(dni)) {
    return false;
  }

  const letras = "TRWAGMYFPDXBNJZSQVHLCKE";

  let numero = parseInt(dni);
  let letra = dni.charAt(8).toUpperCase();
  let letraCalculada = letras[numero % 23];

  return letra === letraCalculada;
}

function validaEdad(edad) {
  if (isNaN(edad) || edad > 99 || edad < 0) {
    return false;
  } else return true;
}

function validaTelefono(telefono) {
  let validator = new RegExp("^\\d{9}$");
  if (validator.test(telefono)) {
    return true;
  } else return false;
}

function validaEmail(email) {
  const re = new RegExp("^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$");
  return re.test(email);
}
