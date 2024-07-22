<?php

require_once "../modelo/ManejadorMedicamento.php";

$manejador = new ManejadorMedicamento();
require_once "../modelo/ManejadorPresentacion.php";

if(isset($_POST['opcion']))
	$opcion=$_POST['opcion'];
else
	$opcion="0";

if($opcion=="2"){

	$id_medicamento=$_POST["id_medicamento"];

	$medicamento=$manejador->buscarMedicamento($id_medicamento);

	$id_medicamento=$medicamento->getId_medicamento();
	$nombre=$medicamento->getNombre();
	$descripcion=$medicamento->getDescripcion();
	$existencia=$medicamento->getExistencia();
	$precio=$medicamento->getPrecio();
	$id_presentacion=$medicamento->getId_presentacion();
	$imagen=$medicamento->getImagen();
	if($imagen=="") $anterior="Sin imagen.png";
	else $anterior=$imagen;

}else if($opcion=="1"){

	$id_medicamento=$_POST["id_medicamento"];
	$nombre=$_POST["nombre"];
	$descripcion=$_POST["descripcion"];
	$existencia=$_POST["existencia"];
	$precio=$_POST["precio"];
	$id_presentacion=$_POST["id_presentacion"];
	$anterior=$_POST["anterior"];
	if($anterior=="") $anterior="Sin imagen.png";

	if(isset($_FILES['imagen'])){

		//datos del arhivo
		$nombre_archivo = $_FILES['imagen']['name'];
		$tipo_archivo = $_FILES['imagen']['type'];
		$tamano_archivo = $_FILES['imagen']['size'];
		
		// indicador de todo bien
		$todo_bien = FALSE;
		$ruta = "../medicamentos";

		//compruebo si las caracter�sticas del archivo son las que deseo
		if (!((strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) {
			$mensaje="Error en parámetros - Se permiten archivos jpeg, jpg o png, con un tamaño de 100 Kb máximo";
		}else{
			if (move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta . "/" . $nombre_archivo)){
				$imagen=$nombre_archivo;
				$todo_bien = TRUE;
			}else{
				$mensaje="Error en parámetros - no se pudo subir el archivo";
				$imagen = $anterior;
			}
		}

	}else
		$imagen=$anterior;

	$medicamento = new Medicamento();

	$medicamento->setId_medicamento($id_medicamento);
	$medicamento->setNombre($nombre);
	$medicamento->setDescripcion($descripcion);
	$medicamento->setExistencia($existencia);
	$medicamento->setPrecio($precio);
	$medicamento->setId_presentacion($id_presentacion);
	$medicamento->setImagen($imagen);

	$operacionValida=$manejador->modificarMedicamento($medicamento);

	if($operacionValida)
		$mensaje="Datos modificados satisfactoriamente";
	else
		$mensaje="Error en parámetros";

}

$manPresentacion = new ManejadorPresentacion();
$cbo_nu_presentacion = $manPresentacion->comboPresentacion($id_presentacion);

require_once "../vista/medicamento_modificar.php";

?>