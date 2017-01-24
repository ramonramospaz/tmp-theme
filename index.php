<?php get_header(); ?>
	
	<!-- Section -->
	<section>

		<div class="wrapper">
	
			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>
		
			<?php get_template_part('loop'); ?>
			
			<!-- Pagination -->
			<div id="pagination">
				<?php html5wp_pagination(); ?>
			</div>
			<!-- /Pagination -->
			
		</div>
		
	</section>
	<!-- /Section -->

<?php get_footer(); ?>