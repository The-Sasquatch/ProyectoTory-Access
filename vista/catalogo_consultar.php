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

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
<?php
$titulo="catalogo";

include "catalogo_menu.php";

?>

<div class="w3-center">
	<h1 class="w3-center"><?php echo strtoupper($titulo); ?></h1>

	<p class="w3-center">
	</p>
</div>


<div class="w3-panel w3-center w3-pale-yellow w3-padding">
	<div style="width:50%; margin:auto;">
	<form method="post" action="ControladorCatalogo.php">
		<p class="w3-center">
			<label>Presentacion</label>
			<?php echo $cbo_nu_presentacion; ?>
			<input type="button" value="Filtrar" onclick="submit()">
		</p>
	</form>
	</div>
</div>


<div id="lista" class="w3-container w3-padding ww3-pale-yellow">
<?php
include "catalogo_consultar_lista.php";
?>
</div>


<?php
include "footer.php";
?>


</body>
</html>
