<?php
include 'db.php'; // Conexión a la base de datos

// Obtener los datos de la solicitud
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];


// Crear la reserva
$sql_insert = "INSERT INTO servicios (nombre, descripcion, costo) VALUES (?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("ssi", $nombre, $descripcion, $costo);
$stmt_insert->execute();

echo "Servicio creado con éxito.";

?>