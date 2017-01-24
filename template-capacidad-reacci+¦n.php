<?php /* Template Name: Capacidad de reacción */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	/* CARACTER COMPETENCIA */
	$query_cc = mysqli_query($conexion, "SELECT pregunta_id, respuesta FROM wp_tmp_caractercompetencia WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_cc) > 0){

		$me = $pe = '';

		while($row_cc = mysqli_fetch_assoc($query_cc)){

			$pregunta = $row_cc["pregunta_id"];

			$respuesta = $row_cc["respuesta"];

			if($respuesta == 1){
				$me[] = $pregunta;				
			} else {
				$pe[] .= $pregunta;				
			}

		} 

	}
	/*VENTAJAS COMPARATIVAS VS COMPETENCIAS DISTINTIVAS */
	$query_vc_cd = mysqli_query($conexion, "SELECT wp_tmp_vcproducto.pregunta_id AS pregunta, wp_tmp_vcproducto.respuesta AS respuesta_vc, wp_tmp_cdcompetencia.respuesta AS respuesta_cdc FROM wp_tmp_vcproducto INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_vcproducto.pregunta_id = wp_tmp_cdcompetencia.pregunta_id WHERE wp_tmp_vcproducto.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_vc_cd) > 0){

		$c12 = $c13 = $c22 = $c23 = $c32 = $c33 = $c51 = $c52 = $c61 = $c62 = $inferior = $igual = $superior = array();

		$n = mysqli_num_rows($query_vc_cd);

		while($row_vc_cd = mysqli_fetch_assoc($query_vc_cd)){

			$pregunta = $row_vc_cd["pregunta"];

			$respuesta_vc = $row_vc_cd["respuesta_vc"];	

			$respuesta_cd = $row_vc_cd["respuesta_cdc"];

			if($respuesta_vc == 1){
				if($respuesta_cd == 5){
					$c51[] = $pregunta;
				} else if($respuesta_cd == 6){
					$c61[] = $pregunta;
				} else if($respuesta_cd == 7){
					$c61[] = $pregunta;
				}
				$inferior[] = $pregunta; 
			} else if($respuesta_vc == 2){
				if($respuesta_cd == 1){
					$c12[] = $pregunta;
				} else if($respuesta_cd == 2){
					$c22[] = $pregunta;
				} else if($respuesta_cd == 3){
					$c32[] = $pregunta;
				} else if($respuesta_cd == 5){
					$c52[] = $pregunta;
				} else if($respuesta_cd == 6){
					$c62[] = $pregunta;
				} else if($respuesta_cd == 7){
					$c62[] = $pregunta;
				}
				$igual[] = $pregunta; 
			} else if($respuesta_vc == 3){
				if($respuesta_cd == 1){
					$c13[] = $pregunta;
				} else if($respuesta_cd == 2){
					$c23[] = $pregunta;
				} else if($respuesta_cd == 3){
					$c33[] = $pregunta;
				} 
				$superior[] = $pregunta; 
			}
		}
			$cdme = array_merge($c22, $c32, $c33);
			$cdma = array_merge($c12, $c13, $c23);
	}

	/* F.C.E. VS COMPETENCIAS DISTINTIVAS DE LA COMPETENCIA */
	if($_SESSION["tmp_t_producto"] == 1){
		$tproducto = 'bienes';
	} else{
		$tproducto = 'servicios';
	}	
	$f41 = $f42 = $f43 = $f44 = $f45 = $f46 = $f51 = $f52 = $f53 = $f54 = $f55 = $f56 = array();
	$sii = $poi = $mei = $mui = $sui = array();

	$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproducto".$tproducto." INNER JOIN wp_tmp_iprecio".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_iprecio".$tproducto.".solicitud_id INNER JOIN wp_tmp_idistribucion".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_idistribucion".$tproducto.".solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'")or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_buscar) > 0){
		$row_buscar = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($row_buscar);
		$n = count($row_buscar);
		for($i=0;$i<$n;$i++){ 

			/* 1 */
			$query_preguntas_a = mysqli_query($conexion, "SELECT id, pregunta FROM wp_tmp_preguntas WHERE name = '".$array_keys[$i]."'") or die(mysqli_error($conexion));

			if(mysqli_num_rows($query_preguntas_a) > 0){

				$row_preguntas_a = mysqli_fetch_assoc($query_preguntas_a);

				if($row_buscar[$array_keys[$i]] == '1'){
					$sii[] = $row_preguntas_a["id"];
				} else if($row_buscar[$array_keys[$i]] == '2'){
					$poi[] = $row_preguntas_a["id"];
				} else if($row_buscar[$array_keys[$i]] == '3'){
					$mei[] = $row_preguntas_a["id"];
				} else if($row_buscar[$array_keys[$i]] == '4'){
					$mui[] = $row_preguntas_a["id"];
				} else if($row_buscar[$array_keys[$i]] == '5'){
					$sui[] = $row_preguntas_a["id"];
				}
			}
			/* 2 */
			if(($row_buscar[$array_keys[$i]] != '4') && ($row_buscar[$array_keys[$i]] != '5')){
			
			} else {

				$query_preguntas = mysqli_query($conexion, "SELECT wp_tmp_preguntas.id, pregunta, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND name = '".$array_keys[$i]."'") or die(mysqli_error($conexion));

				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);
					$id = $row_preguntas["id"];
					$pregunta = $row_preguntas["pregunta"];
					$respuesta = $row_preguntas["respuesta"];

					if($row_buscar[$array_keys[$i]] == '4'){	
						if($respuesta == 1){
							$f41[] = $id;
						} else if($respuesta == 2){
							$f42[] = $id;	
						} else if($respuesta == 3){
							$f43[] = $id;
						} else if($respuesta == 4){
							$f44[] = $id;
						} else if($respuesta == 5){
							$f45[] = $id;
						} else if($respuesta == 6){
							$f46[] = $id;
						} else if($respuesta == 7){
							$f46[] = $id;	
						}
					} else if($row_buscar[$array_keys[$i]] == '5'){
						if($respuesta == 1){
							$f51[] = $id;
						} else if($respuesta == 2){
							$f52[] = $id;	
						} else if($respuesta == 3){
							$f53[] = $id;
						} else if($respuesta == 4){
							$f54[] = $id;
						} else if($respuesta == 5){
							$f55[] = $id;
						} else if($respuesta == 6){
							$f56[] = $id;
						} else if($respuesta == 7){
							$f56[] = $id;	
						}

					}
					
				}
			}
		}
		$fdme = array_merge($f42,$f43,$f53);
		$fdma = array_merge($f41,$f51,$f52);		
		$com = array_merge($f45,$f46,$f55,$f56);
		$inc = array_merge($f41,$f42,$f43,$f51,$f52,$f53);

		/*Validar repetidos */
		$cdme = array_merge($cdme, $fdme);
		$cdme = array_unique($cdme);

		$cdma = array_merge($cdma, $fdma);
		$cdma = array_unique($cdma);

	} 

	/* Validar repetidos */

	/*Resultados negativos Muchos esfuerzos*/
	$rnme = array_merge($sui,$me,$inc,$superior);
	$rnme = array_unique($rnme);

	/*Resultados negativos Pocos esfuerzos*/
	$rnpe = array_merge($sui,$pe,$inc,$superior);
	$rnpe = array_unique($rnpe);

	$areas_vulnerables = array_merge($cdme, $cdma, $rnme, $rnpe);
	$areas_vulnerables = array_unique($areas_vulnerables);

	$preguntas = '';
	foreach ($areas_vulnerables as $area_vulnerable) {
		$query_preguntas = mysqli_query($conexion, "SELECT id, pregunta FROM wp_tmp_preguntas WHERE id = '".$area_vulnerable."'");
		if(mysqli_num_rows($query_preguntas) > 0){

			$row_preguntas = mysqli_fetch_assoc($query_preguntas);
			$preguntas .= '<h2>'.$row_preguntas["pregunta"].'</h2>
			<h3>Capacidad real: ¿Su competencia cuenta con recursos y talentos para reaccionar efectivamente a un plan estrategico de su producto en esta area?</h3>
			<p><label><input type="radio" name="creal_'.$row_preguntas["id"].'" value="11">Si.</label><label><input type="radio" name="creal_'.$row_preguntas["id"].'" value="12">No.</label></p>
			<h3>Capacidad motivacional: ¿Su competencia cuenta con la actitud y la motivación para reaccionar efectivamente a un plan estrategico de su producto en esta area?</h3>
			<p><label><input type="radio" name="cmotivacional_'.$row_preguntas["id"].'" value="21">Si.</label><label><input type="radio" name="cmotivacional_'.$row_preguntas["id"].'" value="22">No.</label></p>';
		}

	}
	
 ?>

<?php get_header(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pautoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/complex-autosave.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>

		<?php get_template_part('heading-reportes'); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<form method="post" id="creaccion">
		
			<?php echo $preguntas; ?>

			<?php the_content(); ?>			
			
			<br class="clear">
			
		</article>
		<!-- /Article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
	
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>