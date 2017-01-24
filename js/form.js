jQuery(document).ready(function($){

	$("#r_form").validate({
        rules: {
            password: "required",
		    rpassword: {
		      equalTo: "#password"
		    }
        },
        submitHandler: function() {
        	var Nombre = $("#fname");
			var Apellido = $("#lname");
			var Correo = $("#email");
			var Contrasena = $("#password");
			$.ajax({
				method: "POST",
				url: "../wp-content/themes/tmp-theme/registro-query.php",
				data: { Nombre: Nombre.val(), Apellido: Apellido.val(), Correo: Correo.val(),  Contrasena: Contrasena.val(), },
				beforeSend: function( xhr ) {
					$(this).css("display","none");
					xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
				}
			})
			.done(function(data){
				switch(data){
					case '1':
						$("#message").html("¡Registrado exitosamente!");
						$("#message").css("display","block");
						Nombre.val("");
						Apellido.val("");
						Correo.val("");
						Contrasena.val("");
						$("#rpassword").val("");
						setTimeout ($(location).attr('href',"../payment"), 2000);
					break;
					case '3':
						$("#message").html("¡Registrado exitosamente!");
						$("#message").css("display","block");
						Nombre.val("");
						Apellido.val("");
						Correo.val("");
						Contrasena.val("");
						$("#rpassword").val("");
						setTimeout ($(location).attr('href',"../servicios"), 2000);
					break;
					case '0':
						$("#message").html("Disculpe ya existe un usuario registrado con este correo. Verifique e intente nuevamente.");
						$("#message").css("display","block");
					break;
					default:
						$("#message").html("Hubo un problema al registrar, intentelo nuevamente.");
						$("#message").css("display","block");
					break;
				}
				$(this).css("display","block");
			});
    	}
    });	

	$("#l_form").validate({
        submitHandler: function() {
			var email = $("#lemail");
			var clave = $("#lpassword");
			$.ajax({
				method: "POST",
				url: "../wp-content/themes/tmp-theme/login.php",
				data: {  email: email.val(), clave: clave.val(), },
				beforeSend: function( xhr ) {
					$(this).css("display","none");
					xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			}

		})
		.done(function(data){
			switch(data){

				case '1':
					$("#lmessage").html("¡Bienvenido! Iniciando sesión");
					$("#lmessage").removeClass("incorrect");
					$("#lmessage").addClass("correct");
					$("#lmessage").css("display","block");
					email.val("");
					clave.val("");
					setTimeout ($(location).attr('href',"../payment"), 2000);
				break;

				case '2':

					$("#lmessage").html("¡Bienvenido! Iniciando sesión");
					$("#lmessage").removeClass("incorrect");
					$("#lmessage").addClass("correct");
					$("#lmessage").css("display","block");
					email.val("");
					clave.val("");
					setTimeout ($(location).attr('href',"../historial-de-solicitudes"), 2000);
				break;

				case '3':
					$("#lmessage").html("¡Bienvenido! Iniciando sesión");
					$("#lmessage").removeClass("incorrect");
					$("#lmessage").addClass("correct");
					$("#lmessage").css("display","block");
					email.val("");
					clave.val("");
					setTimeout ($(location).attr('href',"../servicios"), 2000);
				break;

				case '4':

					$("#lmessage").html("¡Bienvenido! Iniciando sesión");
					$("#lmessage").removeClass("incorrect");
					$("#lmessage").addClass("correct");
					$("#lmessage").css("display","block");
					email.val("");
					clave.val("");
					setTimeout ($(location).attr('href',"../historial-de-solicitudes"), 2000);

				break;

				case '0':
					$("#lmessage").html("Usuario o contraseña invalidos. Por favor verifiquelos e intente de nuevo.");
					$("#lmessage").addClass("incorrect");
					$("#lmessage").css("display","block");
				break;

				default:
					$("#lmessage").html("Hubo un problema al iniciar sesión, por favor intente nuevamente.");
					$("#lmessage").addClass("incorrect");
					$("#lmessage").css("display","block");
				break;

			}

			$(this).css("display","block");

		});

	}

});

	

	$("#briefing").validate();



	$("#rl_form").validate({
        submitHandler: function() {
			var email = $("#adm-email");
			var clave = $("#adm-password");

			$.ajax({
				method: "POST",
				url: "../wp-content/themes/tmp-theme/adm-login.php",
				data: {  email: email.val(), clave: clave.val(), },
				beforeSend: function( xhr ) {
					$(this).css("display","none");
					xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
				}

			})
			.done(function(data){

				switch(data){

					case '1':
						$("#lmessage").html("¡Bienvenido! Iniciando sesión");
						$("#lmessage").removeClass("incorrect");
						$("#lmessage").addClass("correct");
						$("#lmessage").css("display","block");
						email.val("");
						clave.val("");
						setTimeout ($(location).attr('href',"/panel"), 2000);
					break;

					case '0':
						$("#lmessage").html("Usuario o contraseña invalidos. Por favor verifiquelos e intente de nuevo.");
						$("#lmessage").addClass("incorrect");
						$("#lmessage").css("display","block");
					break;

					default:
						$("#lmessage").html("Hubo un problema al iniciar sesión, por favor intente nuevamente.");
						$("#lmessage").addClass("incorrect");
						$("#lmessage").css("display","block");
					break;

				}
				$(this).css("display","block");
			});
    	}
    });



	$("#form_new").validate({        

        submitHandler: function() {
			$.ajax({
				method: "POST",
				url: "../wp-content/themes/tmp-theme/nueva-solicitud.php",
				beforeSend: function( xhr ) {
					$(this).css("display","none");
					xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			}
		})
			.done(function(data){
				switch(data){

					case '1':
						setTimeout ($(location).attr('href',"./servicios"), 500);
					break;

					default:
					break;
				}

				$(this).css("display","block");

			});
    	}
    });
	$("input").blur(function(e){
		var element = $(this);
		if(element.hasClass("errorField")){
			element.focus();
		}
	});
	var CanSubmit = false;
	$("form input[type='submit']").click(function(e){
		if(!CanSubmit){
			e.preventDefault();
			if(typeof QuestionAnsweredValidation == 'function'){
				if(percentValidation() && QuestionAnsweredValidation()){
					CanSubmit = true;
					$(this).click();
				}
			}else{
				if(percentValidation()){
					CanSubmit = true;
					$(this).click();
				}
			}
			/*if(percentValidation() && QuestionAnsweredValidation()){
				CanSubmit = true;
				$(this).click();
			}*/
		}
	});
	$("li .Blocked").click(function(e){
		e.preventDefault();
		alert("Debe culminar los cuestionarios anteriores a este para poder acceder al mismo.");
	});
	//
		//Validacion Para evitar escribir en respuestas "Otras" si el radio no esta checkeado
		$("p>input[type='radio']+label>input[type='text']").keyup(function(){
			var ObjectMe = $(this);
			var ObjectAnswer = ObjectMe.closest("p");
			var ObjectAnswerRadio = ObjectAnswer.find(">input[type='radio']");
			var RadioValue = ObjectAnswerRadio.is(":checked");
			if(!RadioValue){
				ObjectMe.val("");
			}
		});
	//
	function percentValidation(){
		var ToReturn = false;
		var percentCounter = 0;
		$("form").find(".percent").each(function(index){
			var name = $(this).attr("name");
			var value = Number($(this).val());
			percentCounter = percentCounter + value;
		});
		if(percentCounter > 100){
			alert("La sumatoria de los porcentajes no debe ser mayor a 100.");
			ToReturn = false;
		}else{
			ToReturn = true;
		}
		return ToReturn;
	}
	(function CheckingTime() {
		
		$.ajax({
			type: "POST",
			url: "../wp-content/themes/tmp-theme/checktime.php",
			dataType: "html",
			success: function(resultado){
				if(resultado == "Destroyed"){
					alert("Su sesion ha culminado");
					$(location).attr('href',"../wp-content/themes/tmp-theme/exit.php")
				}
			}
		});

		setTimeout(CheckingTime, 60000);
	}());
	function GetTodayDate() {
		var tdate = new Date();
		var dd = tdate.getDate(); //yields day
		var MM = tdate.getMonth(); //yields month
		var yyyy = tdate.getFullYear(); //yields year
		var xxx = dd + "-" +( MM+1) + "-" + yyyy;

		return xxx;
	}
});

