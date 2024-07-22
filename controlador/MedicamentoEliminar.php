<?php

require_once "../modelo/ManejadorMedicamento.php";

$manejador = new ManejadorMedicamento();

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){

	$id_medicamento=$_POST["id_medicamento"];

	$operacionValida=$manejador->eliminarMedicamento($id_medicamento);
	if ($operacionValida)
		$mensaje="Eliminación exitosa";
	else
		$mensaje="Error durante la eliminación";
}

$datos = $manejador->obtenerListamedicamento();

require_once "../vista/medicamento_consultar.php";

?>