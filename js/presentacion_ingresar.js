
function validar(forma) {
if(forma.nb_presentacion.value == null || forma.nb_presentacion.value == ''){
	alert('Presentacion es un campo obligatorio.'+mensaje)
	forma.nb_presentacion.focus()
	return false
}
var numnb_presentacion=forma.elements["nb_presentacion"];
if(!sololetras(numnb_presentacion.value)){
	alert('Presentacion es un campo alfab�tico.'+mensaje)
	forma.nb_presentacion.focus()
	return false
}


if(confirm("¿Está de acuerdo con la información ingresada?")){ forma.submit(); }


return true;

} 