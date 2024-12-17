window.addEventListener("DOMContentLoaded", function () {
  //Variables globales del documento
  const formElements = document.forms[0];
  const labels = document.getElementsByTagName("label");
  const botonLimpiar = document.getElementById("limpiar");
  const botonEnviar = document.forms[0][12];
  const nombre = document.getElementsByName("nombre")[0];
  const numeroDni = document.getElementsByName("dni")[0];
  const letraDNI = document.getElementsByName("letradni")[0];
  const edad = document.getElementsByName("edad")[0];
  const telefono = document.getElementsByName("telefono")[0];
  const email = document.getElementsByName("email")[0];
  const repeatemail = document.getElementsByName("repeatemail")[0];
  const provincias = document.getElementsByName("provincia")[0];
  let localidad = document.getElementsByName("localidad")[0];
  const inputs = document.querySelectorAll('input[type="text"]');
  const obligatorios = [];
  let validados = {};

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
      let elemento = labels[i].nextElementSibling;
      obligatorios.push(elemento);
      validados[elemento.name] = false;
    }
  }
  //Anyadimos la funcionalidad de comprobar campos obligatorios
  obligatorios.forEach((elemento) => {
    elemento.addEventListener("blur", function () {
      pintaInput(elemento, !checkVacio(elemento));
    });
  });
  //Verificamos todos los campos al pulsar el boton enviar
  botonEnviar.addEventListener("click", function (evento) {
    evento.preventDefault();
    let dni = numeroDni.value + letraDNI.value;
    let isValid = true;

    // Validar DNI
    if (!validaDNI(dni)) {
      pintaInput(numeroDni, false);
      pintaInput(letraDNI, false);
      isValid = false;
    } else {
      pintaInput(numeroDni, true);
      pintaInput(letraDNI, true);
    }

    // Validar Edad
    if (!validaEdad(edad.value)) {
      pintaInput(edad, false);
      isValid = false;
    } else {
      pintaInput(edad, true);
    }

    // Validar Telefono
    if (!validaTelefono(telefono.value)) {
      pintaInput(telefono, false);
      isValid = false;
    } else {
      pintaInput(telefono, true);
    }

    // Validar Email
    if (!validaEmail(email.value) || email.value !== repeatemail.value) {
      pintaInput(email, false);
      pintaInput(repeatemail, false);
      isValid = false;
    } else {
      pintaInput(email, true);
      pintaInput(repeatemail, true);
    }

    if (isValid) {
      evento.target.dispatchEvent("submit");
    }
  });
  //Agregamos localidades a las pronvicias.
  provincias.addEventListener("change", function (evento) {
    const localidades = {
      V: ["Valencia", "Gandia", "Torrent"],
      CS: ["Castellón de la Plana", "Villarreal", "Benicarló"],
      A: ["Alicante", "Elche", "Torrevieja"],
    };

    while (localidad.options.length > 0) {
      localidad.remove(0);
    }

    let selectedProvince = evento.target.value;
    let localidadesOptions = localidades[selectedProvince];

    localidadesOptions.forEach(function (nombre) {
      let option = document.createElement("option");
      option.text = nombre;
      option.value = nombre;
      localidad.add(option);
      localidad.disabled = false;
    });
  });
  //Pintar de verde cuando se hace focus y blanco cuando sale (si no hay error).
  inputs.forEach((element) => {
    element.addEventListener("focus", function (evento) {
      element.style.borderColor = "lightgreen";
    });
    element.addEventListener("blur", function (evento) {
      if (element.style.borderColor == "lightgreen")
        element.style.borderColor = "white";
    });
  });
  //El campo nombre tiene focus al cargar la pagina.
  nombre.focus();
  //Cada vez que se modifique el contenido se valida el elemento, si esta mal vuelve a poner focus
  obligatorios.forEach((element) => {
    element.addEventListener("blur", function (evento) {
      let isEmpty = checkVacio(element);

      if (!isEmpty) {
        validados[element.name] = true;
      } else {
        validados[element.name] = false;
      }

      if (isEmpty) {
        for (const [name, validated] of Object.entries(validados)) {
          if (!validated) {
            setTimeout(() => {
              const el = obligatorios.find((el) => el.name === name);
              if (el) {
                el.focus();
              }
            }, 100);
            break;
          }
        }
      }
    });
  });
  //Los campos con valor numerico solo deben permitir numeros
  let numericos = [numeroDni, edad, telefono];
  numericos.forEach((campo) => {
    campo.addEventListener("keypress", esNumero);
  });
});

//FUNCIONES PARA VALIDAR CAMPOS
function validaDNI(dni) {
  let validator = new RegExp("^\\d{8}[a-zA-Z]$");
  if (!validator.test(dni)) {
    return false;
  }

  const letras = "TRWAGMYFPDXBNJZSQVHLCKET";

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

//Valida si el campo esta vacio
function checkVacio(campo) {
  return campo.value == "" || campo == null || campo == undefined
    ? true
    : false;
}

//Se pasa elemento a pintar y la funcion validar( esta debe tener como return un valor booleano)
function pintaInput(elemento, result) {
  if (result) {
    elemento.style.borderColor = "white";
    let errorMsgs = elemento.parentNode.querySelectorAll(".errormsg");
    errorMsgs.forEach((msg) => msg.remove());
  } else {
    let msg = document.createElement("p");
    msg.className = "errormsg";
    msg.style.color = "red";
    msg.innerText = `* Verificar el campo ${elemento.name}`;
    elemento.style.borderColor = "red";
    elemento.parentNode.appendChild(msg);
  }
}

//Validar si un keypress es numerico
function esNumero(evento) {
  const charCode = evento.charCode;
  if (charCode < 48 || charCode > 57) {
    evento.preventDefault();
  }
}
