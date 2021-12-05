<?php
require 'conexion.php';

if (isset($_POST['nombre']) && isset($_POST['punto_geo']) && isset($_POST['frecuencia']) && isset($_POST['dni'])) {

    $conexion->query("UPDATE puestos_control SET
    nombre_puesto='" . $_POST['nombre'] . "',
    punto_geo='" . $_POST['punto_geo'] . "',
    frecuencia_zona='" . $_POST['frecuencia'] . "',
    dni_guarda='" . $_POST['dni'] . "'
    
    where id_puesto=" . $_POST['id']);

    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER'] . "?success");
}

