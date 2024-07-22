<?php

session_start();

require_once "../modelo/ManejadorUsuario.php";

$manejador = new ManejadorUsuario();

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){
	
	$id_usuario=$_POST["id_usuario"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$correo=$_POST["correo"];
	$password=$_POST["password"];

	$usuario = new Usuario();

	$usuario->setId_usuario($id_usuario);
	$usuario->setNombre($nombre);
	$usuario->setapellido($apellido);
	$usuario->setCorreo($correo);
	$usuario->setPassword($password);

	$operacionValida = $manejador->insertarUsuario($usuario);

	if($operacionValida){
		
		$condicion = "correo = '$correo'";
		$usuarios = $manejador->obtenerListaUsuario($condicion);
		
		$usuario = $usuarios[0];
		$_SESSION['id_usuario'] = $usuario->getId_usuario();
		$_SESSION['nombre'] = $usuario->getNombre();
		$_SESSION['correo'] = $usuario->getCorreo();
		
		$mensaje="Bienvenido al sistema, haga click en catalogo para comenzar";
	}else{
		$mensaje="Error en parámetros";
	}

}

require_once "../vista/usuario_ingresar.php";

?>