
<script>
function CambiarImagen(opc){
	if(opc=='N'){
		txt = "<input name='imagen' value='<?php echo $imagen; ?>' type='text' class='w3-input w3-border' readonly>";
		$("#foto").show();
	}else{
		txt = "<input name='imagen' value='' type='file' class='w3-input w3-border'>";
		$("#foto").hide();
	}
	
	document.getElementById("imagen").innerHTML = txt;
}
</script>

<div class='w3-padding' style="width:75%; margin:auto;">
	<div class='w3-card-4'>
		<div class='w3-container w3-indigo'>
		<p class='w3-center'>Modifique los datos en el formulario y presione Aceptar</p>
		</div>
	</div>

<form name='medicamento_modificar' method='post' action="MedicamentoModificar.php" enctype="multipart/form-data">
<input name='opcion' type='hidden' value='1'>
<input name='id_medicamento' type='hidden' value='<?php echo $id_medicamento; ?>'>
<input name='anterior' type='hidden' value='<?php echo $imagen; ?>'>

	<p>
	<label>Medicamento</label>
	<input name='nombre' value='<?php echo $nombre; ?>' maxlength='50' type='text' class='w3-input w3-border'>
	</p>

	<p>
	<label>Descripcion</label>
	<textarea name='descripcion' style='overflow:auto' cols='30' rows='10' class='w3-input w3-border'><?php echo $descripcion; ?></textarea>
	</p>

	<p>
	<label>Cantidad</label>
	<input name='existencia' value='<?php echo $existencia; ?>' min='1' type='number' class='w3-input w3-border'>
	</p>

	<p>
	<label>Precio</label>
	<input name='precio' value='<?php echo $precio; ?>' min='1' type='number' class='w3-input w3-border'>
	</p>

	<p>
	<label>&iquest;Cambiar Imagen?</label>
	<br>
	<input name="in_imagen" type="radio" value="S" onChange="CambiarImagen(this.value)" checked>Si
	&nbsp;
	<input name="in_imagen" type="radio" value="N" onChange="CambiarImagen(this.value)">No
	<br>
	
	<img id="foto" src="../productos/<?php echo $imagen; ?>" style="width:64px; display:none;" class="w3-image">
	
	<div id="imagen">
	<input name='imagen' value='' type='file' class='w3-input w3-border'>
	</div>

	</p>

	<p>
	<label>Presentacion</label>
	<?php echo $cbo_nu_presentacion; ?>
	</p>

	<p class='w3-center'>
	<input name='aceptar' value='Aceptar' type='button' class='w3-btn w3-indigo' onClick='validar(document.medicamento_modificar)' >
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