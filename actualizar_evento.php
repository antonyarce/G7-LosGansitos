<?php
include("db.php"); // Asegúrate de incluir la conexión a la base de datos

// Verificar que se recibieron los datos necesarios
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    if ($estado == 'rechazado') {
        
// Si el evento es rechazado, solo actualizamos el estado
        $sql = "UPDATE eventos SET estado = ? WHERE id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("si", $estado, $id);

            if ($stmt->execute()) {
                echo "Evento rechazado con éxito.";
            } else {
                echo "Error al actualizar el evento.";
            }

            $stmt->close();
        } else {
            echo "Error en la consulta de actualización de evento.";
        }

        
    } else {
            // Actualizar el evento
            $sql = "UPDATE eventos SET estado = ? WHERE id = ?";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("si", $estado, $id);

                if ($stmt->execute()) {
                    echo "Evento aprobado con éxito.";
                } else {
                    echo "Error al actualizar el evento.";
                }
                $stmt->close();
            } else {
                echo "Error en la consulta de actualización de evento.";
            }
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Faltan datos para actualizar el evento.";
}
?>