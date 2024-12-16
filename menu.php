<?php
session_start();

if(!empty($_SESSION)){
   if($_SESSION["rol"] == "admin"){
    $menu = [
        ["label" => "Reservaciones", "url" => "index.php"],
        ["url" => "logout.php", "label" => "Salir"]
    ];
   } 
} else {
    $menu = [
        ["label" => "Reservaciones", "url" => "index.php"],
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