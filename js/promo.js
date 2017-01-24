$(document).ready(function(){



	$("#promo input:text").on("input", function(){



		var element = $(this);

		var valor = element.val();



		$.ajax({

			type: "POST",

			url: "../wp-content/themes/tmp-theme/promo.php",

			data: { valor:valor},

			dataType: "html",

			beforeSend: function(){

				$(".status").html("<img src='../wp-content/themes/tmp-theme/icons/ajax-loader.gif'>");

			},

			success: function(data){

				var datos = JSON.parse(data);

				var descuento = datos.descuento;

				var total = datos.total;

				switch(descuento){

					case '0':

						$(".status").html("<img src='../wp-content/themes/tmp-theme/icons/error.png'>");

						$("#ds").html("");

						$("#tt").html("");

						$(".result").html("");

					break;

					default:

						$(".status").html("<img src='../wp-content/themes/tmp-theme/icons/correct.png'>");

						$("#ds").html("<td><h3>Descuento</h3></td><td><p class='precio'>$"+descuento+"</p></td>");

						$("#tt").html("<td><h3>Total</h3></td><td><p class='precio'>$"+total+"</p></td>");

						$(".result").css("display", "block");

					break;

				}

				

			}



		});

	});

	

	$("#promo #use").click(function(){



		var element = $("#promo input:text");

		var valor = element.val();



		$.ajax({

			type: "POST",

			url: "../wp-content/themes/tmp-theme/use-promo.php",

			data: { valor:valor},

			dataType: "html",

			success: function(data){

				var datos = JSON.parse(data);

				var descuento = datos.descuento;

				var total = datos.total;

				switch(descuento){

					case '0':

						$(".status").html("<img src='../wp-content/themes/tmp-theme/icons/error.png'>");

						$("#ds").html("");

						$("#tt").html("");

						$("input:hidden[name=amount]").val(total);

					break;

					default:

						$("#promo input:text").attr("disabled", true);

						$(".result").css("display","none");		

						$("input:hidden[name=amount]").val(total);

					break;

				}

				

			}



		});



		return false;

	});



	$(".paypalbuttonimage").attr("disabled", true);



	$('#terminos').change(function () {

    	if ($(this).is(":checked")) {

        	$(".paypalbuttonimage").attr("disabled", false);

    	} else {

    		$(".paypalbuttonimage").attr("disabled", true);

    	// not checked

    	}

	});

});

