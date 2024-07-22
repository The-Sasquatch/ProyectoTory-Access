<?php

if(count($datos) > 0){
	
	$detalle_compra = $datos[0];
	$id_compra = $detalle_compra->getId_compra();
	$fecha = date_format(date_create($fecha),"d/m/Y");
	
?>

		<p class="w3-center w3-large"><b>Detalle de la Compra</b></p>

<?php
}
?>

<table class='w3-table-all' style='width:90%; margin:auto; '>
	<tr class="w3-indigo">
		<th class="w3-center">#</th>
		<th>Medicamento</th>
		<th class="w3-center">Cantidad</th>
		<th class="w3-center">Precio</th>
		<th class="w3-center">Subtotal</th>
		<th class="w3-center">Fecha de Registro</th>
	</tr>


<?php
$fila=1;
$total = 0;
for($x=0; $x<count($datos); $x++){
	$item = $datos[$x];
	$cantidad = $item->getCantidad();
	$precio = $item->getMedicamento()->getPrecio();
	$subtotal = (int)$cantidad * (int)$precio;
	$total += $subtotal;
	// $fecha = date_format(date_create($fecha),"d/m/Y");
?>

	<tr>
		<td class="w3-center"><?php echo $fila; ?></td>
		<td><?php echo $item->getMedicamento()->getNombre(); ?></td>
		<td class="w3-center"><?php echo $cantidad; ?></td>
		<td class="w3-right-align">
		<?php echo number_format($precio, 2, ',', '.'); ?>
		</td>
		<td class="w3-right-align">
		<?php echo number_format($subtotal, 2, ',', '.'); ?>
		</td>
		<td class="w3-center"><?php echo $fecha; ?></td>
	</tr>

<?php
	$fila++;
}
?>
	<tr class="w3-indigo">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="w3-right-align"><b>Total ===></td>
		<td class="w3-right-align"><b><?php echo number_format($total, 2, ',', '.'); ?></b></td>
		<td>&nbsp;</td>
	</tr>

</table>
