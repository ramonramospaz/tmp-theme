<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- Post Thumbnail -->
		<div class="thumbnail">
		<?php if ( has_post_thumbnail()) :  ?>
			
			<?php the_post_thumbnail();  ?>
			
		<?php endif; ?>
		</div>
		<!-- /Post Thumbnail -->
		
		<summary>
			<!-- Post Title -->
			<h3><?php the_title(); ?></h3>
			<!-- /Post Title -->	
			
			<?php the_content(); ?>
		</summary>

		<div class="contenido">
			<?php the_field('contenido'); ?>
			<p class="precio">$<?php the_field('precio'); ?></p>
			<a href="<?php echo get_home_url(); ?>/solicitar?serv=<?php the_ID(); ?>">SOLICITE AHORA</a>
		</div>
		
		<p class="clear"></p>
		
		
	</article>
	<!-- /Article -->
	
<?php endwhile; ?>

<?php else: ?>

	<!-- Article -->
	<article>
		<p><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></p>
	</article>
	<!-- /Article -->

<?php endif; ?>