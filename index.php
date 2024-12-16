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
        <div class="container">

            <!-- Hero Section -->
            <section class="hero">
                <h1>¡Hacemos que tus eventos sean inolvidables!</h1>
                <p>En <strong>Los Gansitos</strong>, convertimos tus ideas en momentos memorables.</p>
                <a href="#contacto" class="btn">Contáctanos</a>
            </section>

            <!-- Sobre Nosotros -->
            <section id="sobre-nosotros" class="section">
                <h2>Sobre Nosotros</h2>
                <p>
                    Somos una empresa dedicada a la organización de eventos únicos y personalizados.
                    Con años de experiencia, nos especializamos en crear momentos especiales que
                    queden en la memoria de nuestros clientes.
                </p>
                <img src="images/boda3.jpg" alt="Evento organizado por Los Gansitos">
            </section>

            <!-- Testimonios -->
            <section id="testimonios" class="section">
                <h2>Lo que dicen nuestros clientes</h2>
                <div class="testimonial">
                    <p>"Contratar a Los Gansitos fue la mejor decisión para nuestra boda. Todo salió perfecto y tal como
                        lo soñamos."</p>
                    <span>- Ana G.</span>
                </div>
                <div class="testimonial">
                    <p>"Excelente servicio y atención al detalle. Sin duda, los recomendaré a mis amigos."</p>
                    <span>- Carlos M.</span>
                </div>
            </section>

            <!-- Contacto -->
            <section id="contacto" class="section">
                <h2>Contacto</h2>
                <form action="contacto.php" method="POST" class="contact-form">
                    <input type="text" name="nombre" placeholder="Tu Nombre" required>
                    <input type="email" name="email" placeholder="Tu Correo Electrónico" required>
                    <textarea name="mensaje" placeholder="Tu Mensaje" rows="5" required></textarea>
                    <button type="submit" class="btn">Enviar</button>
                </form>
            </section>

        </div>

    </main>

    <?php include("footer.php") ?>

</body>

</html>