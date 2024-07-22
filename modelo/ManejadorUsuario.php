<?php

require_once "operacionDB.php";
require_once "Usuario.php";


/*   Manejador de la clase at�mica usuario   */
class ManejadorUsuario {


public function insertarUsuario (Usuario $m) {
	$db = new OperacionDB();
	$query="INSERT INTO usuarios (nombre, apellido, correo, password) VALUES (" . 
	"'" . $m->getNombre() . "'" . 
	", " . "'" . $m->getApellido() . "'" . 
	", " . "'" . $m->getCorreo() . "'" . 
	", " . "'" . $m->getPassword() . "'" . 
	")";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}

public function modificarUsuario (Usuario $m) {
	$db = new OperacionDB();
	$query="UPDATE usuarios SET nombre='" . $m->getNombre() . "'" . 
	", " . "apellido='" . $m->getApellido() . "'" . 
	", " . "correo='" . $m->getCorreo() . "'" . 
	", " . "password='" . $m->getPassword() . "'" . 
	" WHERE 1=1 AND id_usuario='" . $m->getId_usuario() . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}

public function eliminarUsuario ($id_usuario) {
	$db = new OperacionDB();
	$query="DELETE FROM usuarios WHERE 1=1 AND id_usuario='" . $id_usuario . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}

public function buscarUsuario ( $id_usuario ) {
	$usuario = new Usuario();
	$db = new OperacionDB();
	$query="SELECT id_usuario, nombre, apellido, correo, password FROM usuarios " .
	"WHERE 1=1 AND id_usuario='" . $id_usuario . "'";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;
		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setApellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);

	}

	return $usuario;

}

public function obtenerListaUsuario($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT id_usuario, nombre, apellido, correo, password FROM usuarios " .
	"WHERE $condicion";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	for($x=0; $x<count($result); $x++) {
		$usuario = new Usuario();

		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setApellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);

		array_push($arreglo,$usuario);

	}

	return $arreglo;

}


} // fin class ManejadorUsuario
?>