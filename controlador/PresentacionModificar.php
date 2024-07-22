<?php

require_once "../modelo/ManejadorPresentacion.php";

$manejador = new ManejadorPresentacion();

if(isset($_POST['opcion']))
	$opcion=$_POST['opcion'];
else
	$opcion="0";

if($opcion=="2"){

	$id_presentacion=$_POST["id_presentacion"];
	$presentacion=$manejador->buscarPresentacion($id_presentacion);

	$id_presentacion=$presentacion->getId_presentacion();
	$nb_presentacion=$presentacion->getNb_presentacion();

}else if($opcion=="1"){

	$id_presentacion=$_POST["id_presentacion"];
	$nb_presentacion=$_POST["nb_presentacion"];

	$presentacion = new Presentacion();

	$presentacion->setId_presentacion($id_presentacion);
	$presentacion->setNb_presentacion($nb_presentacion);

	$operacionValida=$manejador->modificarPresentacion($presentacion);

	if($operacionValida)
		$mensaje="Datos modificados satisfactoriamente";
	else
		$mensaje="Error en parámetros";

}

require_once "../vista/presentacion_modificar.php";

?>