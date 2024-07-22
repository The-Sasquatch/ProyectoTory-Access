
function validar(forma) {
	
if(forma.nombre.value == null || forma.nombre.value == ''){
	alert('Usuario es un campo obligatorio.'+mensaje)
	forma.nombre.focus()
	return false
}
if(forma.apellido.value == null || forma.apellido.value == ''){
	alert('Usuario es un campo obligatorio.'+mensaje)
	forma.nombre.focus()
	return false
}
var numnb_cliente=forma.elements["nombre"];
if(!sololetras(numnb_cliente.value)){
	alert('Usuario es un campo alfabético.'+mensaje)
	forma.nombre.focus()
	return false
}

if(forma.correo.value == null || forma.correo.value == ''){
	alert('Correo es un campo obligatorio.'+mensaje)
	forma.correo.focus()
	return false
}
var numco_correo=forma.elements["correo"];
if(!validarEmail(numco_correo)){
	alert('Correo tiene el formato incorrecto.'+mensaje)
	forma.correo.focus()
	return false
}

if(forma.password.value == null || forma.password.value == ''){
	alert('Clave es un campo obligatorio.'+mensaje)
	forma.password.focus()
	return false
}
var numco_clave=forma.elements["password"];
if(!palabraclave(numco_clave.value)){
	alert('Clave es un campo alfanumérico.'+mensaje)
	forma.password.focus()
	return false
}


if(confirm("¿Está de acuerdo con la información ingresada?")){ forma.submit(); }


return true;

} 

