<?php

session_start();

require_once "../modelo/ManejadorMedicamento.php";
require_once "../modelo/ManejadorPresentacion.php";

$manejador = new ManejadorMedicamento();
$man_presentacion = new ManejadorPresentacion();


// destruir parametros de SESSION
$_SESSION['nombre']  = "";
$_SESSION['correo']  = "";

unset($_SESSION['nombre']);
unset($_SESSION['correo']);

session_destroy();


$cbo_nu_presentacion = $man_presentacion->comboPresentacion();

$datos = $manejador->obtenerListaMedicamento();

require_once "../vista/catalogo_consultar.php";

?>