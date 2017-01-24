$(document).ready(function(){



	$(window).load(function(){


		var tabla = $("form").attr("id");

		$.ajax({

			type: "POST",

			url: "../wp-content/themes/tmp-theme/consulta.php",

			data: { tabla:tabla },

			dataType: "html",

			success: function(data){
				var datos = JSON.parse(data);

				$.each(datos, function(key, value) {			

					var campo = $("[name="+key+"]");

					var tipo = campo.attr("type");

					if(tipo == 'radio'){

						campo.each(function(){

							var campo_value = $(this).val();

							if(campo_value == value){

								$(this).attr("checked", true);

							}

							var dv =  $("[name="+key+"]:checked").attr("data-dpnd");

							if(dv !== ''){

								$("#"+dv).addClass("active")

							}

						});

					} else if(tipo == 'checkbox'){

						var varray = value.split(',');

						campo.each(function(){

							var campo_value = $(this).attr("data-value");

							for(var i=0;i<varray.length;i++){

								if(campo_value == varray[i]){

									$(this).attr("checked", true);

								}

							}

						});

					} else {

						$("[name="+key+"]").val(value);

					}



				});

			},

			error: function(){

				alert("error");

			}

		});



	});

});