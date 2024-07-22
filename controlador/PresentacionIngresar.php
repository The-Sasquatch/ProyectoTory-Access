<?php

require_once "../modelo/ManejadorPresentacion.php";

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){
	
	$id_presentacion=$_POST["id_presentacion"];
	$nb_presentacion=$_POST["nb_presentacion"];

	$presentacion= new Presentacion();

	$presentacion->setId_presentacion($id_presentacion);
	$presentacion->setNb_presentacion($nb_presentacion);

	$manejador = new ManejadorPresentacion();
	$operacionValida = $manejador->insertarPresentacion($presentacion);

	if($operacionValida)
		$mensaje="Datos ingresados satisfactoriamente";
	else
		$mensaje="Error en parámetros";

}

require_once "../vista/presentacion_ingresar.php";

?>