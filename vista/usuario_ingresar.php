<!DOCTYPE HTML>
<html>
<head>
<title>Base de datos IV | Registrarse</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- <link href="../css/w3.css" rel="stylesheet" type="text/css"> -->
<script language='javascript' src='../js/jquery-3.7.1.min.js'></script>
<script language='javascript' src='../js/funciones.js'></script>
<script language='javascript' src='../js/usuario_ingresar.js'></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
<?php
$titulo="registrese";

include "catalogo_menu.php";

?>


<div class="w3-container w3-padding w3-light-grey">
<?php
include "usuario_ingresar_formulario.php";
?>
</div>



<?php
include "footer.php";
?>

</body>
</html>
