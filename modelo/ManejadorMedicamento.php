<?php

require_once "OperacionDB.php";
require_once "Medicamento.php";

//Relaciones entre tablas
require_once "Presentacion.php";


/*   Manejador de la clase at�mica medicamento   */

class ManejadorMedicamento {

public function insertarMedicamento (Medicamento $m) {
	$db = new OperacionDB();
	$query="INSERT INTO medicamento (nombre,existencia,precio,id_presentacion,descripcion,imagen) ".
	"VALUES (" . "'" . $m->getNombre() . "'" . 
	", " . "'" . $m->getExistencia() . "'" . 
	", " . "'" . $m->getPrecio() . "'" . 
	", " . "'" . $m->getId_presentacion() . "'" . 
	", " . "'" . $m->getDescripcion() . "'" . 
	", " . "'" . $m->getImagen() . "'" . 
	")";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}

public function modificarMedicamento (Medicamento $m) {
	$db = new OperacionDB();
	$query="UPDATE medicamento SET nombre='" . $m->getNombre() . "'" . 
	", " . "existencia=" . $m->getExistencia() . 
	", " . "precio=" . $m->getPrecio() . 
	", " . "id_presentacion=" . $m->getId_presentacion() . 
	", " . "descripcion='" . $m->getDescripcion() . "'" . 
	", " . "imagen='" . $m->getImagen() . "'" . 
	" WHERE id_medicamento=" . $m->getId_medicamento() ;
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}

public function eliminarMedicamento ($id_medicamento) {
	$db = new OperacionDB();
	$query="DELETE FROM medicamento WHERE id_medicamento=" . $id_medicamento . "";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}

public function buscarMedicamento ( $id_medicamento ) {
	$medicamento = new Medicamento();
	$db = new OperacionDB();
	$query="SELECT medicamento.id_medicamento, medicamento.nombre, medicamento.descripcion, medicamento.existencia, medicamento.precio, ".
	"medicamento.id_presentacion, medicamento.imagen ".
	// ", presentacion.nb_presentacion " .
	"FROM medicamento " .
	// "inner join presentacion on medicamento.id_presentacion = presentacion.id_presentacion " .
	"WHERE medicamento.id_medicamento= " . $id_medicamento ;
//echo "query: " . $query;
	$result = $db->runSelect($query);
	
	if (count($result) > 0) {

		$x=0;

		//Uso del Modelo
		$presentacion = new Presentacion();

		$presentacion->setId_presentacion($result[$x]["id_presentacion"]);
		// $presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);

		$medicamento->setId_medicamento($result[$x]["id_medicamento"]);
		$medicamento->setNombre($result[$x]["nombre"]);
		$medicamento->setDescripcion($result[$x]["descripcion"]);
		$medicamento->setExistencia($result[$x]["existencia"]);
		$medicamento->setPrecio($result[$x]["precio"]);
		$medicamento->setId_presentacion($result[$x]["id_presentacion"]);
		$medicamento->setImagen($result[$x]["imagen"]);
		
		$medicamento->setPresentacion($presentacion);

	}

	return $medicamento;

}

public function obtenerListamedicamento($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT id_medicamento, nombre, descripcion, existencia, precio, ".
	"id_presentacion,  imagen " . 
	"FROM medicamento " .
	"WHERE $condicion";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	for($x=0; $x<count($result); $x++) {

		//Uso del Modelo
		$presentacion = new Presentacion();

		$presentacion->setId_presentacion($result[$x]["id_presentacion"]);


		$medicamento = new Medicamento();

		$medicamento->setId_medicamento($result[$x]["id_medicamento"]);
		$medicamento->setNombre($result[$x]["nombre"]);
		$medicamento->setDescripcion($result[$x]["descripcion"]);
		$medicamento->setExistencia($result[$x]["existencia"]);
		$medicamento->setPrecio($result[$x]["precio"]);
		$medicamento->setId_presentacion($result[$x]["id_presentacion"]);
		$medicamento->setImagen($result[$x]["imagen"]);

		$medicamento->setPresentacion($presentacion);

		array_push($arreglo,$medicamento);

	}

	return $arreglo;

}


} // Fin class Manejadormedicamento

?>