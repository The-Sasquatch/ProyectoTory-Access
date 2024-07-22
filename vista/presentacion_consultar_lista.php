


<table class='w3-table-all' style='width:75%; margin:auto; '>
<tr class="w3-indigo">
	<th>#</th>
	<th width="50%">Presentacion</th>
	<th>Acci&oacute;n</th>
</tr>

<?php
$fila=0;

for($x=0; $x<count($datos); $x++) {
	$item = $datos[$x];
?>

<?php
$fila++;
?>

<tr>
	<td><?php echo ($x+1); ?></td>
	<td><?php echo $item->getNb_presentacion(); ?></td>
	<td>

	<form name='formupdate<?php echo $fila; ?>' action='../controlador/PresentacionModificar.php' method='post'>
	<input name='opcion' type='hidden' value='2'>
	<input name='id_presentacion' type='hidden' value='<?php echo $item->getId_presentacion(); ?>' >
	</form>

	<form name='formdelete<?php echo $fila; ?>' action='../controlador/PresentacionEliminar.php' method='post'>
	<input name='opcion' type='hidden' value='1'>
	<input name='id_presentacion' type='hidden' value='<?php echo $item->getId_presentacion(); ?>' >
	</form>

	<a href='javascript:document.formupdate<?php echo $fila; ?>.submit();'><img src='../imagenes/edit.png' alt='Modificar icono' class='w3-image' style='width:32px;'></a>
	&nbsp;
	<a href='javascript:if(confirm("¿Está de acuerdo con la acción ingresada?")) document.formdelete<?php echo $fila; ?>.submit();'><img src='../imagenes/delete.png' alt='Modificar icono' class='w3-image' style='width:32px;'></a>
	</td>
</tr>

<?php } ?>


</table>


