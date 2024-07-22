<?php

/* Clase atomica de la tabla Compra */

//Relaciones entre tablas
require_once "Usuario.php";

class Compra {

	/* atributos */
	private $id_compra;
	private $id_usuario;
	private $fecha;

	//Definicion de objetos como atributos
	private $usuario;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setId_compra($id_compra) {
	if ($id_compra != null) $this->id_compra = $id_compra;
	}

	public function setId_usuario($id_usuario) {
	if ($id_usuario != null) $this->id_usuario = $id_usuario;
	}

	public function setFecha($fecha) {
	if ($fecha != null) $this->fecha = $fecha;
	}


	//Setters de los objetos
	public function setUsuario(Usuario $usuario) {
	$this->usuario = $usuario;
	}


	/* getters */
	public function getId_compra() { return $this->id_compra; }

	public function getId_usuario() { return $this->id_usuario; }

	public function getFecha() { return $this->fecha; }

	//Getters de los objetos
	public function getUsuario() { return $this->usuario; }


	public function __toString(){
		return "Clase: Compra" .
		"<br>id_compra=" . $this->id_compra . 
		"<br>id_usuario=" . $this->id_usuario . 
		"<br>fecha=" . $this->fecha 
		;
	}

}

/* Generado por crearclass. Douglosky Barriosnovick */

?>
