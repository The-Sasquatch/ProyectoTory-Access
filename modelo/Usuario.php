<?php

/* Clase atomica de la tabla Usuario */
class Usuario {

	/* atributos */
	private $id_usuario;
	private $nombre;
	private $apellido;
	private $correo;
	private $password;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setId_usuario($id_usuario) {
	if ($id_usuario != null) $this->id_usuario = $id_usuario;
	}

	public function setNombre($nombre) {
	if ($nombre != null) $this->nombre = $nombre;
	}
	public function setApellido($apellido) {
	if ($apellido != null) $this->apellido = $apellido;
	}

	public function setCorreo($correo) {
	if ($correo != null) $this->correo = $correo;
	}

	public function setPassword($password) {
	if ($password != null) $this->password = $password;
	}


	
	/* getters */
	public function getId_usuario() { return $this->id_usuario; }

	public function getNombre() { return $this->nombre; }
	
	public function getApellido() { return $this->apellido; }

	public function getCorreo() { return $this->correo; }

	public function getPassword() { return $this->password; }



	public function __toString(){
		return "Clase: Usuario" . 
		"<br>Id_usuario=" . $this->id_usuario . 
		"<br>nombre=" . $this->nombre . 
		"<br>correo=" . $this->correo . 
		"<br>password=" . $this->password . 
		"<br>apellido=" . $this->apellido;
	}

}


?>
