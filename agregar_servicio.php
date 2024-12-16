<!DOCTYPE html>
<html lang="es">

<?php
include("head.php")
    ?>

<body>
    <!--Encabezados-->
    <header>
        <?php include("menu.php") ?>
    </header>
    <!--Principal-->
    <main>
        <section>
            <div class="container-sm">
                <h1> Nuevo Servicio</h1>

                <form id="servicioForm" class="row g-3">
                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" required>
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" required>
                    </div>

                    <div class="col-md-6">
                        <label for="costo" class="form-label">Costo por invitado en Colones</label>
                        <input type="int" id="costo" name="costo" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Crear servicio</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include("footer.php") ?>

</body>

</html>