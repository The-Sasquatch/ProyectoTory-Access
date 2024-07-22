<?php

require_once "OperacionDB.php";
require_once "Detalle_compra.php";

//Relaciones entre tablas
require_once "Compra.php";
require_once "Usuario.php";
require_once "Medicamento.php";
require_once "Presentacion.php";


/*   Manejador de la clase at�mica Detalle_compra   */
class ManejadorDetalle_compra {


public function insertarDetalle_compra (Detalle_compra $m) {
	$db = new OperacionDB();
	$query="INSERT INTO detalle_compra (id_compra,id_medicamento,cantidad) VALUES (" . 
	"'" . $m->getId_compra() . "'" . 
	", " . "'" . $m->getId_medicamento() . "'" . 
	", " . "'" . $m->getCantidad() . "'" . 
	")";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}

public function modificarDetalle_compra (Detalle_compra $m) {
	$db = new OperacionDB();
	$query="UPDATE detalle_compra SET id_compra='" . $m->getId_compra() . "'" . 
	", " . "id_medicamento='" . $m->getId_medicamento() . "'" . 
	", " . "cantidad='" . $m->getCantidad() . "'" . 
	" WHERE 1=1 AND id_detalle='" . $m->getId_detalle() . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

public function eliminarDetalle_compra ($id_detalle) {
	$db = new OperacionDB();
	$query="DELETE FROM detalle_compra WHERE 1=1 AND id_detalle='" . $id_detalle . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}

public function buscarDetalle_compra ( $id_detalle ) {
	$detalle_compra = new Detalle_compra();
	$db = new OperacionDB();
	$query="SELECT dc.id_detalle, dc.cantidad, c.fecha, " .
	"dc.id_compra, c.id_usuario, " .
	"u.nombre, u.apellido, u._correo, u.password, " .
	"dc.id_medicamento, m.nombre, m.descripcion, m.existencia, m.precio, m.id_presentacion, p.nb_presentacion " .
	"FROM detalle_compra dc".
	"join compra c on dc.id_compra = c.id_compra" .
	"join usuarios u on c.id_usuario = u.id_usuario" .
	"join medicamento m on dc.id_medicamento = m.id_medicamento" .
	"join presentacion p on m.id_presentacion = p.id_presentacion" .
	"WHERE 1=1 AND id_detalle='" . $id_detalle . "'";
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


		$compra = new Compra();
		$compra->setId_compra($result[$x]["id_compra"]);
		$compra->setId_usuario($result[$x]["id_usuario"]);
		$compra->setFecha($result[$x]["fecha"]);

		$compra->setusuario($usuario);

		
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

		
		$detalle_compra->setId_detalle($result[$x]["id_detalle"]);
		$detalle_compra->setId_compra($result[$x]["id_compra"]);
		$detalle_compra->setId_medicamento($result[$x]["id_medicamento"]);
		$detalle_compra->setCantidad($result[$x]["cantidad"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setMedicamento($medicamento);

	}

	return $detalle_compra;

}

public function obtenerListaDetalle_compra($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT detalle_compra.id_detalle, detalle_compra.cantidad, detalle_compra.id_compra, detalle_compra.id_medicamento " .
	", compra.fecha, compra.id_usuario " .
	",usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.password " .
	",medicamento.nombre, medicamento.descripcion, medicamento.existencia, medicamento.precio, medicamento.id_presentacion, medicamento.imagen " .
	// ",presentacion.nb_presentacion " .
	"FROM (((detalle_compra ".
	"inner join compra on detalle_compra.id_compra = compra.id_compra) " .
	"left join usuarios on compra.id_usuario = usuarios.id_usuario) " .
	"inner join medicamento on detalle_compra.id_medicamento = medicamento.id_medicamento) " .
	// "inner join presentacion on medicamento.id_presentacion = presentacion.id_presentacion) " . 
	"WHERE $condicion";
// echo "query: " . $query;

	$result = $db->runSelect($query);

	for($x=0; $x<count($result); $x++) {

		//Uso del Modelo
		$usuario = new Usuario();
		$usuario->setId_usuario($result[$x]["id_usuario"]);
		$usuario->setNombre($result[$x]["nombre"]);
		$usuario->setApellido($result[$x]["apellido"]);
		$usuario->setCorreo($result[$x]["correo"]);
		$usuario->setPassword($result[$x]["password"]);


		$compra = new Compra();
		$compra->setId_compra($result[$x]["id_compra"]);
		$compra->setId_usuario($result[$x]["id_usuario"]);
		$compra->setFecha($result[$x]["fecha"]);

		$compra->setusuario($usuario);

		
		$presentacion = new Presentacion();
		$presentacion->setid_presentacion($result[$x]["id_presentacion"]);
		// $presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);


		$medicamento = new Medicamento();
		$medicamento->setId_medicamento($result[$x]["id_medicamento"]);
		$medicamento->setNombre($result[$x]["nombre"]);
		$medicamento->setDescripcion($result[$x]["descripcion"]);
		$medicamento->setExistencia($result[$x]["existencia"]);
		$medicamento->setPrecio($result[$x]["precio"]);
		$medicamento->setId_presentacion($result[$x]["id_presentacion"]);
		$medicamento->setImagen($result[$x]["imagen"]);

		$medicamento->setPresentacion($presentacion);

	
		$detalle_compra = new Detalle_compra();

		$detalle_compra->setId_detalle($result[$x]["id_detalle"]);
		$detalle_compra->setId_compra($result[$x]["id_compra"]);
		$detalle_compra->setId_medicamento($result[$x]["id_medicamento"]);
		$detalle_compra->setCantidad($result[$x]["cantidad"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setMedicamento($medicamento);


		array_push($arreglo,$detalle_compra);

	}

	return $arreglo;

}


} // Fin class ManejadorDetalle_compra

?>