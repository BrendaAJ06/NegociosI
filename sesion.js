var loginButton = document.querySelector('.log-in');
    var signUpButton = document.querySelector('.sign-up');

    // Objeto JSON para almacenar los usuarios registrados
    var usuariosRegistrados = [];

    // Agregar evento de clic al botón de inicio de sesión
    loginButton.addEventListener('click', function(event) {
      event.preventDefault(); // Evitar el envío automático del formulario

      var correo = document.getElementById('txt-input').value;
      var contraseña = document.getElementById('pwd').value;

      // Validar los datos de inicio de sesión
      var usuarioEncontrado = usuariosRegistrados.find(function(usuario) {
        return usuario.correo === correo && usuario.contraseña === contraseña;
      });

      if (usuarioEncontrado) {
        window.location.href = 'index.html'; // Redireccionar a la página de inicio
      } else {
        alert('Inicio de sesión fallido. Verifica tus datos.'); // Mostrar mensaje de error
      }
    });

    // Agregar evento de clic al botón de registro
    signUpButton.addEventListener('click', function(event) {
      event.preventDefault(); // Evitar el envío automático del formulario

      var correo = document.getElementById('txt-input').value;
      var contraseña = document.getElementById('pwd').value;

      // Validar los datos de registro
      if (correo && contraseña) {
        var nuevoUsuario = {
          correo: correo,
          contraseña: contraseña
        };

        usuariosRegistrados.push(nuevoUsuario); // Agregar nuevo usuario al arreglo

        alert('Usuario creado con éxito'); // Mostrar mensaje de éxito
      } else {
        alert('Debes completar todos los campos.'); // Mostrar mensaje de error
      }
    });