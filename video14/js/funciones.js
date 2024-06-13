// JavaScript 
//var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
//import {calcMD5} from "/md5.js"
function valida_correo(correo){
	if  (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
		return (true)
	}else{
		return (false);
	}
}

function limpiar_logueo(){
	document.form.reset();
	document.form.user.focus();
}
/**/
function valida_logueo(){
	//alert("Hola");
	var form=document.form;
	if(form.user.value==0){
		alert("Ingrese su Login 11215");
		form.user.value="";
		form.user.focus();
		return false;
	}
	if(form.pass.value==0){
		alert("Ingrese su Password");
		form.pass.value="";
		form.pass.focus();
		return false;
	}

	//alert("hola");
	form.pass.value=calcMD5(); alert("hola 2");
	form.submit();
}