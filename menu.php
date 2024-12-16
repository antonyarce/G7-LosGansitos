<?php
session_start();

if(!empty($_SESSION)){
   if($_SESSION["rol"] == "admin"){
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["label" => "Crear Evento", "url" => "agregar_evento.php"],
        ["url" => "misEventos.php", "label" => "Mis Eventos"],
        ["url" => "eventos.php", "label" => "Eventos"],
        ["url" => "servicios.php", "label" => "Servicios"],
        ["url" => "agregar_servicio.php", "label" => "Nuevo Servicio"],
        ["url" => "evento_servicio.php", "label" => "Servicios añadidos"],
        ["url" => "logout.php", "label" => "Salir"]
    ];
   } else {
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["label" => "Crear Evento", "url" => "agregar_evento.php"],
        ["url" => "misEventos.php", "label" => "Mis Eventos"],
        ["url" => "eventos.php", "label" => "Eventos"],
        ["url" => "servicios.php", "label" => "Servicios"],
        ["url" => "logout.php", "label" => "Salir"]
    ];
   }
} else {
    $menu = [
        ["label" => "Login", "url" => " login.php"],
    ];
    
}

?>
<nav>
    <ul class="menu">
        <?php
        foreach ($menu  as $item) { ?>
            <li class="menu-item"><a href="<?php echo $item["url"] ?>"><?php echo $item["label"] ?></a></li>
        <?php } ?>
    </ul>
</nav>