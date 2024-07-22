<?php

require_once "OperacionDB.php";
require_once "Compra.php";

//Relaciones entre tablas
require_once "Usuario.php";


/*   Manejador de la clase at�mica Compra   */
class ManejadorCompra {


public function insertarCompra (Compra $m) {
	$db = new OperacionDB();
	$query="INSERT INTO compra (id_usuario, fecha) VALUES (" . 
	"'" . $m->getId_usuario() . "'" . 
	", now()" . 
	")";
// echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function modificarCompra (Compra $m) {
	$db = new OperacionDB();
	$query="UPDATE compra SET id_usuario='" . $m->getId_usuario() . "'" . 	
	" WHERE 1=1 AND id_compra='" . $m->getId_compra() . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function eliminarCompra ($id_compra) {
	$db = new OperacionDB();
	$query="DELETE FROM compra WHERE 1=1 AND id_compra='" . $id_compra . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function buscarCompra ( $id_compra ) {
	$compra = new Compra();
	$db = new OperacionDB();
	$query="SELECT compra.id_compra, compra.id_usuario, compra.fecha," .
	"usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.password " .
	"FROM (compra inner join usuarios on compra.id_usuario = usuarios.id_usuario) WHERE compra.id_compra= " . $id_compra ;
//echo "query: " . $query;
	$result = $db->runSelect($query);
	
	if (count($result) > 0) {

		$x=0;

		//Uso del Modelo
		$usuario = new usuario();

		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setApellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);

		$compra->setId_compra($result[$x]["id_compra"]);
		$compra->setId_usuario($result[$x]["id_usuario"]);
		$compra->setFecha($result[$x]["fecha"]);

		$compra->setusuario($usuario);

	}

	return $compra;

}

public function obtenerListaCompra($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT c.id_compra, c.id_usuario, c.fecha, " .
	"u.nombre, u.apellido, u.correo, u.password " .
	"FROM compra c inner join usuarios u on c.id_usuario = u.id_usuario WHERE $condicion";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	for($x=0; $x<count($result); $x++) {

		//Uso del Modelo
		$usuario = new usuario();

		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setApellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);


		$compra = new Compra();

		$compra->setId_compra($result[$x]["id_compra"]);
		$compra->setId_usuario($result[$x]["id_usuario"]);
		$compra->setFecha($result[$x]["fecha"]);

		$compra->setUsuario($usuario);

		array_push($arreglo,$compra);

	}

	return $arreglo;

}


} // Fin class ManejadorCompra

?>