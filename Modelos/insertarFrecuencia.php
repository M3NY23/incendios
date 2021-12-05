<?php
require 'conexion.php';

if(isset($_POST['frecuencia'])){

    $conexion->query("INSERT INTO frecuencias (frecuencia_zona)
        values (
            '".$_POST['frecuencia']."'
          
        )
    ")or die($conexion->error);
    header("Refresh:0; url=".$_SERVER['HTTP_REFERER']."?success");

}else{
    header("Location: ./Vistas/modulos/frecuencias?error=Favor de llenar todos los campos");
}

