<?php

require_once "../modelo/ManejadorPresentacion.php";

$manejador = new ManejadorPresentacion();

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){

	$id_presentacion=$_POST["id_presentacion"];

	$operacionValida=$manejador->eliminarPresentacion($id_presentacion);
	if ($operacionValida)
		$mensaje="Eliminación exitosa";
	else
		$mensaje="Error durante la eliminación";

}

$datos = $manejador->obtenerListaPresentacion();

require_once "../vista/presentacion_consultar.php";

?>