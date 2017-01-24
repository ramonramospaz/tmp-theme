<?php /* Template Name: Factores Claves Servicio */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	$Query = "SELECT * FROM wp_tmp_prelacionalservicio INNER JOIN wp_tmp_scliente ON wp_tmp_prelacionalservicio.solicitud_id = wp_tmp_scliente.solicitud_id WHERE wp_tmp_prelacionalservicio.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$query_buscar = mysqli_query($conexion, $Query) or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_buscar) > 0){
		$preguntas = '';
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		$y = 0;
		for($i=0;$i<$n;$i++){

			if(($array[$array_keys[$i]] == '4') || ($array[$array_keys[$i]] == '5')){
				$y++;
				$query_preguntas = mysqli_query($conexion, "SELECT id, pregunta FROM wp_tmp_preguntas WHERE name = '".get_field('formid')."_".$array_keys[$i]."'");
				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);

					$preguntas .= '<h2>'.utf8_encode($row_preguntas["pregunta"]).'</h2>';
					$preguntas .=  $_SESSION["sid"] == 141 ? '<div class="col-50">
					<h3>Competencias distintivas de la competencia</h3>
					<p class="cd"><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="1">0</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="2">1</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="3">2</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="4">3</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="5">4</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="6">5</label><label><input type="radio" name="cdc_'.$row_preguntas["id"].'" value="7">No sabe / No aplica</label></p>
					</div>' : '';
					$preguntas .= '<div class="col-50">
					<h3>Competencias distintivas de su servicio</h3>
					<p class="cd"><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="1">0</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="2">1</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="3">2</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="4">3</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="5">4</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="6">5</label><label><input type="radio" name="cds_'.$row_preguntas["id"].'" value="7">No sabe / No aplica</label></p>
					</div>
					<div class="col-50">
					<h3>Ventajas comparativas</h3>
					<p><label><input type="radio" name="vc_'.$row_preguntas["id"].'" value="1">Mi servicio es INFERIOR a la competencia</label></p>
					<p><label><input type="radio" name="vc_'.$row_preguntas["id"].'" value="2">Mi servicio es SIMILAR a la competencia</label></p>
					<p><label><input type="radio" name="vc_'.$row_preguntas["id"].'" value="3">Mi servicio es SUPERIOR a la competencia</label></p>
					<p><label><input type="radio" eccs="eccs" name="vc_'.$row_preguntas["id"].'E" value="4">No sabe / No aplica</label></p>
					</div>';
				}
			}
		}

		$Query = "select * from wp_tmp_eccs where solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$query_buscar = mysqli_query($conexion, $Query) or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_buscar) > 0){
			while($row = mysqli_fetch_array($query_buscar)){
				if(($row["respuesta"]  == "4") || (($row["respuesta"]  == "5"))){
					$Query = "SELECT id, pregunta FROM wp_tmp_preguntasusuarios WHERE id = '".$row["pregunta_id"]."'";
					$query_preguntas = mysqli_query($conexion, $Query);

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);

					$preguntas .= '<h2>'.$row_preguntas["pregunta"].'</h2>';
					$preguntas .=  $_SESSION["sid"] == 141 ? '<div class="col-50">
					<h3>Competencias distintivas de la competencia</h3>
					<p class="cd"><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="1">0</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="2">1</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="3">2</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="4">3</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="5">4</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="6">5</label><label><input type="radio" eccs="eccs" name="cdc_'.$row_preguntas["id"].'E" value="7">No sabe / No aplica</label></p>
					</div>' : '';
					$preguntas .= '<div class="col-50">
					<h3>Competencias distintivas de su servicio</h3>
					<p class="cd"><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="1">0</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="2">1</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="3">2</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="4">3</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="5">4</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="6">5</label><label><input type="radio" eccs="eccs" name="cds_'.$row_preguntas["id"].'E" value="7">No sabe / No aplica</label></p>
					</div>
					<div class="col-50">
					<h3>Ventajas comparativas</h3>
					<p><label><input type="radio" eccs="eccs" name="vc_'.$row_preguntas["id"].'E" value="1">Mi servicio es INFERIOR a la competencia</label></p>
					<p><label><input type="radio" eccs="eccs" name="vc_'.$row_preguntas["id"].'E" value="2">Mi servicio es SIMILAR a la competencia</label></p>
					<p><label><input type="radio" eccs="eccs" name="vc_'.$row_preguntas["id"].'E" value="3">Mi servicio es SUPERIOR a la competencia</label></p>
					<p><label><input type="radio" eccs="eccs" name="vc_'.$row_preguntas["id"].'E" value="4">No sabe / No aplica</label></p>
					</div>';
				}
			}
		}else{
			
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

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

		}

	}

?>

<?php get_header(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pautoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/complex-autosave.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fixednotes.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
		
		
		<div class="notas">
		<?php the_field('introduccion'); ?>
		<table>
			<tbody>
				<tr>
					<td>0</td>
					<td>NO SATISFACE necesidades ni expectativas y GENERA SEVERAS MOLESTIAS EN EL CLIENTE (PESIMA CALIDAD)</td>
				</tr>
				<tr>
					<td>1</td>
					<td>NO SATISFACE las necesidades ni expectativas del cliente (MALA CALIDAD)</td>
				</tr>
				<tr>
					<td>2</td>
					<td>SATISFACE MEDIANAMENTE la necesidad basica del cliente pero NO CUBRE las expectativas (BAJA CALIDAD)</td>
				</tr>
				<tr>
					<td>3</td>
					<td>SATISFACE las necesidades del cliente pero NO CUBRE las expectativas (CALIDAD PROMEDIO)</td>
				</tr>
				<tr>
					<td>4</td>
					<td>SATISFACE las necesidades y expectativas del cliente (BUENA CALIDAD)</td>
				</tr>
				<tr>
					<td>5</td>
					<td>SUPERA POSITIVAMENTE LAS EXPECTATIVAS del cliente hacia el servicio (EXCELENTE CALIDAD)</td>
				</tr>
			</tbody>
		</table>
		</div>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<form method="post" id="<?php the_field('formid'); ?>">
		
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