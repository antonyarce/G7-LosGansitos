<?php 

include("db.php");
session_start();

$sql = "SELECT * FROM usuario WHERE username = '".$_POST["username"]."'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($_POST["username"] ==  $row["username"] && $_POST["password"] == $row["password"]){
            $_SESSION["username"] = $row["username"];
            $_SESSION["rol"] = $row["rol"];
            $_SESSION["id_usuario"] = $row["id"];
            header("Location: index.php");
        } else {
            echo "Clave incorrecta!";
        }
    }
} else {
    echo "El usuario no existe";
}
