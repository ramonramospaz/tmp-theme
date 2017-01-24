<?php /* Template Name: Cuestionario */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	$actual_link = "$_SERVER[REQUEST_URI]";
	/* cuestionario actual
	$query_actual = mysqli_query("SELECT * FROM wp_tmp_actual WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
		if(mysqli_num_rows($query_actual) > 0){
			$query_actualizar = mysqli_query("UPDATE wp_tmp_actual SET  WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");


		}*/
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
		//echo "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND tproducto LIKE '%".$_SESSION['tmp_t_producto']."%' AND tconsumidor LIKE '%".$_SESSION['tmp_t_consumidor']."%' AND cuestionario_id  = '".$_POST['idc']."'";
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
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/funtions.js"></script>


	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content(); ?>
			
			<br class="clear">
			
		</article>
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
	
	<?php endif; ?>
	
	</div>
		
</section>

<?php get_footer(); ?>