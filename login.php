<!DOCTYPE html>
<html lang="es">

<?php
include("head.php")
?>

<body>
    <header>
        <?php include("menu.php") ?>
    </header>
    <main>
        <form method="post" action="procesar_login.php">
            <label>Usuario:</label><br>
            <input type="text" name="username" id="username"><br>
            <label>Clave:</label><br>
            <input type="password" name="password" id="password"><br>
            <button type="submit">Iniciar sesion</button>
        </form>
    </main>

    <?php include("footer.php") ?>

</body>

</html>