function siguiente() {
    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var email = document.getElementById('email').value;
    var cel = document.getElementById('cel').value;



    // Verificar que los campos requeridos no estén vacíos
    if (nombre === '' || apellidos === '' || email === '' || cel === '') {
        // Mostrar una alerta con SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor, complete todos los campos antes de continuar.',
        });
        return; // Detener la ejecución de la función si hay campos vacíos
    }

    // Si todos los campos requeridos están completos, continuar con el cambio de paso del formulario
    document.getElementById("servicioForm").style.display = "none";
    document.getElementById("segundoPaso").style.display = "block";
}