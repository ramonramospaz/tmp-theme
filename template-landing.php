<?php /* Template Name: Construcción Template */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- DNS Prefetch --
	<link rel="dns-prefetch" href="//www.google-analytics.com"-->
	
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	
	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		
	<!-- CSS + jQuery + JavaScript -->
	<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-validate-form.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.3.min.js"></script>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
</head>
<body <?php body_class(); ?>>

	<section id="construction">	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<img src="<?php echo get_template_directory_uri(); ?>/img/the-marketing-planner.png" alt="The Marketing Planner">
			
			<h1><?php the_title(); ?></h1>
		
			<?php the_content(); ?>
			
			<p class="clear"></p>
			
		</article>
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
	
	<?php endif; ?>
	
	</section>
	
	<?php wp_footer(); ?>

</body>
</html>