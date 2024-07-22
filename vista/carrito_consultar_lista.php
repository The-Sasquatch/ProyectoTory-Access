

<table class='w3-table-all' style='width:90%; margin:auto; '>

<tr class="w3-indigo">
	<th width="5%">#</th>
	<th width="30%">Producto</th>
	<th width="15%">Imagen</th>
	<th width="15%">Precio</th>
	<th width="15%">Cantidad</th>
	<th>Acci&oacute;n</th>
</tr>

<?php
$fila=0;

for($x=0; $x<count($datos); $x++) {
	$item = $datos[$x];
	$imagen = "../medicamentos/" . $item->getMedicamento()->getImagen();
	//echo "imagen=$imagen";
	$existencia = $item->getMedicamento()->getExistencia();
	$id_medicamento = $item->getMedicamento()->getId_medicamento();
?>

<?php
$fila++;
?>

<tr>
	<td><?php echo ($x+1); ?></td>
	<td><?php
	echo $item->getMedicamento()->getNombre() . "<br>" . $item->getMedicamento()->getDescripcion() .
	"<br>Presentacion: " . $item->getMedicamento()->getPresentacion()->getNb_presentacion();
	?></td>
	<td class="w3-center">
	<img src="<?php echo $imagen ?>" style="height=64px;" class="w3-image">
	</td>
	<td><?php echo $item->getMedicamento()->getPrecio(); ?></td>

	<td>
	<form name="formcompra<?php echo $fila; ?>" action='../controlador/ControladorCarrito.php' method='post'>
	<input name='opcion' type='hidden' value='1'>
	<input name='id_medicamento' type='hidden' value='<?php echo $item->getId_medicamento(); ?>' >
	<input name="cantidad" type="number" value="1" min="1" max="<?php echo $existencia; ?>" style="width:70px;">
	</form>
	</td>
	
	<form name='formdelete<?php echo $fila; ?>' action='../controlador/ControladorCarrito.php' method='post'>
	<input name='opcion' type='hidden' value='2'>
	<input name='id_medicamento' type='hidden' value='<?php echo $item->getId_medicamento(); ?>' >
	<input name='id_usuario' type='hidden' value='<?php echo $item->getId_usuario(); ?>' >
	</form>
	
	<td>
	<p class="w3-padding-16 w3-center">
	<a href='javascript:if(confirm("¿Está de acuerdo con la acción ingresada?")) document.formdelete<?php echo $fila; ?>.submit();'><img src='../imagenes/delete.png' alt='Modificar icono' class='w3-image' style='width:32px;'></a>
	&nbsp;
	<a href='javascript:if(confirm("¿Está de acuerdo con la acción ingresada?")) document.formcompra<?php echo $fila; ?>.submit();'><img src='../imagenes/bag.png' alt='Comprar icono' class='w3-image' style='width:32px;'></a>
	</p>
	</td>
</tr>

<?php } ?>

</table>


