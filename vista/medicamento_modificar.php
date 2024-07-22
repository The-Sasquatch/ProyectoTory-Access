<!DOCTYPE HTML>
<html>
<head>
<title>Carrito Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/w3.css" rel="stylesheet" type="text/css">
<script language='javascript' src='../js/jquery-3.7.1.min.js'></script>
<script language='javascript' src='../js/funciones.js'></script>
<script language='javascript' src='../js/medicamento_ingresar.js'></script>
</head>

<body>
<?php
$titulo="medicamento";



include "header.php";



include "menu.php";
?>



<div class="w3-center">
	<h1 class="w3-center"><?php echo strtoupper($titulo); ?></h1>

	<p class="w3-center">
	<?php
	include "medicamento_menu.php";
	?>
	</p>
</div>
	

<div class="w3-container w3-padding w3-light-grey">
<?php
include "medicamento_modificar_formulario.php";
?>
</div>



<?php
include "footer.php";
?>

</body>
</html>
