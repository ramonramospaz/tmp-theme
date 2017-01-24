<?php /* Template Name: Elementos complementarios claves */

	ob_start();

	error_reporting(0);

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

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

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/eccs-autoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/complex-autosave.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
		<p>Los elementos complementarios claves son todos aquellos componentes que forman parte del "producto integral" como beneficios o valores agregados del servicio basico. Ejemplo para un servicio de Hoteleria: piscina, gimnasio, bar, restaurant, areas de oficinas, lobby, limpieza y mantenimiento, etc.</p>
		<p>(Mencione máximo 20)</p>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<form method="post" id="eccs">
				<input type="hidden" id="row" value="2">
				<div id="p_scents">
					<div class="group">
						<h2><label for="p_scnts"><input type="text" class="p_scnt" size="20" name="eccs[]" row="1" value="" placeholder="Elemento complementario clave de su servicio" /></label></h2>
						<h3>
							<select row="1" name="">
								<option value="0">Seleccione una opcion</option>
								<option value="1">Poco importante</option>
								<option value="2">Ligeramente importante</option>
								<option value="3">Medianamente importante</option>
								<option value="4">Muy importante</option>
								<option value="5">Sumamente importante</option>
								<option value="6">No aplica</option>
								<option value="7">No sabe</option>
							</select>
							<button type="button" class="rmvScnt">Eliminar</button>
						</h3>
					</div>
				</div>
				<a href="#" id="addScnt">Agregar +</a>
			
				<?php the_content(); ?>
			
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