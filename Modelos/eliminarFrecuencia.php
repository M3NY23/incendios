<?php

require 'conexion.php';

$conexion->query("DELETE FROM frecuencias WHERE id_frecuencia=".$_POST['id']);

echo 'Se elimino correctamente';

?>

