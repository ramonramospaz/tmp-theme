<?php /* Template Name: Mis Servicios de Asesoria */ ?>
<?php get_header(); ?>

	<section class="cuestionario mresize">

		<div class="wrapper">
	
			
		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>		
			
				<?php the_content(); ?>
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<article>
				
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				
			</article>
		
		<?php endif; ?>

		<p class="clear"></p>

		</div>
	
	</section>

<?php get_footer(); ?>