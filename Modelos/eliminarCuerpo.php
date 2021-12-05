<?php
require 'conexion.php';

$conexion->query("DELETE FROM cuerpo_bomberos where id_cuerpo=".$_POST['id']);

echo 'Se elimino correctamente';
?>