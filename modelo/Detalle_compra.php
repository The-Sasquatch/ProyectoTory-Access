<?php

/* Clase atomica de la tabla Detalle_compra */

//Relaciones entre tablas
require_once "Compra.php";
require_once "Medicamento.php";


class Detalle_compra {

	/* atributos */
	private $id_detalle;
	private $id_compra;
	private $id_medicamento;
	private $cantidad;


	//Definicion de objetos como atributos
	private $compra;
	private $medicamento;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setId_detalle($id_detalle) {
	if ($id_detalle != null) $this->id_detalle = $id_detalle;
	}

	public function setId_compra($id_compra) {
	if ($id_compra != null) $this->id_compra = $id_compra;
	}

	public function setId_medicamento($id_medicamento) {
	if ($id_medicamento != null) $this->id_medicamento = $id_medicamento;
	}

	public function setCantidad($cantidad) {
	if ($cantidad!= null) $this->cantidad = $cantidad;
	}



	//Setters de los objetos
	public function setCompra(Compra $compra) {
	$this->compra = $compra;
	}

	public function setMedicamento(Medicamento $medicamento) {
	$this->medicamento = $medicamento;
	}


	/* getters */
	public function getId_detalle() { return $this->id_detalle; }

	public function getId_compra() { return $this->id_compra; }

	public function getId_medicamento() { return $this->id_medicamento; }

	public function getCantidad() { return $this->cantidad; }


	//Getters de los objetos
	public function getCompra() { return $this->compra; }

	public function getMedicamento() { return $this->medicamento; }


	public function __toString(){
		return "Clase: Detalle_compra" . 
		"<br>id_detalle=" . $this->id_detalle . 
		"<br>id_compra=" . $this->id_compra . 
		"<br>id_medicamento=" . $this->id_medicamento . 
		"<br>cantidad=" . $this->cantidad ;
	}

} // Fin class Detalle_compra

/* Generado por crearclass. Douglosky Barriosnovick */

?>
