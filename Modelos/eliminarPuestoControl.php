<?php

require 'conexion.php';

$conexion->query("DELETE FROM puestos_control WHERE id_puesto=".$_POST['id']);

echo 'Se elimino correctamente';

?>
