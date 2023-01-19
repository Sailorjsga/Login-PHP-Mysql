<?php

session_start();

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])){
        $usuario= $_POST["usuario"];
        $password= $_POST["password"];
        $sql= $conexion->query(" select * from usuario where usuario='$usuario' and clave='$password'");

        if ($datos=$sql->fetch_object()){
            $_SESSION["id"]=$datos->id;
            $_SESSION["nom"]=$datos->nombres;
            $_SESSION["ape"]=$datos->apellidos;
            header("Location: inicio.php");
        }else {
            echo "<div class='alert alert-danger'>ACCESO DENEGADO</div>";
        }

    } else {
        echo "<div class='alert alert-warning'>Campos Vacios</div>";
    }
}

?>