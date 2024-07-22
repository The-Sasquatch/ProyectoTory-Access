<?php

/* Clase atomica de la tabla medicamento */

//Relaciones entre tablas
require_once "Presentacion.php";

class medicamento {

	/* atributos */
	private $id_medicamento;
	private $nombre;
	private $existencia;
	private $precio;
	private $id_presentacion;
	private $descripcion;
	private $imagen;

	//Definicion de objetos como atributos
	private $presentacion;


	/* constructor vacio */
	public function __construct() {	} 

	/* seters  */
	public function setId_medicamento($id_medicamento) {
	if ($id_medicamento != null) $this->id_medicamento = $id_medicamento;
	}

	public function setNombre($nombre) {
	if ($nombre != null) $this->nombre = $nombre;
	}

	public function setExistencia($existencia) {
	if ($existencia != null) $this->existencia = $existencia;
	}

	public function setPrecio($precio) {
	if ($precio != null) $this->precio = $precio;
	}

	public function setId_presentacion($id_presentacion) {
	if ($id_presentacion != null) $this->id_presentacion = $id_presentacion;
	}

	public function setDescripcion($descripcion) {
	if ($descripcion != null) $this->descripcion = $descripcion;
	}

	public function setImagen($imagen) {
	if ($imagen != null) $this->imagen = $imagen;
	}


	//Setters de los objetos
	public function setPresentacion(presentacion $presentacion) {
	$this->presentacion = $presentacion;
	}


	/* getters */
	public function getId_medicamento() { return $this->id_medicamento; }

	public function getNombre() { return $this->nombre; }

	public function getExistencia() { return $this->existencia; }

	public function getPrecio() { return $this->precio; }

	public function getId_presentacion() { return $this->id_presentacion; }

	public function getDescripcion() { return $this->descripcion; }

	public function getImagen() { return $this->imagen; }

	
	//Getters de los objetos
	public function getPresentacion() { return $this->presentacion; }

	
	public function __toString(){
		return "Clase: medicamento" . "<br>id_medicamento=" . $this->id_medicamento . "<br>nombre=" . $this->nombre . "<br>existencia=" . $this->existencia . "<br>precio=" . $this->precio . "<br>id_presentacion=" . $this->id_presentacion . "<br>descripcion=" . $this->descripcion;
	}

}


?>
