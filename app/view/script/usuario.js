function registrarUsuario() {
  const nombre = document.getElementById("nombre").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!nombre || !email || !password) {
    Swal.fire({
      title: "Campos vacíos",
      text: "Por favor, completa todos los campos.",
      icon: "warning",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  $.ajax({
    url: "../../app/controller/Usuario.php?op=Registrar",
    type: "POST",
    dataType: "json",
    data: {
      nombre: nombre,
      email: email,
      password: password,
    },
    success: function (response) {
      if (response.estado) {
        Swal.fire({
          title: "Éxito",
          text: "Cuenta Creada Correctamente",
          icon: "success",
          confirmButtonText: "Aceptar",
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirige a otra página (por ejemplo, a login.html)
            ingresarVerificacion();
           // window.location.href = "verificar.html";
          }
        });
      } else {
        Swal.fire({
          title: "Error",
          text: "Error al crear la cuenta",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      }
    },
    error: function (xhr, status, error) {
      // Manejo de errores
      Swal.fire({
        title: "Error",
        text: "Error en el servidor: " + error,
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    },
  });
}

function ingresarVerificacion() {
  $.ajax({
    url: "../../app/controller/Usuario.php?op=Verificar",
    method: 'GET',
    success: function(response) {
        console.log('Acción Creada: ', "Creado con éxito");
    },
    error: function(xhr, status, error) {
        console.error('Error al ejecutar la acción:', error);
    }
  });
}

document
  .getElementById("formRegistro")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Detiene el comportamiento predeterminado (recarga de la página)
    registrarUsuario(); // Ejecuta la función AJAX
  });
