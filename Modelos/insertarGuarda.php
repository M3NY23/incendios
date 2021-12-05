<?php
require 'conexion.php';

if(isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['direccion'])&& isset($_POST['antiguedad'])
&& isset($_POST['rol']) && isset($_POST['contraseña']) && isset($_POST['punto_geo'])){

    $conexion->query("INSERT INTO guardas (dni_guarda,nombre,telefono,direccion,antiguedad_anios,rol,contraseña,punto_geo)
        values (
            '".$_POST['dni']."',
            '".$_POST['nombre']."',
            '".$_POST['telefono']."',
            '".$_POST['direccion']."',
            '".$_POST['antiguedad']."',
            '".$_POST['rol']."',
            '".$_POST['contraseña']."',
            '".$_POST['punto_geo']."'
        )
    ")or die($conexion->error);
    // header("Location: ./zonas?success");
    header("Refresh:0; url=".$_SERVER['HTTP_REFERER']."?success");

}else{
    header("Location: ./Vistas/modulos/guardas?error=Favor de llenar todos los campos");
}

