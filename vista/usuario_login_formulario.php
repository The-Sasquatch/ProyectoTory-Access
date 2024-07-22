
<div class='w3-padding' style="width:50%; margin:auto;">
	<div class='w3-card-4'>
		<div class='w3-container w3-indigo'>
		<p class='w3-center'>Ingrese los datos en el formulario y presione Aceptar</p>
		</div>
	</div>

<form name='usuario_ingresar' method='post' action="ControladorLogin.php" >
<input name='opcion' type='hidden' value='1'>

	<p>
	<label>Correo Electronico</label>
	<input name='correo' maxlength='50' type='email' class='w3-input w3-border'>
	</p>

	<p>
	<label>Contraseña</label>
	<input name='password'  maxlength='15' type='password' class='w3-input w3-border'>
	</p>

	<p class='w3-center'>
	<input name='aceptar' value='Aceptar' type='button' class='w3-btn w3-indigo' onClick='validar(document.usuario_ingresar)' >
	</p>

	<p class='w3-center w3-text-red'>
	<?php 		
		if(isset($mensaje)){
			echo $mensaje; 
		} 
	?>
	</p>

</form>

</div>


