<?php
include("db.php"); // Asegúrate de incluir la conexión a la base de datos
session_start(); // Iniciamos sesión para sacar el id_usuario

// Consulta para obtener los eventos del usuario actual
$sql = "SELECT * FROM eventos WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'"; 

$result = $conn->query($sql);

// Verificamos si hay eventos
if ($result->num_rows > 0) {
    // Si existen, los mostramos
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-4 shadow-sm'>
        <div class='card-body'>
            <div class='d-flex flex-row'>
                <!-- Imagen con enlace -->
                <div class='flex-fill me-3'>
                    <a href='evento_servicios.php?id_evento={$row['id']}'>
                        <img src='images/boda1.jpg' alt='Imagen del evento' class='img-fluid rounded' style='height: 300px; object-fit: cover;'>
                    </a>
                </div>
                <!-- Detalles del evento -->
                <div class='flex-fill'>
                    <p><strong>Nombre:</strong> {$row['nombre']}</p>
                    <p><strong>Descripcion:</strong> {$row['descripcion']}</p>
                    <p><strong>Fecha:</strong> {$row['fecha']}</p>
                    <p><strong>Provincia:</strong> {$row['provincia']}</p>
                    <p><strong>Direccion:</strong> {$row['direccion']}</p>
                    <p><strong>Numero de invitados:</strong> {$row['invitados']}</p>
                    <p><strong>Costo estimado en Colones:</strong> {$row['costo']}</p>
                    <p><strong>Estado:</strong> {$row['estado']}</p>
                </div>
            </div>
        </div>
    </div>";
    }
} else {
    echo "<p>No hay eventos.</p>";
}
?>
