<?php /* Template Name: Ventajas comparativas */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}

	if($_SESSION["tmp_t_producto"] == 1){
		$tproducto = 'bienes';
	} else{
		$tproducto = 'servicios';
	}
	//Producto, Precio, Distribucion y Promocion
	$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproducto".$tproducto." INNER JOIN wp_tmp_iprecio".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_iprecio".$tproducto.".solicitud_id INNER JOIN wp_tmp_idistribucion".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_idistribucion".$tproducto.".solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");

	if(mysqli_num_rows($query_buscar) == 0){
		//publicidad, promocionventas, relacionespublicas, ventaspersonales, marketingdirecto
		$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_ipublicidad INNER JOIN wp_tmp_ipromocionventas ON wp_tmp_ipublicidad.solicitud_id = wp_tmp_ipromocionventas.solicitud_id INNER JOIN wp_tmp_irelacionespublicas ON wp_tmp_ipublicidad.solicitud_id = wp_tmp_irelacionespublicas.solicitud_id INNER JOIN wp_tmp_iventaspersonales ON wp_tmp_ipublicidad.solicitud_id = wp_tmp_iventaspersonales.solicitud_id INNER JOIN wp_tmp_imarketingdirecto ON wp_tmp_ipublicidad.solicitud_id = wp_tmp_imarketingdirecto.solicitud_id INNER JOIN wp_tmp_imarketingdigital ON wp_tmp_ipublicidad.solicitud_id = wp_tmp_imarketingdigital.solicitud_id WHERE wp_tmp_ipublicidad.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
	}
	if(mysqli_num_rows($query_buscar) == 0){
		//epublicitaria, ecreativa, emensajepulicitario, emedios
		$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_eepublicitaria INNER JOIN wp_tmp_eecreativa ON wp_tmp_eepublicitaria.solicitud_id = wp_tmp_eecreativa.solicitud_id INNER JOIN wp_tmp_empublicitario ON wp_tmp_empublicitario.solicitud_id = wp_tmp_eecreativa.solicitud_id INNER JOIN wp_tmp_eemedios ON wp_tmp_eemedios.solicitud_id = wp_tmp_eecreativa.solicitud_id INNER JOIN wp_tmp_esubvehiculosmedios ON wp_tmp_esubvehiculosmedios.solicitud_id = wp_tmp_eecreativa.solicitud_id WHERE wp_tmp_eepublicitaria.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
	}
	if(mysqli_num_rows($query_buscar) > 0){
		$preguntas = '';
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		$y = 0;
		$Relacion = "";
		$RelacionTexto = "";
		$Idioma=qtranxf_getLanguage();
		for($i=0;$i<$n;$i++){
			if(($array[$array_keys[$i]] == '4') || ($array[$array_keys[$i]] == '5')){
				$query_preguntas = mysqli_query($conexion, "SELECT id, pregunta, rel FROM wp_tmp_preguntas WHERE name = '".$array_keys[$i]."' and 
					idioma='".$Idioma."'");
				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);

					if($row_preguntas['rel'] != 0){
						$QueryPregunta = "SELECT * from wp_tmp_preguntas WHERE id = '".$row_preguntas['rel']."'";
						$PreguntaRel = mysqli_query($conexion, $QueryPregunta) or die(mysqli_error($conexion));
						while($rowPreguntaRel = mysqli_fetch_assoc($PreguntaRel)){
							if($Relacion != $rowPreguntaRel['id']){
								$Relacion = $rowPreguntaRel['id'];
								$RelacionTexto = $rowPreguntaRel['pregunta'];
								$preguntas .= '<h3>'.$RelacionTexto.'</h3>';
							}
						}
					}

					$preguntas .= '<h2>'.utf8_encode($row_preguntas["pregunta"]).'</h2>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="1">Mi producto es INFERIOR a la competencia.</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="2">Mi producto está IGUAL que la competencia.</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="3">Mi producto es SUPERIOR a la competencia.</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="4">No sabe</label></p>';
				}
			}
		}

	} else {
		$preguntas ='No Hay preguntas';
	}

	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_progreso = mysqli_query($conexion, "SELECT progreso FROM wp_tmp_solicitud WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");

		if(mysqli_num_rows($query_progreso) > 0){
			$row_progreso = mysqli_fetch_assoc($query_progreso);
			$progreso = $row_progreso["progreso"];
			if($progreso !== ''){
				$is_array = strpos($progreso, ',');
				if($is_array !== false){
					$progreso = explode(',',$row_progreso["progreso"]);
					$progreso = array_unique($progreso);
				}else{
					$progreso = array($progreso);
				}
				
				$find = in_array($_POST['idc'], $progreso);

				if(!$find){
					$progreso[] = $_POST['idc'];
					$new_progreso = implode(",", $progreso);
					$query_update_progreso = mysqli_query($conexion,"UPDATE wp_tmp_solicitud SET progreso ='".$new_progreso."' WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");
				}
			} else {
				$query_update_progreso = mysqli_query($conexion,"UPDATE wp_tmp_solicitud SET progreso ='".$_POST['idc']."' WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");
			}
		}

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND tproducto LIKE '%".$_SESSION['tmp_t_producto']."%' AND tconsumidor LIKE '%".$_SESSION['tmp_t_consumidor']."%' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location: ../".$enlace);

		}

	}

?>

<?php get_header(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pautoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/complex-autosave.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/SoloRadioQuestionAnsweredValidation.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<form method="post" id="vcproducto">
		
			<?php  echo $preguntas; ?>
		
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