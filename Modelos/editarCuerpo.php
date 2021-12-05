<?php
require 'conexion.php';

if(isset($_POST['tel1']) && isset($_POST['tel2']) && isset($_POST['hombre']) && isset($_POST['camion']) && isset($_POST['cisterna']) && isset($_POST['helicoptero'])){
  
   
    $conexion->query("UPDATE cuerpo_bomberos SET
    tel_emer1='".$_POST['tel1']."',
    tel_emer2='".$_POST['tel2']."',
    no_hombres='".$_POST['hombre']."',
    no_camiones='".$_POST['camion']."',
    no_cisternas='".$_POST['cisterna']."',
    no_helicoptero='".$_POST['helicoptero']."'
    
    where id_cuerpo=".$_POST['id']);
    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER'] . "?success");
}              

