<?php
require 'conexion.php';

if (isset($_POST['nombre']) && isset($_POST['frecuencia']) && isset($_POST['latitud']) && isset($_POST['longitud'])) {

    $conexion->query("UPDATE zonas SET
    nombre='" . $_POST['nombre'] . "',
    frecuencia='" . $_POST['frecuencia'] . "',
    latitud='" . $_POST['latitud'] . "',
    longitud='" . $_POST['longitud'] . "'
    
    where punto_geo=" . $_POST['id']);

    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER'] . "?success");
}

