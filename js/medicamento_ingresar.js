function validar(forma) {

if(forma.nombre.value == null || forma.nombre.value == ''){
	alert('Medicamento es un campo obligatorio.'+mensaje)
	forma.nombre.focus()
	return false
}
var numnb_producto=forma.elements["nombre"];
if(!sololetras(numnb_producto.value)){
	alert('medicamento es un campo alfab�tico.'+mensaje)
	forma.nombre.focus()
	return false
}

if(forma.descripcion.value.length == 0){
	alert('Descripción es un campo obligatorio.'+mensaje)
	forma.descripcion.focus()
	return false
}
var numde_producto=forma.elements["descripcion"];
if(!alfabetico(numde_producto.value)){
	alert('Descripción es un campo alfabético.'+mensaje)
	forma.descripcion.focus()
	return false
}

if(forma.existencia.value == null || forma.existencia.value == ''){
	alert('Existencia es un campo obligatorio.'+mensaje)
	forma.existencia.focus()
	return false
}
if(forma.precio.value == null || forma.precio.value == ''){
	alert('Precio es un campo obligatorio.'+mensaje)
	forma.precio.focus()
	return false
}

if(forma.id_presentacion.value == ''){
	alert('Seleccione un valor de la lista de presentación.'+mensaje)
	forma.id_presentacion.focus()
	return false
}

in_imagen = $('input:radio[name=in_imagen]:checked').val();
if(in_imagen == 'S')
	if(forma.imagen.value == ''){
		alert('Seleccione una imagen.'+mensaje)
		forma.imagen.focus()
		return false
	}
	

if(confirm("¿Está de acuerdo con la información ingresada?")){ forma.submit(); }


return true;

} 
