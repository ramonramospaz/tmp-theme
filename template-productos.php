<?php /* Template Name: Servicios express */
session_start();
?>
<?php get_header(); ?>
	
	<section id="pservicios">

		<div class="wrapper">
	
			<h1><?php the_title(); ?></h1>

			<section id="diseños">

				<h2>Planes</h2>
			
				<?php query_posts('category_name=planes&showposts=10'); ?>
				<?php get_template_part('loop'); ?>
			</section>

			<section id="diagnosticos">

				<h2>Diagnósticos</h2>
			
				<?php query_posts('category_name=diagnosticos&showposts=10'); ?>
				<?php get_template_part('loop'); ?>
			</section>

		</div>
	
	</section>

<?php get_footer(); ?>