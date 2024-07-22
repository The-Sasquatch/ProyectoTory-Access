


<table class='w3-table-all' style='width:90%; margin:auto; '>
<tr class="w3-indigo">
	<th>#</th>
	<th width="30%">Medicamento</th>
	<th width="15%">Cantidad</th>
	<th width="15%">Precio</th>
	<th width="15%">Imagen</th>
	<th>Acci&oacute;n</th>
</tr>

<?php
$fila=0;

for($x=0; $x<count($datos); $x++) {
	$item = $datos[$x];
	$imagen = "../medicamentos/" . $item->getImagen();
	//echo "imagen=$imagen";
?>

<?php
$fila++;
?>

<tr>
	<td><?php echo ($x+1); ?></td>
	<td><?php
	echo $item->getNombre() . "<br>" . $item->getDescripcion() .
	"<br>Presentacion: " . $item->getPresentacion()->getNb_presentacion();
	?></td>
	<td><?php echo $item->getexistencia(); ?></td>
	<td><?php echo $item->getPrecio(); ?></td>
	<td class="w3-center">
	<img src="<?php echo $imagen ?>" style="height=64px;" class="w3-image">
	</td>
	
	<form name='formupdate<?php echo $fila; ?>' action='../controlador/MedicamentoModificar.php' method='post'>
	<input name='opcion' type='hidden' value='2'>
	<input name='id_medicamento' type='hidden' value='<?php echo $item->getId_medicamento(); ?>' >
	</form>
	
	<form name='formdelete<?php echo $fila; ?>' action='../controlador/MedicamentoEliminar.php' method='post'>
	<input name='opcion' type='hidden' value='1'>
	<input name='id_medicamento' type='hidden' value='<?php echo $item->getId_medicamento(); ?>' >
	</form>
	
	<td>
	<p class="w3-padding">
	<a href='javascript:document.formupdate<?php echo $fila; ?>.submit();'><img src='../imagenes/edit.png' alt='Modificar icono' class='w3-image' style='width:32px;'></a>
	&nbsp;
	<a href='javascript:if(confirm("¿Está de acuerdo con la acción ingresada?")) document.formdelete<?php echo $fila; ?>.submit();'><img src='../imagenes/delete.png' alt='Modificar icono' class='w3-image' style='width:32px;'></a>
	</p>
	</td>
</tr>

<?php } ?>


</table>


