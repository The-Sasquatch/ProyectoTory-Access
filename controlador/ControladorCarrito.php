<?php

session_start();

require_once "../modelo/ManejadorCarrito.php";
require_once "../modelo/ManejadorCompra.php";
require_once "../modelo/ManejadorDetalle_compra.php";
require_once "../modelo/ManejadorMedicamento.php";
require_once "../modelo/Carrito.php";
require_once "../modelo/Compra.php";

$man_carrito = new ManejadorCarrito();
$man_compra = new ManejadorCompra();
$man_detalle = new ManejadorDetalle_compra();
$man_medicamento = new ManejadorMedicamento();

$id_usuario = $_SESSION['id_usuario'];
$condicion = "carrito.id_usuario = $id_usuario";


if(isset($_POST['opcion'])){

	$opcion = $_POST['opcion'];

	// eliminar producto del carrito
	if($opcion == 2){
		
		$id_medicamento = $_POST['id_medicamento'];
		
		$man_carrito->eliminarCarrito($id_usuario, $id_medicamento);
		
	}else
	// ingresar producto en detalle_compra
	if($opcion == 1){
		
		$id_medicamento = $_POST['id_medicamento'];
		$cantidad = $_POST['cantidad'];
		
		// tratamiento de la compra
		$cond = "c.id_usuario = $id_usuario";
		$compras = $man_compra->obtenerListaCompra($cond);
		if(count($compras) == 0){
			
			// agraegar una compra NUEVA!!
			$compra = new Compra();
			$compra->setId_usuario($id_usuario);
			
			$man_compra->insertarCompra($compra);

			// busca la ultima compra con la misma condicion anterior
			$compras = $man_compra->obtenerListaCompra($cond);
		}

		$compra = $compras[0];
		$id_compra = $compra->getId_compra();
		
		$detalle_compra = new Detalle_compra();
		$detalle_compra->setId_compra($id_compra);
		$detalle_compra->setId_medicamento($id_medicamento);
		$detalle_compra->setcantidad($cantidad);
		
		$man_detalle->insertarDetalle_compra($detalle_compra);
		
		// eliminar producto del carrito
		$man_carrito->eliminarCarrito($id_usuario,$id_medicamento);
		
		// actualizar inventario
		$medicamento = $man_medicamento->buscarMedicamento($id_medicamento);
		$existencia = $medicamento->getExistencia();
		$existencia = $existencia - $cantidad;
		$medicamento->setExistencia($existencia);
		
		$man_medicamento->modificarMedicamento($medicamento);
		
	}

}

$datos = $man_carrito->obtenerListaCarrito($condicion);

require_once "../vista/carrito_consultar.php";

?>
