<?php /* Template Name: R Visión Corporativa */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");

	/* VISION CORPORATIVA */
	$query_vcorporativa = mysqli_query($conexion, "SELECT * FROM wp_tmp_vcorporativa WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_vcorporativa) > 0){

		$row_vcorporativa = mysqli_fetch_assoc($query_vcorporativa);

		$visionlp = $row_vcorporativa["vlplazo"];

		$posicionlp = $row_vcorporativa["plplazo"];

		$rfuturo = $row_vcorporativa["rfuturo"];

		$cprincipal = $row_vcorporativa["cprincipal"];
	}

?>

<?php get_header(); ?>

	<!-- Section -->
	<section class="reporte mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>

		<?php get_template_part('heading-reportes'); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>
		
			<table class="pbasicos">
				<tr>
					<th class="mh">Visión corporativa</th>
				</tr>
				<tr>
					<th>¿Como quiere que esté su empresa en el futuro a largo plazo?</th>
				</tr>
				<tr>
					<td><?php echo $visionlp; ?></td>
				</tr>
				<tr>
					<th>¿En que posición se ve la empresa en el futuro a largo plazo?</th>
				</tr>
				<tr>
					<td><?php echo $posicionlp; ?></td>
				</tr>
				<tr>
					<th>¿Como quiere que sea vista y reconocida la empresa en el futuro?</th>
				</tr>
				<tr>
					<td><?php echo $rfuturo; ?></td>
				</tr>
				<tr>
					<th>¿Con que cualidad principal quisiera que mas se reconozca a su Empresa en el futuro?</th>
				</tr>
				<tr>
					<td><?php echo $cprincipal; ?></td>
				</tr>
				
				
			</table> 
			
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