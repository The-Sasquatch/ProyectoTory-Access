<?php

require_once "../modelo/ManejadorMedicamento.php";

$manejador = new ManejadorMedicamento();
$datos = $manejador->obtenerListaMedicamento();

require_once "../vista/medicamento_consultar.php";

?>