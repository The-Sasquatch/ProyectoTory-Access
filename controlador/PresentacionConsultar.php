<?php

require_once "../modelo/ManejadorPresentacion.php";

$manejador = new ManejadorPresentacion();
$datos = $manejador->obtenerListaPresentacion();

require_once "../vista/presentacion_consultar.php";

?>