<?php

require_once "OperacionDB.php";
require_once "Carrito.php";

//Relaciones entre tablas
require_once "Usuario.php";
require_once "Medicamento.php";
require_once "Presentacion.php";


/*   Manejador de la clase at�mica Carrito   */

class ManejadorCarrito {


public function insertarCarrito (Carrito $m) {
	$db = new OperacionDB();
	$query="INSERT INTO carrito (id_usuario,id_medicamento) VALUES (" .
	"'" . $m->getId_usuario() . "'" . ", " .
	"'" . $m->getId_medicamento() . "'" .
	")";
// echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function modificarCarrito (Carrito $m) {
	$db = new OperacionDB();
	$query="UPDATE carrito SET id_usuario='" . $m->getId_usuario() . "'" .
	", " . "id_medicamento='" . $m->getId_medicamento() . "'" .
	", " . "fecha=now()" .
	" WHERE 1=1 AND id_usuario='" . $m->getId_usuario() . "'" .
	" AND id_medicamento='" . $m->getId_medicamento() . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function eliminarCarrito ($id_usuario, $id_medicamento) {
	$db = new OperacionDB();
	$query="DELETE FROM carrito WHERE id_usuario=" . $id_usuario  .
	" AND id_medicamento=" . $id_medicamento ;
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function buscarCarrito ( $id_usuario, $id_medicamento ) {
	$carrito = new Carrito();
	$db = new OperacionDB();
	$query="SELECT c.id_usuario, u.nombre, u.apellido, u.correo, u.password, " .
	"c.id_medicamento, m.nombre, m.descripcion, m.existencia, m.precio, m.imagen, " .
	"p.id_presentacion, p.nb_presentacion FROM carrito c join medicamento m on c.id_medicamento = m.id_medicamento " .
	"join usuarios u on c.id_usuario = u.id_usuario join presentacion p on m.id_presentacion = p.id_presentacion " .
	"WHERE c.id_usuario='" . $id_usuario . "'" . " AND id_medicamento='" . $id_medicamento . "'";
//echo "query: " . $query;
	$result = $db->runSelect($query);


	if (count($result)) {

		$x=0;

		//Uso del Modelo
		$usuario = new usuario();

		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setapellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);

		$presentacion = new Presentacion();

		$presentacion->setId_presentacion($result[$x]["id_presentacion"]);
		$presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);

		$medicamento = new Medicamento();

		$medicamento->setId_medicamento($result[$x]["id_medicamento"]);
		$medicamento->setNombre($result[$x]["nombre"]);
		$medicamento->setDescripcion($result[$x]["descripcion"]);
		$medicamento->setExistencia($result[$x]["existencia"]);
		$medicamento->setPrecio($result[$x]["precio"]);
		$medicamento->setId_presentacion($result[$x]["id_presentacion"]);
		$medicamento->setImagen($result[$x]["imagen"]);

		$medicamento->setPresentacion($presentacion);


		$x=0;
		$carrito->setId_usuario($result[$x]["id_usuario"]);
		$carrito->setId_medicamento($result[$x]["id_medicamento"]);

		$carrito->setUsuario($usuario);
		$carrito->setMedicamento($medicamento);


	}

	return $carrito;

}

public function obtenerListaCarrito($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query = "SELECT carrito.id_usuario, usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.password, " .
    "carrito.id_medicamento, " .
	"medicamento.nombre as nombre_medicamento, medicamento.descripcion, medicamento.existencia, medicamento.precio, medicamento.imagen " .
    /*"presentacion.id_presentacion, presentacion.nb_presentacion " .*/
    "FROM ((carrito " .
	"INNER JOIN usuarios ON carrito.id_usuario = usuarios.id_usuario) " .
    "INNER JOIN medicamento ON carrito.id_medicamento = medicamento.id_medicamento) " .
    // "INNER JOIN presentacion ON medicamento.id_presentacion = presentacion.id_presentacion) " .
    "WHERE $condicion";

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

		$presentacion = new Presentacion();

		// $presentacion->setId_presentacion($result[$x]["id_presentacion"]);
		// $presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);

		$medicamento = new Medicamento();

		$medicamento->setId_medicamento($result[$x]["id_medicamento"]);
		$medicamento->setNombre($result[$x]["nombre"]);
		$medicamento->setExistencia($result[$x]["existencia"]);
		$medicamento->setPrecio($result[$x]["precio"]);
		// $medicamento->setId_presentacion($result[$x]["id_presentacion"]);
		$medicamento->setDescripcion($result[$x]["descripcion"]);
		$medicamento->setImagen($result[$x]["imagen"]);

		$medicamento->setPresentacion($presentacion);


		$carrito = new Carrito();

		$carrito->setId_usuario($result[$x]["id_usuario"]);
		$carrito->setId_medicamento($result[$x]["id_medicamento"]);

		$carrito->setUsuario($usuario);
		$carrito->setMedicamento($medicamento);

		array_push($arreglo,$carrito);

	}

	return $arreglo;

}


} // Fin class ManejadorCarrito

?>