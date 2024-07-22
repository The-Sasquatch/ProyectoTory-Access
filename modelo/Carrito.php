<?php

/* Clase atomica de la tabla Carrito */

//Relaciones entre tablas
require_once "Usuario.php";
require_once "Medicamento.php";

class Carrito {

	/* atributos */
	private $id_usuario;
	private $id_medicamento;

	//Definicion de objetos como atributos
	private $usuario;
	private $medicamento;


	/* constructor vacio */
	public function __construct() {	} 

	/* seters  */
	public function setId_usuario($id_usuario) {
	if ($id_usuario != null) $this->id_usuario = $id_usuario;
	}

	public function setId_medicamento($id_medicamento) {
	if ($id_medicamento != null) $this->id_medicamento = $id_medicamento;
	}


	//Setters de los objetos
	public function setUsuario(Usuario $usuario) {
	$this->usuario = $usuario;
	}

	public function setMedicamento(Medicamento $medicamento) {
	$this->medicamento = $medicamento;
	}


	/* getters */
	public function getId_usuario() { return $this->id_usuario; }

	public function getId_medicamento() { return $this->id_medicamento; }


	//Getters de los objetos
	public function getUsuario() { return $this->usuario; }

	public function getMedicamento() { return $this->medicamento; }


	public function __toString(){
		return "Clase: Carrito" . "<br>Id_usuario=" . $this->id_usuario . 
		"<br>Id_medicamento=" . $this->id_medicamento 
		;
	}

} // Fin class Carrito


?>
