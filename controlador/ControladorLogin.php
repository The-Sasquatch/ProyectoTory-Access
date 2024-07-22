<?php

session_start();

require_once "../modelo/ManejadorUsuario.php";

$manejador = new ManejadorUsuario();

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){
	
	$correo=$_POST["correo"];
	$password=$_POST["password"];
	
	$condicion = "correo = '$correo' AND password = '$password'";

	$resultado = $manejador->obtenerListaUsuario($condicion);

	if(count($resultado) > 0){
		
		$usuario = $resultado[0];
		$_SESSION['id_usuario'] = $usuario->getId_usuario();
		$_SESSION['nombre'] = $usuario->getNombre();
		$_SESSION['correo'] = $usuario->getCorreo();
		$mensaje="Bienvenido al sistema, haga click en catalogo para comenzar";
		
	}else{
		$mensaje="Error en parámetros";
	}

}

require_once "../vista/usuario_login.php";

?>