<?php

session_start();

require_once "../modelo/ManejadorDetalle_compra.php";
require_once "../modelo/ManejadorCompra.php";
require_once "../modelo/Compra.php";

$man_detalle = new ManejadorDetalle_compra();
$man_compra = new ManejadorCompra();

$id_usuario = $_SESSION['id_usuario'];
$condicion = "usuarios.id_usuario = $id_usuario";

$hoy = date("Y") . "/" . date("m") . "/" . date("d");

if(isset($_POST['opcion'])){
	
	$opcion = $_POST['opcion'];
	if($opcion == '99'){

		$id_compra = $_POST['id_compra'];
		
		$compra = new Compra();
		$compra->setId_compra($id_compra);
		$compra->setId_Usuario($id_usuario);
		$compra->setFecha($hoy);
		
		$man_compra->modificarCompra($compra);
	}
	
}


$datos = $man_detalle->obtenerListaDetalle_compra($condicion);
$nuevo_id_compra = $datos[0]->getId_compra();
$fecha = $man_compra->buscarCompra($nuevo_id_compra)->getFecha();

require_once "../vista/detalle_compra_consultar.php";

?>
