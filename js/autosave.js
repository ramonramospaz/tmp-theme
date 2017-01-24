$(document).ready(function(){



	$("input:radio, input:text, input[type='number'], input.shrt, textarea, select").each(function(){



		$(this).change(function(){

			var element = $(this);

			var name = element.attr("name");

			var valor = element.val();

			var tabla = element.closest("form").attr("id");
			
			$.ajax({
				type: "POST",
				url: "../wp-content/themes/tmp-theme/autoguardar.php",
				data: { tabla:tabla, campo:name, valor:valor},
				dataType: "html",
				beforeSend: function(){
					$(".saving").html("<p>Guardando <img src='../wp-content/themes/tmp-theme/icons/ajax-loader.gif'></p>");
					$(".saving").css("display","block");
				},
				success: function(resultado){
					setTimeout(function() { $(".saving").fadeOut(500); }, 1500);
				}
			});
		});

	});



	$('input:checkbox').change(function(){

		var checkboxvalues = '';

		var element = $(this);

		var name = element.attr("name");

		var tabla = element.closest("form").attr("id");

		var Cont = 0;

		$("input[name="+name+"]:checked").each(function(){
			Cont++;
			checkboxvalues += $(this).attr("data-value") +',';
			checkboxvaluess = checkboxvalues.substring(0, checkboxvalues.length-1);
		});

		if(Cont > 0){
			$.ajax({
				type: "POST",
				url: "../wp-content/themes/tmp-theme/autoguardar.php",
				data: { tabla:tabla, campo:name, valor:checkboxvaluess},
				dataType: "html",
				beforeSend: function(){
					$(".saving").html("<p>Guardando <img src='../wp-content/themes/tmp-theme/icons/ajax-loader.gif'></p>");
					$(".saving").css("display","block");
				},
				success: function(resultado){
					setTimeout(function() { $(".saving").fadeOut(500); }, 1500);
				}
			});
		}

	});



	$("input:file").each(function(){



		$(this).change(function(){



			var element = $(this);

			var name = element.attr("name");

			var valor = element.val();

			var tabla = element.closest("form").attr("id");



			$.ajax({

				type: "POST",

				url: "../wp-content/themes/tmp-theme/loadimage.php",

				data: { tabla:tabla, campo:name, valor:valor},

				dataType: "html",

				beforeSend: function(){

					$(".saving").html("<p>Guardando <img src='../wp-content/themes/tmp-theme/icons/ajax-loader.gif'></p>");

					$(".saving").css("display","block");

				},

				success: function(resultado){

					setTimeout(function() { $(".saving").fadeOut(500); }, 1500);

				}



			});



		});

	});
});