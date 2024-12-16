$(function () {
    // Cargar los eventos al inicio
    listarEventos();
    listarMisEventos();
    listarServicios();

    // Al enviar el formulario de evento
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
        const privacidad = $('#privacidad').val();

        // Enviar solicitud POST al servidor para crear la reserva
        $.post('procesar_evento.php', { nombre: nombre, descripcion: descripcion, fecha: $('#fecha').val(), provincia: provincia, direccion: direccion, invitados: invitados, privacidad: privacidad})
            .done(function (response) {
                alert(response); // Mostrar respuesta del servidor
                listarEventos(); // Actualizar el listado de eventos después de la creación
            })
            .fail(function () {
                alert('Error al procesar el evento.');
            });
    });

    // Al enviar el formulario de servicio
    $('#servicioForm').on('submit', function (event) {
        event.preventDefault();

        // Obtener datos del formulario
        const nombre = $('#nombre').val();
        const descripcion = $('#descripcion').val();
        const costo = $('#costo').val();

        // Enviar solicitud POST al servidor para crear la reserva
        $.post('procesar_servicio.php', { nombre: nombre, descripcion: descripcion, costo: costo })
            .done(function (response) {
                alert(response); // Mostrar respuesta del servidor
                listarServicios(); //Actualizar la lista
            })
            .fail(function () {
                alert('Error al procesar el servicio.');
            });
    });

    // Función para listar los servicios
    function listarServicios() {
        $.get('listar_servicios.php', function (data) {
            $('#servicios').html(data); // Actualizar el contenido del listado
        });
    }

    // Función para eliminar un servicio
    $(document).on('click', '.eliminar', function () {
        const idServicio = $(this).data('id');
        eleminarServicio(idServicio);
    });

    // Función para listar los eventos
    function listarEventos() {
        $.get('listar_eventos.php', function (data) {
            $('#eventos').html(data); // Actualizar el contenido del listado
        });
    }

    // Función para listar los eventos
    function listarMisEventos() {
        $.get('listar_mis_eventos.php', function (data) {
            $('#misEventos').html(data); // Actualizar el contenido del listado
        });
    }

    // Función para aprobar un evento
    $(document).on('click', '.aprobar', function () {
        const idEvento = $(this).data('id');
        actualizarReserva(idEvento, 'aprobado');
    });

    // Función para denegar una reserva
    $(document).on('click', '.rechazar', function () {
        const idEvento = $(this).data('id');
        actualizarReserva(idEvento, 'rechazado');
    });

    // Función para aprobar o rechazar reservas
    function actualizarReserva(id, estado) {
        $.post('actualizar_evento.php', { id: id, estado: estado })
            .done(function (response) {
                alert(response); // Mostrar mensaje de éxito
                listarEventos(); // Actualizar listado de eventos
            })
            .fail(function () {
                alert('Error al actualizar el evento.');
            });
    }

    // Función para eliminar servicios
    function eleminarServicio(id) {
        $.post('eliminar_servicio.php', { id: id })
            .done(function (response) {
                alert(response); // Mostrar mensaje de éxito
                listarServicios(); // Actualizar listado de servicios
            })
            .fail(function () {
                alert('Error al eliminar el servicio.');
            });
    }
});
