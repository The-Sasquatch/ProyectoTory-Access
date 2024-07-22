<?php

require_once "../modelo/ManejadorMedicamento.php";
require_once "../modelo/ManejadorPresentacion.php";

$id_presentacion = "";
$imagen = "";

if ((isset($_POST['opcion'])) && ($_POST['opcion'] == '1')){
	
	$id_medicamento=$_POST["id_medicamento"];
	$nombre=$_POST["nombre"];
	$existencia=$_POST["existencia"];
	$precio=$_POST["precio"];
	$id_presentacion=$_POST["id_presentacion"];
	$descripcion=$_POST["descripcion"];
	// $imagen=$_["imagen"];
	
	if(isset($_FILES['imagen'])){

		//datos del arhivo
		$nombre_archivo = $_FILES['imagen']['name'];
		$tipo_archivo = $_FILES['imagen']['type'];
		$tamano_archivo = $_FILES['imagen']['size'];
		
		// indicador de todo bien
		$todo_bien = FALSE;
		$ruta = "../medicamentos";

		//compruebo si las caracter�sticas del archivo son las que deseo
		if (!((strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
			$mensaje="Error en parámetros - Se permiten archivos jpeg, jpg o png, con un tamaño de 100 Kb máximo";
		}else{
			if (move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta . "/" . $nombre_archivo)){
				$imagen=$nombre_archivo;
				$todo_bien = TRUE;
			}else{
				$mensaje="Error en parámetros - no se pudo subir el archivo";
				$imagen = "Sin imagen.png";
			}
		}

	}
		
	
	$medicamento= new Medicamento();

	$medicamento->setId_medicamento($id_medicamento);
	$medicamento->setNombre($nombre);
	$medicamento->setExistencia($existencia);
	$medicamento->setPrecio($precio);
	$medicamento->setId_presentacion($id_presentacion);
	$medicamento->setDescripcion($descripcion);
	$medicamento->setImagen($imagen);

	$manejador = new ManejadorMedicamento();

	$operacionValida = $manejador->insertarMedicamento($medicamento);

	if($operacionValida)
		$mensaje="Datos ingresados satisfactoriamente";
	else
		$mensaje="Error en parámetros";

}

$manPresentacion = new ManejadorPresentacion();
$cbo_nu_presentacion = $manPresentacion->comboPresentacion();

require_once "../vista/medicamento_ingresar.php";

?>