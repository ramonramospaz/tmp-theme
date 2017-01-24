<?php /* Template Name: Reportes login */

	ob_start();

	session_start();
	
	include("config/conexion.php");

	if(isset($_SESSION["tmp_admin_id_bss"]) && isset($_SESSION["tmp_admin_user_bss"]) && isset($_SESSION["tmp_admin_email_bss"])){

		header("Location:/panel");

	}
?>
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
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-validate-form.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.3.min.js"></script>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
</head>
<body <?php body_class(); ?>>

<!-- LOADING -->

<div id="loading"><div><p><img src="../wp-content/themes/tmp-theme/img/the-marketing-planner.png"></p><p>Loading</p><p><img src="<?php echo get_template_directory_uri(); ?>/icons/loading.gif"></p></div></div>
	
	<!-- Section -->
	<section class="resize">

	<div class="wrapper">

	<?php echo $true;  ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<?php echo $_SESSION["tmp_id_user"]; the_content(); ?>				
		
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