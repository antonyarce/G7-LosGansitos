<?php
include("db.php"); // Conexión a la base de datos

// Validar si se recibió el parámetro evento_id
if (!isset($_GET['id_evento']) || empty($_GET['id_evento'])) {
    echo "<p>Error: No se recibió un evento válido.</p>";
    exit();
}

$id_evento = intval($_GET['id_evento']);

// Consulta para obtener los servicios añadidos al evento
$sql = "
    SELECT 
        es.id AS id,
        s.nombre AS servicio_nombre,
        s.descripcion AS servicio_descripcion,
        s.costo AS costo_por_persona,
        e.nombre AS evento_nombre,
        e.invitados AS invitados,
        (s.costo * e.invitados) AS costo_total
    FROM 
        cotizaciones es
    INNER JOIN 
        servicios s ON es.id_servicio = s.id
    INNER JOIN 
        eventos e ON es.id_evento = e.id
    WHERE 
        e.id = $id_evento
";

$result = $conn->query($sql);

// Consulta para obtener el nombre del evento
$evento_query = $conn->query("SELECT nombre FROM eventos WHERE id = $id_evento");
$evento = $evento_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios de <?php echo htmlspecialchars($evento['nombre']); ?></title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Servicios de "<?php echo htmlspecialchars($evento['nombre']); ?>"</h1>
    </header>

    <main class="container mt-5">
        <h2 class="mb-4">Lista de Servicios Añadidos</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Servicio</th>
                        <th>Descripción</th>
                        <th>Costo por Persona</th>
                        <th>Número de Invitados</th>
                        <th>Costo Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['servicio_nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['servicio_descripcion']); ?></td>
                            <td>₡<?php echo number_format($row['costo_por_persona'], 2); ?></td>
                            <td><?php echo $row['invitados']; ?></td>
                            <td>₡<?php echo number_format($row['costo_total'], 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay servicios añadidos a este evento.</p>
        <?php endif; ?>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>© 2024 Los Gansitos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
