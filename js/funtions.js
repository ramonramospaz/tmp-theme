/*

 funtions.js
    2015-05-03

    Public Domain.

    NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

    
    USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
    NOT CONTROL.


    This file have specific code to validate some forms.


*/


// Valida formulario de formulario de participación del mercado
function validarFPM(){
		var porcentaje=0;
		var retorno=true;
		if(isNumeric(document.getElementById("pc1").value)){
			porcentaje=porcentaje+parseInt(document.getElementById("pc1").value);
		}
		if(isNumeric(document.getElementById("pc2").value)){
			porcentaje=porcentaje+parseInt(document.getElementById("pc2").value);
		}
		if(isNumeric(document.getElementById("pc3").value)){
			porcentaje=porcentaje+parseInt(document.getElementById("pc3").value);
		}
		if(isNumeric(document.getElementById("pc4").value)){
			porcentaje=porcentaje+parseInt(document.getElementById("pc4").value);
		}
		if(isNumeric(document.getElementById("pc5").value)){
			porcentaje=porcentaje+parseInt(document.getElementById("pc5").value);
		}
		if(porcentaje>100){
			alert("El porcentaje es mayor a 100%");
			retorno=false;	
		}
		return retorno;
	}

	function isNumeric(n) {
  		return !isNaN(parseFloat(n)) && isFinite(n);
	}

function RequiredPersonalData(){
	document.getElementById('d_box1').className = "activo";
	document.getElementById('d_box2').className = "";
	document.getElementById('Pnombre').className = "required";
	document.getElementById('Papellido').className = "required";
	document.getElementById('Pdireccion').className = "required";
	document.getElementById('Ppais').className = "required";
	document.getElementById('Pciudad').className = "required";
	document.getElementById('Enombre').className = "None";
	document.getElementById('Edireccion').className = "None";
	document.getElementById('Eciudad').className = "None";
	document.getElementById('Epais').className = "None";
}

function RequiredBusinessData(){
	document.getElementById('d_box1').className = "";
	document.getElementById('d_box2').className = "activo";
	document.getElementById('Pnombre').className = "None";
	document.getElementById('Papellido').className = "None";
	document.getElementById('Pdireccion').className = "None";
	document.getElementById('Ppais').className = "None";
	document.getElementById('Pciudad').className = "None";
	document.getElementById('Enombre').className = "required";
	document.getElementById('Edireccion').className = "required";
	document.getElementById('Eciudad').className = "required";
	document.getElementById('Epais').className = "required";
}