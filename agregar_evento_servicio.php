<?php
include("db.php"); // Conexión a la base de datos
session_start();

// Verificar que los datos necesarios estén presentes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_evento'], $_POST['id_servicio'])) {
    $id_evento = intval($_POST['id_evento']);
    $id_servicio = intval($_POST['id_servicio']);

    // Obtener el costo del servicio
    $sqlServicio = "SELECT costo FROM servicios WHERE id = ?";
    $stmtServicio = $conn->prepare($sqlServicio);
    $stmtServicio->bind_param("i", $id_servicio);
    $stmtServicio->execute();
    $resultServicio = $stmtServicio->get_result();
    
    if ($resultServicio->num_rows > 0) {
        $rowServicio = $resultServicio->fetch_assoc();
        $costoPorPersona = $rowServicio['costo']; // Costo del servicio por persona

        // Obtener el número de invitados del evento
        $sqlEvento = "SELECT invitados, costo FROM eventos WHERE id = ?";
        $stmtEvento = $conn->prepare($sqlEvento);
        $stmtEvento->bind_param("i", $id_evento);
        $stmtEvento->execute();
        $resultEvento = $stmtEvento->get_result();

        if ($resultEvento->num_rows > 0) {
            $rowEvento = $resultEvento->fetch_assoc();
            $numeroInvitados = $rowEvento['invitados'];
            $costoTotalActual = $rowEvento['costo'];

            // Calcular el nuevo costo total
            $costoServicioTotal = $costoPorPersona * $numeroInvitados; // Costos por persona
            $nuevoCostoTotal = $costoTotalActual + $costoServicioTotal;

            // Insertar el servicio al evento
            $sqlInsert = "INSERT INTO cotizaciones (id_evento, id_servicio) VALUES (?, ?)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("ii", $id_evento, $id_servicio);

            if ($stmtInsert->execute()) {
                // Actualizar el costo total del evento
                $sqlUpdateEvento = "UPDATE eventos SET costo = ? WHERE id = ?";
                $stmtUpdateEvento = $conn->prepare($sqlUpdateEvento);
                $stmtUpdateEvento->bind_param("di", $nuevoCostoTotal, $id_evento);

                if ($stmtUpdateEvento->execute()) {
                    echo "Servicio agregado y costo actualizado correctamente.";
                } else {
                    echo "Error al actualizar el costo total del evento: " . $conn->error;
                }
                $stmtUpdateEvento->close();
            } else {
                echo "Error al agregar el servicio: " . $conn->error;
            }
            $stmtInsert->close();
        } else {
            echo "Evento no encontrado.";
        }
        $stmtEvento->close();
    } else {
        echo "Servicio no encontrado.";
    }
    $stmtServicio->close();
} else {
    echo "Solicitud inválida.";
}

$conn->close();

// Redirigir a la página de servicios
header("Location: servicios.php");
exit();
?>
