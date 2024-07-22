
<script>
function CambiarImagen(opc){
	if(opc=='N')
		txt = "<input name='imagen' value='Sin imagen.png' type='text' class='w3-input w3-border' readonly>";
	else 
		txt = "<input name='imagen' value='' type='file' class='w3-input w3-border'>";
	
	document.getElementById("imagen").innerHTML = txt;
}
</script>

<div class='w3-padding' style="width:75%; margin:auto;">
	<div class='w3-card-4'>
		<div class='w3-container w3-indigo'>
		<p class='w3-center'>Ingrese los datos en el formulario y presione Aceptar</p>
		</div>
	</div>

<form name='medicamento_ingresar' method='post' action="MedicamentoIngresar.php" enctype="multipart/form-data">
<input name='opcion' type='hidden' value='1'>
<input name='id_medicamento' type='hidden' value=''>

	<p>
	<label>Nombre</label>
	<input name='nombre' value='' maxlength='50' type='text' class='w3-input w3-border'>
	</p>

	<p>
	<label>Descripcion</label>
	<textarea name='descripcion' style='overflow:auto' cols='30' rows='5' class='w3-input w3-border'></textarea>
	</p>

	<p>
	<label>Cantidad</label>
	<input name='existencia' value='' min='1' type='number' class='w3-input w3-border'>
	</p>

	<p>
	<label>Precio</label>
	<input name='precio' value='' min='1' type='number' class='w3-input w3-border'>
	</p>

	<p>
	<label>Imagen</label>
	<br>
	<input name="in_imagen" type="radio" value="S" onChange="CambiarImagen(this.value)" checked>Si
	&nbsp;
	<input name="in_imagen" type="radio" value="N" onChange="CambiarImagen(this.value)">No
	
	<div id="imagen">
		<input name='imagen' value='' type='file' class='w3-input w3-border'>
	</div>
	</p>


	<p>
	<label>Presentacion</label>
	<?php echo $cbo_nu_presentacion; ?>
	</p>


	<p class='w3-center'>
	<input name='aceptar' value='Aceptar' type='button' class='w3-btn w3-indigo' onClick='validar(document.medicamento_ingresar)' >
	</p>

	</form>

	<p class='w3-center w3-text-red'>
	<?php 
		if(isset($mensaje)){
			echo $mensaje; 
		}
	?> 
	</p>

</div>