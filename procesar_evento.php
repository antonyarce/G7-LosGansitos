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

$id_usuario = $_SESSION['id_usuario'];



// Crear la reserva
$sql_insert = "INSERT INTO eventos (id_usuario, nombre, descripcion, fecha, provincia, direccion, invitados) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("isssssi", $id_usuario, $nombre, $descripcion, $fecha, $provincia, $direccion, $invitados);
$stmt_insert->execute();

echo "Evento creado con éxito.";

?>