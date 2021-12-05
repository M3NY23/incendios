<?php
require 'conexion.php';

if(isset($_POST['nombre']) && isset($_POST['punto_geo']) && isset($_POST['frecuencia'])&& isset($_POST['dni'])){

    $conexion->query("INSERT INTO puestos_control (nombre_puesto,punto_geo,frecuencia_zona,dni_guarda)
        values (
            '".$_POST['nombre']."',
            '".$_POST['punto_geo']."',
            '".$_POST['frecuencia']."',
            '".$_POST['dni']."'
        )
    ")or die($conexion->error);
    // header("Location: ./zonas?success");
    header("Refresh:0; url=".$_SERVER['HTTP_REFERER']."?success");

}else{
    header("Location: ./Vistas/modulos/puestoControl?error=Favor de llenar todos los campos");
}

