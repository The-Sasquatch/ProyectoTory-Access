
<div class='w3-bar w3-light-grey w3-padding'>

	<a href='../controlador/ControladorCatalogo.php' class='w3-bar-item w3-btn w3-blue w3-hover-white w3-padding-16'>Cat&aacute;logo</a>

<?php
if(isset($_SESSION['nombre'])){
?>

	<a href='../controlador/ControladorCompra.php' class='w3-bar-item w3-button w3-hover-blue w3-right'><img src="../imagenes/bag.svg" class="w3-image" style="height:40px;"></a>
	<a href='../controlador/ControladorCarrito.php' class='w3-bar-item w3-button w3-hover-blue w3-right'><img src="../imagenes/carrito.png" class="w3-image" style="height:40px;"></a>
	<span class="w3-bar-item w3-padding-16">
	Cliente: <b><?php echo $_SESSION['nombre']; ?></b>
	</span>
	<a href='../controlador/ControladorLogout.php' class='w3-bar-item w3-button w3-hover-red w3-right'><img src="../imagenes/logout.png" class="w3-image" style="height:40px;"></a>

<?php
}else{
?>

	<a href='../controlador/UsuarioIngresar.php' class='w3-bar-item w3-button w3-hover-blue w3-right'><img src="../imagenes/user.png" class="w3-image" style="height:40px;"></a>
	<a href='../controlador/ControladorLogin.php' class='w3-bar-item w3-button w3-hover-green w3-right'><img src="../imagenes/login.png" class="w3-image" style="height:40px;"></a>

<?php
}
?>

</div>
