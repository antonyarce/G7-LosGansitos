$(function () {
    // Cargar las reservas al inicio
    //listarReservas();
    //listarReservasAux();
    

    // Al enviar el formulario de reserva
    $('#eventoForm').on('submit', function (event) {
        event.preventDefault();

        const fecha = new Date($('#fecha').val());
        const hoy = new Date();
        hoy.setDate(hoy.getDate());

        if (fecha < hoy) {
            alert('Debe reservar con mas anticipación.');
            return;
        }

        // Obtener datos del formulario
        const nombre = $('#nombre').val();
        const descripcion = $('#descripcion').val();
        const provincia = $('#provincia').val();
        const direccion = $('#direccion').val();
        const invitados = $('#invitados').val();
        

        // Enviar solicitud POST al servidor para crear la reserva
        $.post('procesar_evento.php', {nombre: nombre, descripcion: descripcion, fecha: fecha, provincia: provincia, direccion: direccion, invitados: invitados})
            .done(function (response) {
                alert(response); // Mostrar respuesta del servidor
                //listarReservas(); // Actualizar el listado de reservas después de la creación
            })
            .fail(function () {
                alert('Error al procesar el evento.');
            });
    });

});
