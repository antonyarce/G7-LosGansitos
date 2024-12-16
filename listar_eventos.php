<?php
include("db.php"); // Asegúrate de incluir la conexión a la base de datos
session_start();


if ($_SESSION['rol'] == 'admin') {
    // Consulta para obtener las reservas pendientes
    $sql = "SELECT * FROM eventos"; // Stodos los eventos

    $result = $conn->query($sql);

    // Verificamos si hay eventos
    if ($result->num_rows > 0) {
        // Si existen, las mostramos
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4 shadow-sm'>
    <div class='card-body'>
        <div class='d-flex flex-row'>
            <!-- Imagen -->
            <div class='flex-fill me-3'>
                <img src='images/boda1.jpg' alt='Imagen del evento' class='img-fluid rounded' style='height: 300px; object-fit: cover;'>
            </div>
            <!-- Detalles del evento -->
            <div class='flex-fill'>
                <p><strong>Nombre:</strong> {$row['nombre']}</p>
                <p><strong>Descripcion:</strong> {$row['descripcion']}</p>
                <p><strong>Fecha:</strong> {$row['fecha']}</p>
                <p><strong>Provincia:</strong> {$row['provincia']}</p>
                <p><strong>Direccion:</strong> {$row['direccion']}</p>
                <p><strong>Numero de invitados:</strong> {$row['invitados']}</p>
                <p><strong>Estado:</strong> {$row['estado']}</p>
            </div>
        </div>
        <!-- Botones -->
        <div class='mt-3 text-end'>
            <button class='btn btn-success me-2 aprobar' data-id='{$row['id']}'>Aprobar</button>
            <button class='btn btn-danger rechazar' data-id='{$row['id']}'>Rechazar</button>
        </div>
    </div>
</div>";
        }
    } else {
        echo "<p>No hay eventos.</p>";
    }

} else {

    // Consulta para obtener las reservas pendientes
    $sql = "SELECT * FROM eventos WHERE privacidad = 'publico'"; // Stodos los eventos

    $result = $conn->query($sql);

    // Verificamos si hay eventos
    if ($result->num_rows > 0) {
        // Si existen, las mostramos
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4 shadow-sm'>
    <div class='card-body'>
        <div class='d-flex flex-row'>
            <!-- Imagen -->
            <div class='flex-fill me-3'>
                <img src='images/boda1.jpg' alt='Imagen del evento' class='img-fluid rounded' style='height: 300px; object-fit: cover;'>
            </div>
            <!-- Detalles del evento -->
            <div class='flex-fill'>
                <p><strong>Nombre:</strong> {$row['nombre']}</p>
                <p><strong>Descripcion:</strong> {$row['descripcion']}</p>
                <p><strong>Fecha:</strong> {$row['fecha']}</p>
                <p><strong>Provincia:</strong> {$row['provincia']}</p>
                <p><strong>Direccion:</strong> {$row['direccion']}</p>
                <p><strong>Numero de invitados:</strong> {$row['invitados']}</p>
                <p><strong>Estado:</strong> {$row['estado']}</p>
            </div>
        </div>
    </div>
</div>";
        }
    } else {
        echo "<p>No hay eventos.</p>";
    }
}
?>