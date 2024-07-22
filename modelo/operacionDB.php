<?php

class OperacionDB {

	// Atributos
	private $dsn = "odbc:ProyectoTory";
	private $user = "";
	private $pass = "";
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
	
	private function conexion(){
        try {
            $conexion = new PDO($this->dsn, $this->user, $this->pass, $this->options);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
	}
	
	private function desconexion($conexion){
		$conexion = null;  // Cerramos la conexión
	}
	
	public function runQuery($query){
        try {
            $conexion = $this->conexion();
            $result = $conexion->exec($query);
            $this->desconexion($conexion);
            return $result;
        } catch (PDOException $e) {
            echo "Ocurrió un error en la ejecución del RunQuery: $query - Error: " . $e->getMessage();
        }
	}

	public function runSelect($query){
        try {
            $conexion = $this->conexion();
            $result = $conexion->query($query);
            $arreglo = $result->fetchAll();
            $this->desconexion($conexion);
            return $arreglo;
        } catch (PDOException $e) {
            echo "Ocurrió un error en la ejecución del RunSelect: $query - Error: " . $e->getMessage();
        }
	}
	
} // fin  OperacionDB

?>