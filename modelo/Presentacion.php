<?php

/* Clase atomica de la tabla Presentacion */
class Presentacion {

	/* atributos */
	private $id_presentacion;
	private $nb_presentacion;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setId_presentacion($id_presentacion) {
	if ($id_presentacion != null) $this->id_presentacion = $id_presentacion;
	}

	public function setNb_presentacion($nb_presentacion) {
	if ($nb_presentacion != null) $this->nb_presentacion = $nb_presentacion;
	}

	
	/* getters */
	public function getId_presentacion() { return $this->id_presentacion; }

	public function getNb_presentacion() { return $this->nb_presentacion; }

	public function __toString(){
		return "Clase: Presentacion" . 
			"<br>Id_presentacion=" . $this->id_presentacion . 
			"<br>Nb_presentacion=" . $this->nb_presentacion;
	}

}


?>
