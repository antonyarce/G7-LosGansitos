<?php
include("db.php"); // Asegúrate de incluir la conexión a la base de datos

// Verificar que se recibieron los datos necesarios
if (isset($_POST['id'])) {
    $id = $_POST['id'];


    // Eliminar servicio
    $sql = "DELETE FROM servicios WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i",  $id);

        if ($stmt->execute()) {
            echo "Servicio eliminado con éxito.";
        } else {
            echo "Error al eliminar el servicio.";
        }
        $stmt->close();
    } else {
        echo "Error en la consulta.";
    }


    // Cerrar la conexión
    $conn->close();
} else {
    echo "Faltan datos para eliminar el servicio.";
}
?>