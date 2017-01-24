<?php /* Template Name: About */ ?>
<?php get_header(); ?>
	<section id="h_about">
		<div class="wrapper">
			<?php echo get_the_post_thumbnail(); ?>
		</div>
	</section>

	<section id="about">

		<div class="wrapper">
	
			<h1><?php the_title(); ?></h1>
		
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