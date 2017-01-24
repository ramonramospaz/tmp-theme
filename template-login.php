<?php /* Template Name: Login Template */

	ob_start();

	session_start();
	
	include("config/conexion.php");

	if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"])){

		if($_SESSION["tmp_id_servicio"] != 0){

			if(isset($_SESSION['payment_servicio_id'])){		

				header("Location: ../payment");

			} else {

				$query_solicitud = mysqli_query($conexion, "SELECT servicio_id, status, tipop, tbase FROM wp_tmp_solicitud INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE wp_tmp_solicitud.id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'") or die(mysqli_error($conexion));

				if(mysqli_num_rows($query_solicitud) > 0){

					$row_solicitud = mysqli_fetch_assoc($query_solicitud);

					$_SESSION["tmp_id_solicitud"] = $_SESSION["tmp_id_solicitud"];

					$_SESSION["tmp_id_servicio"] = $row_solicitud["servicio_id"];

					$_SESSION["tmp_status"] = $row_solicitud["status"];

					$_SESSION["tmp_t_producto"] = $row_solicitud["tipop"];

					$_SESSION["tmp_t_consumidor"] = $row_solicitud["tbase"];

					header("Location: ../solicitud-actual");
				}

			}

		} else {

			header("Location: ../servicios");

		}

	}
?>

<?php get_header(); ?>
	
	<section class="resize">

	<div class="wrapper">

	<?php echo $true;  ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>				
		
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