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
		buscar("presentacion_consultar_lista.php");
	});

});

</script>
</head>

<body>
<?php
$titulo="presentacion";


include "header.php";


include "menu.php";

?>

<div class="w3-center">
	<h1 class="w3-center"><?php echo strtoupper($titulo); ?></h1>

	<p class="w3-center">
	<?php
	include "presentacion_menu.php";
	?>
	</p>
</div>


<div class="w3-panel w3-center w3-pale-yellow w3-padding">
	<div class="w3-bar">
		<input id="texto" type="text" class="w3-bar-item w3-input" placeholder="Filtrar...">
		<button id="go" class="w3-bar-item w3-button w3-teal" title="Filtro">Buscar</button>
	</div>
</div>


<div id="lista" class="w3-container w3-padding w3-pale-yellow">
<?php
include "presentacion_consultar_lista.php";
?>
</div>


<?php
include "footer.php";
?>


</body>
</html>
