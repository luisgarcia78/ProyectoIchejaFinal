const form = document.querySelector('#FormDelete');

form.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe automáticamente

  Swal.fire({
    title: '¿Estás seguro que deseas eliminar este usuario?',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'No, volver',
    timerProgressBar: true,
    allowOutsideClick: false
  }).then((result) => {
    if (result.isConfirmed) {
      // Si el usuario confirma, envía la solicitud de eliminación al archivo 'eliminauser.php'
      const formData = new FormData(form); // Crea un objeto FormData con los datos del formulario
      const id = formData.get('id'); // Obtiene el ID del usuario a eliminar de los datos del formulario
      fetch('eliminauser.php', {
        method: 'POST',
        body: JSON.stringify({ id: id }), // Envía el ID del usuario en el cuerpo de la solicitud en formato JSON
        headers: {
          'Content-Type': 'application/json'
        }
      }).then(response => {
        // Si el servidor devuelve una respuesta exitosa, muestra el mensaje de éxito
        if (response.ok) {
          Swal.fire({
            icon: 'success',
            title: '¡Eliminado correctamente!',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          setTimeout(function() {
            window.location.href = 'listaUsuarios.php';
          }, 4000);
        } else {
          // Si el servidor devuelve un error, muestra el mensaje de error
          Swal.fire({
            icon: 'error',
            title: 'Error al eliminar el usuario',
            text: 'Ocurrió un error al eliminar el usuario. Por favor, inténtalo de nuevo más tarde.',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
        }
      }).catch(error => {
        // Si ocurre un error en el proceso de envío, muestra el mensaje de error
        Swal.fire({
          icon: 'error',
          title: 'Error al eliminar el usuario',
          text: 'Ocurrió un error al eliminar el usuario. Por favor, inténtalo de nuevo más tarde.',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
      });
    } else {
      // Si el usuario cancela, muestra el mensaje de "Operación cancelada" y no envía los datos
      Swal.fire({
        icon: 'info',
        title: 'Operación cancelada',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
    }
  });
});
