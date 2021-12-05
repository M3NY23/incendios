<?php
require 'conexion.php';

if(isset($_POST['tel1']) && isset($_POST['tel2']) && isset($_POST['hombre']) && isset($_POST['camion']) && isset($_POST['cisterna']) && isset($_POST['helicoptero'])){

    $conexion->query("INSERT INTO cuerpo_bomberos (tel_emer1,tel_emer2,no_hombres,no_camiones,no_cisternas,no_helicoptero)
        values (
            '".$_POST['tel1']."',
            '".$_POST['tel2']."',
            '".$_POST['hombre']."',
            '".$_POST['camion']."',
            '".$_POST['cisterna']."',
            '".$_POST['helicoptero']."'
        )
    ")or die($conexion->error);
    header("Refresh:0; url=".$_SERVER['HTTP_REFERER']."?success");

}else{
    header("Location: ./Vistas/modulos/bomberos?error=Favor de llenar todos los campos");
}

