<?php
$txt = "";
$col = 0;

for($x=0; $x<count($datos); $x++){

	if($col == 0){
		$txt .= "\n<div class='w3-row w3-padding-32'>";
	}
	$item = $datos[$x];
	$id_medicamento = $item->getId_medicamento();
	$nombre = $item->getNombre();
	$existencia = $item->getExistencia();
	$precio = $item->getPrecio();
	$imagen = $imagen = "../medicamentos/" . $item->getImagen();
	$formulario = "form" . $id_medicamento;

	$txt .= "\n<div class='w3-third w3-padding'>";
	$txt .= "\n<div class='w3-padding w3-light-grey w3-border'>";
	$txt .= "\n<p class='w3-center'><img src='$imagen' class='w3-image' style='height:120px;'></p>";

	$txt .= "\n<div class='w3-padding w3-white'>";
	$txt .= "\n<p><b>$nombre</b><br>";
	$txt .= "\nCantidad: $existencia<br>Precio: $precio<br>";
	
	if(isset($_SESSION['correo'])){
		$txt .= "\n<form name='$formulario' action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
		$txt .= "\n<input name='opcion' type='hidden' value='1'>";
		$txt .= "\n<input name='id_medicamento' type='hidden' value='$id_medicamento'>";
		$txt .= "\n<div class='w3-center'>";
		$txt .= "\n<div class='w3-center w3-padding w3-button w3-hover-blue'>";
		$txt .= "\n<img src='../imagenes/carrito_mas.svg' class='w3-image' style='width:40px;' onClick='submit()'>";
		$txt .= "\n</div>";
		$txt .= "\n</div>";
		$txt .= "\n</form>";
	}
		
	$txt .= "\n</div>";

	$txt .= "\n</div>";
	$txt .= "\n</div>";

	$col++;
	if($col == 3 || $x == count($datos)-1){
		$txt .= "\n</div>";
		$col = 0;
	}

}

echo $txt;

?>

<?php
?>
