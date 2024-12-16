<?php
include 'db.php'; // Conexión a la base de datos
session_start();
// Obtener los datos de la solicitud
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$invitados = $_POST['invitados'];
$provincia = $_POST['provincia'];
$direccion = $_POST['direccion'];
$privacidad = $_POST['privacidad'];

$id_usuario = $_SESSION['id_usuario'];

// Crear el evento
$sql_insert = "INSERT INTO eventos (id_usuario, nombre, descripcion, fecha, provincia, direccion, invitados, privacidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("isssssis", $id_usuario, $nombre, $descripcion, $fecha, $provincia, $direccion, $invitados, $privacidad);
$stmt_insert->execute();

echo "Evento creado con éxito.";

?>