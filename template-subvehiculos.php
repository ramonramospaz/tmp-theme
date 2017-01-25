<?php /* Template Name: Subvehiculos */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	$Query = "SELECT * FROM wp_tmp_imedios WHERE wp_tmp_imedios.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$query_buscar = mysqli_query($conexion, $Query);

	if(mysqli_num_rows($query_buscar) > 0){
		$preguntas = '';
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		$y = 0;
		for($i=0;$i<$n;$i++){
			if(($array[$array_keys[$i]] == '3') || ($array[$array_keys[$i]] == '4') || ($array[$array_keys[$i]] == '5')){
				$Idioma=qtranxf_getLanguage();
				$Query = "SELECT id, pregunta FROM wp_tmp_preguntas WHERE name = '".$array_keys[$i]."' and idioma='".$Idioma."'";
				$query_preguntas = mysqli_query($conexion, $Query);
				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);
					$preguntas .= '<h2>'.$row_preguntas["pregunta"].'</h2>';
					$QuerySQL = "SELECT * FROM wp_tmp_preguntas WHERE rel = '".$row_preguntas['id']."'";
					$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
					while($row = mysqli_fetch_assoc($Query)){
						
						//Codigo multy idioma.
					if(qtranxf_getLanguage()=="es"){
					$preguntas .= '<h3>'.utf8_encode($row['pregunta']).'</h3>
						<p><label><input type="radio" name="'.$row['name'].'" value="1">Absolutamente sin importancia.</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="2">Poco importante.</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="3">Ni importante / ni poco importante.</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="4">Importante</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="5">Sumamente importante</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="6">No aplica</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="7">No sabe</label></p>';
					}
					if(qtranxf_getLanguage()=="en"){
					$preguntas .= '<h3>'.utf8_encode($row['pregunta']).'</h3>
						<p><label><input type="radio" name="'.$row['name'].'" value="1">Absolutely unimportant.</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="2">Less important.</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="3">Neither important / nor unimportant .</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="4">Important </label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="5">Very important</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="6">Doesnt apply</label></p>
						<p><label><input type="radio" name="'.$row['name'].'" value="7">Dont Know</label></p>';
					}
					}
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

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autosave.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<form method="post" id="esubvehiculosmedios">
		
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