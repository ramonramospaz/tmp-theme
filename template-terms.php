<?php /* Template Name: Terminos Template */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	
	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		
	<!-- CSS + jQuery + JavaScript -->
	<?php wp_head(); ?>
	<script>
	conditionizr({
		debug      : false,
		scriptSrc  : '<?php echo get_template_directory_uri(); ?>/js/conditionizr/',
		styleSrc   : '<?php echo get_template_directory_uri(); ?>/css/conditionizr/',
		ieLessThan : {active: true, version: '9', scripts: true, styles: true, classes: true, customScript: '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js'},
		chrome     : { scripts: true, styles: true, classes: true, customScript: false },
		safari     : { scripts: true, styles: true, classes: true, customScript: false },
		opera      : { scripts: true, styles: true, classes: true, customScript: false },
		firefox    : { scripts: true, styles: true, classes: true, customScript: false },
		ie10       : { scripts: true, styles: true, classes: true, customScript: false },
		ie9        : { scripts: true, styles: true, classes: true, customScript: false },
		ie8        : { scripts: true, styles: true, classes: true, customScript: false },
		ie7        : { scripts: true, styles: true, classes: true, customScript: false },
		ie6        : { scripts: true, styles: true, classes: true, customScript: false },
		retina     : { scripts: true, styles: true, classes: true, customScript: false },
		mac    : true,
		win    : true,
		x11    : true,
		linux  : true
	});
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
</head>
<body <?php body_class(); ?>>
	<!-- Section -->
	<section id="main" class="m_resize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
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

	<!-- jQuery CDN Failsafe to CloudFlare CDN -->
	<script>window.jQuery || document.write('<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"><\/script>');</script>
	
	<?php wp_footer(); ?>

</body>
</html>