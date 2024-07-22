<!DOCTYPE HTML>
<html>
<head>
<title>Carrito Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/w3.css" rel="stylesheet" type="text/css">
<script language='javascript' src='../js/jquery-3.7.1.min.js'></script>
<script language='javascript' src='../js/funciones.js'></script>
<script>

$(document).ready(function(){

	$("#go").click(function(){
		buscar("medicamento_consultar_lista.php");
	});

});


</script>
</head>

<body>
<?php
$titulo="carrito";

include "catalogo_menu.php";

?>

<div class="w3-center">
	<h1 class="w3-center"><?php echo strtoupper($titulo); ?></h1>

	<p class="w3-center">
	Ingrese la cantidad de medicamento a comprar y haga click en el icono <img src="../imagenes/bag.png" class="w3-image" style="height:32px;">
	</p>
</div>


<div id="lista" class="w3-container w3-padding ww3-pale-yellow">
<?php
include "carrito_consultar_lista.php";
?>
</div>


<?php
include "footer.php";
?>


</body>
</html>
