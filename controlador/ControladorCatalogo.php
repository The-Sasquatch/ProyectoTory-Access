<?php

session_start();

require_once "../modelo/ManejadorMedicamento.php";
require_once "../modelo/ManejadorPresentacion.php";
require_once "../modelo/ManejadorCarrito.php";
require_once "../modelo/Carrito.php";

$manejador = new ManejadorMedicamento();
$man_presentacion = new ManejadorPresentacion();
$man_carrito = new ManejadorCarrito();

$id_presentacion = "";
$condicion = "1=1";
$condicion_presentacion = '1=1';

if(isset($_POST['id_presentacion']) && $_POST['id_presentacion'] != ""){
	$id_presentacion = $_POST['id_presentacion'];
	$condicion_presentacion = "medicamento.id_presentacion = '$id_presentacion'";
}


// agregar Medicamento al carrito
if(isset($_POST['opcion'])){

	$id_usuario = $_SESSION['id_usuario'];
	$hoy = date("m/d/Y");

	$opcion = $_POST['opcion'];
	if($opcion == 1){
		
		$carrito = new Carrito();
		$carrito->setId_usuario($id_usuario);
		$carrito->setId_Medicamento($_POST['id_medicamento']);
		
		$man_carrito->insertarCarrito($carrito);
		
	}
}

// filtrar los prodctos con los incluidos en el carrito
if(isset($_SESSION['id_usuario'])){
	$id_usuario = $_SESSION['id_usuario'];
	$condicion .= " AND id_medicamento NOT IN " .
		"(SELECT id_medicamento FROM carrito WHERE id_usuario = $id_usuario)";
}

$cbo_nu_presentacion = $man_presentacion->comboPresentacion($id_presentacion);

$datos = $manejador->obtenerListaMedicamento($condicion_presentacion);

require_once "../vista/catalogo_consultar.php";

?>
