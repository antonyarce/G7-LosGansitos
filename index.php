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
                <h1> Nuevo Evento</h1>

                <form id="eventoForm" class="row g-3">
                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion">
                    </div>

                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" id="fecha" name="fecha">
                    </div>

                    <div class="col-md-6">
                        <label for="invitados" class="form-label">Numero de invitados</label>
                        <input type="int" class="form-control" id="invitados">
                    </div>

                    <div class="col-md-4">
                        <label for="provincia" class="form-label">Provincia</label>
                        <select type="text" id="provincia" class="form-select">
                            <option selected>San José</option>
                            <option>Cartago</option>
                            <option>Heredia</option>
                            <option>Alajuela</option>
                            <option>Limón</option>
                            <option>Puntarenas</option>
                            <option>Guanacaste</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="1234 Barrio A">
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Subir imagen</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Crear evento</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include("footer.php") ?>

</body>

</html>