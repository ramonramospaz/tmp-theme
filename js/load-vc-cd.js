$(document).ready(function(){	



	var tabla = $("form").attr("id");



	$.ajax({

		type: "POST",

		url: "../wp-content/themes/tmp-theme/consulta.php",

		data: { tabla:tabla },

		dataType: "html",

		success: function(data){

			var datos = JSON.parse(data);

			$.each(datos, function(key, value) {			

				var campo = $("input[name="+key+"]");

				var tipo = campo.attr("type");

				if(tipo == 'radio'){

					campo.each(function(){

						var campo_value = $(this).val();

						if(campo_value == value){

							$(this).attr("checked", true);

						}

					});

				} else {

					$("input[name="+key+"]").val(value);

				}



			});

		},

		error: function(){

			alert("error");

		}

	});

});