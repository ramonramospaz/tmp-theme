$(document).ready(function(){
	$("html").on("change",'input[type="radio"], input[type="text"], input[type="checkbox"], textarea, select',function(){
		var element = $(this);
		var name = element.attr("name");
		var valor = element.val();
		var tabla = element.closest("form").attr("id");
		if($.trim(valor) == ""){
			element.addClass("errorField");
			return false;
		}else{
			element.removeClass("errorField");
		}
		// para tabla eccs
			var row = element.attr("row");
		// para fcs
			var eccs = element.attr("eccs");
		$.ajax({
			type: "POST",
			url: "../wp-content/themes/tmp-theme/autosave.php",
			data: { tabla:tabla, campo:name, valor:valor, row:row, eccs: eccs},
			dataType: "html",
			beforeSend: function(){
				$(".saving").html("<p>Guardando <img src='../wp-content/themes/tmp-theme/icons/ajax-loader.gif'></p>");
				$(".saving").css("display","block");
			},
			success: function(resultado){
				if(row != undefined){
					switch(resultado){
						case '1':
							break;
						case '0':
							break;
						default:
							var datos = JSON.parse(resultado);
							if(datos.Result == "1"){
								//alert(resultado);
								$("#row").val(datos.nextRow);
								$("#addScnt").click();
								$("#p_scents .group select[row='"+datos.rowActual+"']").attr("name",datos.pregunta);
							}
							break;
					}
				}
				setTimeout(function() { $(".saving").fadeOut(500); }, 1500);
			}
		});
	});
});