$(document).ready(function(){

	$("input:radio[name=clima]").change(function(){

		var valor =  $("input:radio[name=clima]:checked").val();



		if(valor == 1){

			$("#d_box1").addClass("active");

			$("#d_box2").removeClass("active");

		} else if(valor == 2){				

			$("#d_box2").addClass("active");

			$("#d_box1").removeClass("active");			

		} else {

			$("#d_box1").removeClass("active");	

			$("#d_box2").removeClass("active");

		}



	});



	/*Briefing*/

		var val =  $("input:radio[name=tipou]:checked").val();

		if(val == 1){

			$("#d_box1").addClass("activo");

		} else if(val == 2){		

			$("#d_box2").addClass("activo");	

		}



	$("input:radio[name=tipou]").change(function(){

		var valor =  $("input:radio[name=tipou]:checked").val();

		if(valor == 1){

			$("#d_box1").addClass("activo");

			$("#d_box2").removeClass("activo");

		} else if(valor == 2){				

			$("#d_box2").addClass("activo");

			$("#d_box1").removeClass("activo");			

		}

	});



	$(window).ready(function(){

		var valorcm = $("input[name=cmercado]:checked").val();

		if(valorcm == 1){

			$("#d_box1").addClass("active");

			$("#d_box2").removeClass("active");

			$("#d_box3").removeClass("active");

		} else if(valorcm == 2){				

			$("#d_box2").addClass("active");

			$("#d_box1").removeClass("active");

			$("#d_box3").removeClass("active");	

		} else if(valorcm == 3){				

			$("#d_box3").addClass("active");

			$("#d_box1").removeClass("active");

			$("#d_box2").removeClass("active");			

		} else {

			$("#d_box1").removeClass("active");	

			$("#d_box2").removeClass("active");

			$("#d_box3").removeClass("active");

		}

	});



	/* COMPORTAMIENTO */

	$("input:radio[name=cmercado]").change(function(){

		var valor =  $("input:radio[name=cmercado]:checked").val();



		if(valor == 1){

			$("#d_box1").addClass("active");

			$("#d_box2").removeClass("active");

			$("#d_box3").removeClass("active");

		} else if(valor == 2){				

			$("#d_box2").addClass("active");

			$("#d_box1").removeClass("active");

			$("#d_box3").removeClass("active");	

		} else if(valor == 3){				

			$("#d_box3").addClass("active");

			$("#d_box1").removeClass("active");

			$("#d_box2").removeClass("active");			

		} else {

			$("#d_box1").removeClass("active");	

			$("#d_box2").removeClass("active");

			$("#d_box3").removeClass("active");

		}



	});

	/* FCE */

	$("input:radio.selector").each(function(){



		$(this).change(function(){

			var element = $(this);

			var name = element.attr("name");

			var valor = element.val();		


			if(valor == 1){

				$("#"+name+"amenaza").addClass("active");

				$("#"+name+"oportunidad").removeClass("active");

			} else if(valor == 2){				

				$("#"+name+"oportunidad").addClass("active");

				$("#"+name+"amenaza").removeClass("active");

			} else if(valor == 3){

				$("#"+name+"amenaza").removeClass("active");

				$("#"+name+"oportunidad").removeClass("active");

			} else if(valor == 4){

				$("#"+name+"amenaza").removeClass("active");

				$("#"+name+"oportunidad").removeClass("active");

			}



		});

	});



	$("input:radio.selector").each(function(){

		var este = $(this);

		var name1 = $(this).attr("name");

		var valor = $("input:radio["+name1+"]").val();

			if(valor == 1){

				$(".amenaza."+name1).addClass("active");

			} else if(valor == 2){				

				$(".oportunidad."+name1).addClass("active");

			}

	});



});