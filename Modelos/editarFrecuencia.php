<?php
require 'conexion.php';

if (isset($_POST['frecuencia'])) {

    $conexion->query("UPDATE frecuencias SET

    frecuencia_zona='" . $_POST['frecuencia'] . "'

    where id_frecuencia=" . $_POST['id']);

    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER'] . "?success");
}

