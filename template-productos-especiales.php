<?php /* Template Name: Productos especiales */ ?>
<?php get_header(); ?>

	<section id="productos">

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