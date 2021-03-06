<?php /* Template Name: Competencias distintivas */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] != 1){

		header("Location: /payment");

	}

	if($_SESSION["tmp_t_producto"] == 1){
		$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproductobienes INNER JOIN wp_tmp_ipreciobienes ON wp_tmp_iproductobienes.solicitud_id = wp_tmp_ipreciobienes.solicitud_id INNER JOIN wp_tmp_idistribucionbienes ON wp_tmp_iproductobienes.solicitud_id = wp_tmp_idistribucionbienes.solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproductobienes.solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproductobienes.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");

	} else{
		$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproductoservicios INNER JOIN wp_tmp_iprecioservicios ON wp_tmp_iproductoservicios.solicitud_id = wp_tmp_iprecioservicios.solicitud_id INNER JOIN wp_tmp_idistribucionservicios ON wp_tmp_iproductoservicios.solicitud_id = wp_tmp_idistribucionservicios.solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproductoservicios.solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproductoservicios = '".$_SESSION["tmp_id_solicitud"]."'");
	}

	if(mysqli_num_rows($query_buscar) > 0){
		$preguntas = '';
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		$y = 0;
		$Idioma=qtranxf_getLanguage();
		for($i=0;$i<$n;$i++){

			if($array[$array_keys[$i]] == '4'){
			$y++;
			$query_preguntas = mysqli_query($conexion, "SELECT id, pregunta FROM wp_tmp_preguntas WHERE name = '".$array_keys[$i]."' and 
					idioma='".$Idioma."' and tipo=".$_SESSION["tmp_t_producto"]);
				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);
					$preguntas .= '<h2>'.$row_preguntas["pregunta"].'</h2>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="1">Sumamente incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="2">Muy incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="3">Ligeramente incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="4">Ligeramente competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="5">Muy competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="6">Sumamente competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="7">No sabe</label></p>';
				}
			}else if($array[$array_keys[$i]] == '5'){

				$query_preguntas = mysqli_query($conexion, "SELECT id, pregunta FROM wp_tmp_preguntas WHERE name = '".$array_keys[$i]."' and 
					idioma='".$Idioma."' and tipo=".$_SESSION["tmp_t_producto"]);
				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);
					$preguntas .= '<h2>'.$row_preguntas["pregunta"].'</h2>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="1">Sumamente incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="2">
					Muy incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="3">Ligeramente incompetente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="4">Ligeramente competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="5">Muy competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="6">Sumamente competente</label></p>
					<p><label><input type="radio" name="'.$row_preguntas["id"].'" value="7">No sabe</label></p>';
				}
			}
		}

	} else {
		$preguntas ='No Hay preguntas';
	}

	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

		}

		//header("Location: /success.php");

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

			<form method="post" id="cdcompetencia">
		
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