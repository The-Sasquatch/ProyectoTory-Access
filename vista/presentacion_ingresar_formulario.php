
<div class='w3-padding'>

	<div class='w3-card-4'>
		<div class='w3-container w3-indigo'>
		<p class='w3-center'>Ingrese los datos en el formulario y presione Aceptar</p>
		</div>
	</div>

	<form name='presentacion_ingresar' method='post' action="PresentacionIngresar.php" >
		<input name='opcion' type='hidden' value='1'>
		<input name='id_presentacion' type='hidden' value='<?php echo $id_presentacion; ?>'>

		<p>
		<label>Presentacion</label>
		<input name='nb_presentacion' maxlength='50' type='text' class='w3-input w3-border'>
		</p>

		<p class='w3-center'>
		<input name='aceptar' value='Aceptar' type='button' class='w3-btn w3-light-grey' onClick='validar(document.presentacion_ingresar)' >
		</p>
	</form>

	<p class="w3-center w3-text-red">
	<?php 
		if(isset($mensaje)){
			echo $mensaje; 
		}
	?> 
	</p>
</div>