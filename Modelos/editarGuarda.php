<?php
require 'conexion.php';

if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['direccion'])&& isset($_POST['antiguedad'])
&& isset($_POST['rol']) && isset($_POST['contraseña']) && isset($_POST['punto_geo'])) {

    $conexion->query("UPDATE guardas SET
    dni_guarda='" . $_POST['dni'] . "',
    nombre='" . $_POST['nombre'] . "',
    telefono='" . $_POST['telefono'] . "',
    direccion='" . $_POST['direccion'] . "',
    antiguedad_anios='" . $_POST['antiguedad'] . "',
    rol='" . $_POST['rol'] . "',
    contraseña='" . $_POST['contraseña'] . "',
    punto_geo='" . $_POST['punto_geo'] . "'
    
    where id_guarda=" . $_POST['id']);

    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER'] . "?success");
}
