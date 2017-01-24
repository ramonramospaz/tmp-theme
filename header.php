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
<div id="loading"><div><p><img src="../wp-content/themes/tmp-theme/img/the-marketing-planner.png"></p><p>Loading</p><p><img src="<?php echo get_template_directory_uri(); ?>/icons/loading.gif"></p></div></div>

		<header class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
					</a>
				</div>
				<nav>
					<ul class="menu">
						<section id="lang">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('language_widget') ) : ?>;<?php endif; ?>
						</section>
						<?php get_template_part('menu'); ?>
					</ul>
				</nav>
				<button id="mbutton"></button>
				<p class="clear"></p>
			</div>
			<p class="clear"></p>

			<?php if(isset($_SESSION["tmp_user_nombre"])){ ?>

			<section class="user">
				<p>Hola, <?php echo $_SESSION["tmp_user_nombre"]; ?> <a href="<?php echo get_template_directory_uri(); ?>/exit.php">Logout</a></p> 
			</section>

			<?php } ?>

		</header>

		<!-- /Header -->
<?php
	$aditionalTime=strtotime("+20 minute");
	$_SESSION['BusyTime'] = date("h:i:s", $aditionalTime);
	echo get_page_template();
	//print_r( debug_backtrace() );
?>