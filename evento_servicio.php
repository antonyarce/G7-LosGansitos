<?php
include("db.php"); // Conexión a la base de datos
session_start();

// Consulta para obtener los datos de evento_servicio junto con información de eventos y servicios
$sql = "
    SELECT 
        es.id AS id,
        e.nombre AS evento_nombre,
        s.nombre AS servicio_nombre,
        e.invitados AS invitados,
        s.costo AS costo_por_persona,
        (e.invitados * s.costo) AS costo_total
    FROM 
        cotizaciones es
    INNER JOIN 
        eventos e ON es.id_evento = e.id
    INNER JOIN 
        servicios s ON es.id_servicio = s.id
    ORDER BY 
        es.id ASC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaciones Evento-Servicio</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Servicios añadidos</h1>
    </header>

    <main class="container mt-5">
        <h2 class="mb-4">Lista de Entradas</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Evento</th>
                        <th>Servicio</th>
                        <th>Invitados</th>
                        <th>Costo por Persona</th>
                        <th>Costo Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['evento_nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['servicio_nombre']); ?></td>
                            <td><?php echo $row['invitados']; ?></td>
                            <td>₡<?php echo number_format($row['costo_por_persona'], 2); ?></td>
                            <td>₡<?php echo number_format($row['costo_total'], 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay relaciones entre eventos y servicios registradas.</p>
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
