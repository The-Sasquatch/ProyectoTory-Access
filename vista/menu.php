
<div class="w3-bar w3-border w3-lime">
	<a href="#" class="w3-bar-item w3-button w3-grey w3-padding-16">Presentacion</a>
<?php

if(isset($_SESSION['id_usuario'])){

?>
	<a href="#" class="w3-bar-item w3-button w3-right">
	<img src="../imagenes/bag.svg" style="height: 28px;" class="w3-image" alt="Compra" title="Ver Compras">
	</a>
	<a href="#" class="w3-bar-item w3-button w3-right">
	<img src="../imagenes/carrito.png" style="height: 28px;" class="w3-image" alt="Carrito" title="Carrito de Compras">
	</a>
	<a href="#" class="w3-bar-item w3-button w3-right">
	<img src="../imagenes/logout.png" style="height: 28px;" class="w3-image" alt="Logout" title="Desconectarse">
	</a>
<?php

}else{
?>
	<a href="../controlador/UsuarioIngresar.php" class="w3-bar-item w3-button w3-right">
	<img src="../imagenes/add-user.png" style="height: 28px;" class="w3-image" alt="Registrese" title="Registrese">
	</a>
	<a href="../controlador/ControladorLogin.php" class="w3-bar-item w3-button w3-right">
	<img src="../imagenes/login.png" style="height: 28px;" class="w3-image" alt="Login" title="Login">
	</a>

<?php
}

?>
</div>
