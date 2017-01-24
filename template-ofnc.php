<?php /* Template Name: Otros factores no controlables */

	ob_start();

	error_reporting(0);

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}

	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

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

			<form method="post" id="ofnc">

			<div id="p_scents">
			    <div class="group">
			    	<h2><label for="p_scnts"><input type="text" class="p_scnt" size="20" name="eccs[]" value="" placeholder="Otro factor no controlable" /></label><button type="button" class="rmvScnt">Eliminar</button></h2>

					<p><label><input type="radio" name="fnc" value="1">No aplica en su mercado.</label></p>
					<p><label><input type="radio" name="fnc" value="2">No influye, ni amenaza ni oportunidad.</label></p>

					<h3>¿Que tanto AFECTA cada factor a sus objetivos y acciones comerciales?</h3>

					<p>
					<select name="afecta[]">
						<option value="1">Afecta muy poco.</option>
						<option value="2">Afecta poco.</option>
						<option  value="3">Afecta medianamente.</option>
						<option value="4">Afecta Mucho.</option>
						<option value="5">Afecta Muchisimo.</option>
					</select>
					</p>

					<h3>¿Que tan preparada está SU MARCA para CONTRARESTAR esta amenaza?</h3>
					<p>
					<select name="contrarestar[]">
						<option value="1">Muy mal preparada.</option>
						<option value="2">Mal preparada.</option>
						<option value="3">Ligeramente preparada.</option>
						<option value="4">Medianamente preparada.</option>
						<option value="5">Bien preparada.</option>
						<option value="6">Muy bien preparada.</option>
					</select>
					</p>

					<h3>¿Que tanto FAVORECE cada factor a sus objetivos y acciones comerciales?</h3>
					<p>
					<select name="contrarestar[]">
						<option value="1">Favorece muy poco.</option>
						<option value="2">Favorece poco.</option>
						<option value="3">Favorece medianamente.</option>
						<option value="4">Favorece Mucho.</option>
						<option value="5">Favorece Muchisimo.</option>
					</select>
					</p>

					<h3>¿Que tan preparada está SU MARCA para APROVECHAR esta oportunidad?</h3>

					<p>
					<select name="aprovechar[]">
						<option value="1">Muy mal preparada.</option>
						<option value="2">Mal preparada.</option>
						<option value="3">Ligeramente preparada.</option>
						<option value="4">Medianamente</option>
						<option value="5">Bien preparada.</option>
						<option value="6">Muy bien preparada.</option>
					</select>
					</p>			    	
			    </div>
			</div>
			<a href="#" id="addGrp">Agregar +</a>
		
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