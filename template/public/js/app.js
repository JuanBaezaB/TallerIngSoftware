const loginForm = document.querySelector("#login-form");

if (loginForm) {
  loginForm.addEventListener("submit", (event) => {
    // Prevenir el comportamiento predeterminado del formulario al enviarlo
    event.preventDefault();

    // Obtener los valores del formulario
    const username = document.querySelector("#username").value;
    const password = document.querySelector("#password").value;

    console.log(username, password);

    // Enviar los datos del formulario al servidor
    $.ajax({
      url: "api/auth/login.php",
      method: "POST",
      data: {
        username: username,
        password: password,
      },
    }).done(function (response) {
      // console.log(response);
      const result = JSON.parse(response);
      // console.log(result);
      if (result.success) {
        Swal.fire({
          icon: "success",
          title: "¡Bienvenido!",
          text: result.message,
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          window.location.href = result.redirect;
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "¡Error!",
          text: result.message,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });
}

const registrationForm = document.querySelector("#registration-form");

if (registrationForm) {
  registrationForm.addEventListener("submit", (event) => {
    // Prevenir el comportamiento predeterminado del formulario al enviarlo
    event.preventDefault();

    // Obtener los valores del formulario
    const username = document.querySelector("#username").value;
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;

    console.log(username, email, password);

    // Enviar los datos del formulario al servidor
    $.ajax({
      url: "api/auth/register.php",
      method: "POST",
      data: {
        username: username,
        email: email,
        password: password,
      },
    })
      .done(function (response) {
        var data = JSON.parse(response);
        if (data.success === true) {
          Swal.fire({
            title: "Registro exitoso",
            text: data.message,
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar",
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "index.php?p=auth/login";
            }
          });
        } else {
          Swal.fire({
            title: "Error",
            text: data.message,
            icon: "error",
            button: "Aceptar",
          });
        }

        console.log(data);
      })
      .fail(function (response) {
        Swal.fire({
          title: "Error",
          text: "Error en el servidor. Intente de nuevo más tarde.",
          icon: "error",
          button: "Aceptar",
        });
      });
  });
}

const logout = document.querySelector("#logout");

if (logout) {
  logout.addEventListener("click", (event) => {
    event.preventDefault();
    $.ajax({
      url: "api/auth/logout.php",
      method: "POST",
    }).done(function (response) {
      console.log(response);
      const result = JSON.parse(response);
      console.log(result);
      if (result.success) {
        Swal.fire({
          icon: "success",
          title: "¡Hasta luego!",
          text: result.message,
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          window.location.href = "index.php";
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "¡Error!",
          text: result.message,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });
}
