<?php
include("db.php"); // Conexión a la base de datos
session_start();

// Consulta para obtener los servicios
$sqlServicios = "SELECT * FROM servicios";
$resultServicios = $conn->query($sqlServicios);

// Consulta para obtener los eventos
$sqlEventos = "SELECT id, nombre FROM eventos WHERE id_usuario ='".$_SESSION['id_usuario']."'";
$resultEventos = $conn->query($sqlEventos);

// Verificamos si hay servicios
if ($resultServicios->num_rows > 0) {
    while ($rowServicio = $resultServicios->fetch_assoc()) {
        echo "<div class='card mb-4 shadow-sm'>
            <div class='card-body'>
                <div class='d-flex flex-row'>
                    <!-- Imagen -->
                    <div class='flex-fill me-3'>
                        <img src='images/boda2.jpg' alt='Imagen del servicio' class='img-fluid rounded' style='height: 300px; object-fit: cover;'>
                    </div>
                    <!-- Detalles del servicio -->
                    <div class='flex-fill'>
                        <p><strong>Nombre:</strong> {$rowServicio['nombre']}</p>
                        <p><strong>Descripción:</strong> {$rowServicio['descripcion']}</p>
                        <p><strong>Costo por invitado en Colones:</strong> {$rowServicio['costo']}</p>
                        
                        <!-- Menú desplegable de eventos -->
                        <form action='agregar_evento_servicio.php' method='POST'>
                            <input type='hidden' name='id_servicio' value='{$rowServicio['id']}'>
                            <label for='id_evento{$rowServicio['id']}'>Seleccionar evento:</label>
                            <select name='id_evento' id='id_evento_{$rowServicio['id']}' class='form-select mb-3'>";
                                if ($resultEventos->num_rows > 0) {
                                    $resultEventos->data_seek(0); // Reinicia el puntero del resultado
                                    while ($rowEvento = $resultEventos->fetch_assoc()) {
                                        echo "<option value='{$rowEvento['id']}'>{$rowEvento['nombre']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay eventos disponibles</option>";
                                }
        echo "              </select>
                            <button type='submit' class='btn btn-success'>Agregar</button>
                        </form>
                    </div>
                </div>";
                if ($_SESSION['rol'] == 'admin') {
                echo "<button class='btn btn-danger eliminar' data-id='{$rowServicio['id']}' >Eliminar</button>";
                }
                echo "
            </div>
        </div>";
    }
} else {
    echo "<p>No hay servicios disponibles.</p>";
}
?>
