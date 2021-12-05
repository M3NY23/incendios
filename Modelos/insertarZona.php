<?php
require 'conexion.php';

if(isset($_POST['nombre']) && isset($_POST['frecuencia']) && isset($_POST['latitud'])&& isset($_POST['longitud'])){

    $conexion->query("INSERT INTO zonas (nombre,frecuencia,latitud,longitud)
        values (
            '".$_POST['nombre']."',
            '".$_POST['frecuencia']."',
            '".$_POST['latitud']."',
            '".$_POST['longitud']."'
        )
    ")or die($conexion->error);
    // header("Location: ./zonas?success");
    header("Refresh:0; url=".$_SERVER['HTTP_REFERER']."?success");

}else{
    header("Location: ./Vistas/modulos/zonas?error=Favor de llenar todos los campos");
}

