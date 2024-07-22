<?php

require_once "OperacionDB.php";
require_once "Presentacion.php";

/*   Manejador de la clase at�mica presentacion   */
class ManejadorPresentacion {

	public function insertarpresentacion (Presentacion $m) {
		
		$db = new OperacionDB();
		$query="INSERT INTO presentacion (nb_presentacion) VALUES (" . 
			"'" . $m->getNb_presentacion() . "'" . ")";
	//echo "query: " . $query;
		$result = $db->runQuery($query);
		
		return $result;

	}

	public function modificarPresentacion (Presentacion $m) {

		$db = new OperacionDB();
		$query="UPDATE presentacion SET nb_presentacion='" . $m->getNb_presentacion() . "'" . 
		" WHERE id_presentacion='" . $m->getId_presentacion() . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}

	public function eliminarPresentacion ($id_presentacion) {

		$db = new OperacionDB();
		$query="DELETE FROM presentacion WHERE id_presentacion='" . $id_presentacion . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}

	public function buscarPresentacion ( $id_presentacion ) {
		$presentacion = new Presentacion();

		$db = new OperacionDB();
		$query="SELECT id_presentacion, nb_presentacion from presentacion " .
			"WHERE id_presentacion='" . $id_presentacion . "'";
	//echo "query: " . $query;
		$result = $db->runSelect($query);
		if (count($result)>0) {

			$x=0;
			$presentacion->setId_presentacion($result[$x]["id_presentacion"]);
			$presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);

		}

		return $presentacion;

	}

	public function obtenerListaPresentacion($condicion='1=1') {
		$arreglo=array();

		$db = new OperacionDB();
		$query="SELECT id_presentacion, nb_presentacion FROM presentacion WHERE $condicion ORDER BY nb_presentacion";
	//echo "query: " . $query;
		$result = $db->runSelect($query);

		for($x=0; $x<count($result); $x++) {
			$presentacion = new Presentacion();

			$presentacion->setId_presentacion($result[$x]["id_presentacion"]);
			$presentacion->setNb_presentacion($result[$x]["nb_presentacion"]);

			array_push($arreglo,$presentacion);

		}

		return $arreglo;

	}
	
	public function combopresentacion($valor=0){
		$arreglo=$this->obtenerListaPresentacion();
		$etiqueta="<select name='id_presentacion' id='id__presentacion' class='w3-select w3-border'>" . 
			"\n<option value=''>Seleccione</option>";
		for($x=0; $x<count($arreglo); $x++){
			$cateoria = $arreglo[$x];
			$id_presentacion = $cateoria->getId_presentacion();
			$nb_presentacion = $cateoria->getNb_presentacion();
			if($id_presentacion == $valor)
				$sel = " selected ";
			else
				$sel = "";
			$etiqueta .= "\n<option value='" . $id_presentacion . "'" . $sel . ">";
			$etiqueta .= $nb_presentacion . "</option >";
		}
		$etiqueta .= "</select>";
		
		return $etiqueta;
	}

}

?>