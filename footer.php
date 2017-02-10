	<section id="brand">
		<?php if(qtranxf_getLanguage()=="es"){ ?>
		<p class="wrapper">The marketing planner es un producto exclusivo de &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/img/branding-sound-system.png"></p>
		<?php } ?>
		<?php if(qtranxf_getLanguage()=="en"){ ?>
		<p class="wrapper">The marketing planner is an exclusive product of &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/img/branding-sound-system.png"></p>
		<?php } ?>
	</section>
	<section id="sitemap">
		<div class="wrapper">
			<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/the-marketing-planner.png"></div>
			<nav>
				<ul class="menu">
					<?php if(qtranxf_getLanguage()=="es"){ ?>
					<li><a href="#home" rel="m_PageScroll2id">HOME</a></li>
					<li><a href="#about" rel="m_PageScroll2id">ACERCA DE</a></li>
					<li><a href="#servicios" rel="m_PageScroll2id">MIS SERVICIOS</a></li>
					<li><a href="#splan" rel="m_PageScroll2id">SOLICITA TU PLAN</a></li>
					<li><a href="#planes" rel="m_PageScroll2id">TUS PLANES DE MARKETING</a></li>
					<li><a href="#" rel="m_PageScroll2id">CONTACTO</a></li>
					<?php } ?>
					<?php if(qtranxf_getLanguage()=="en"){ ?>
					<li><a href="#home" rel="m_PageScroll2id">HOME</a></li>
					<li><a href="#about" rel="m_PageScroll2id">ABOUT</a></li>
					<li><a href="#servicios" rel="m_PageScroll2id">MY SERVICES</a></li>
					<li><a href="#splan" rel="m_PageScroll2id">REQUEST YOUR PLAN</a></li>
					<li><a href="#planes" rel="m_PageScroll2id">YOUR MARKETING PLANS</a></li>
					<li><a href="#" rel="m_PageScroll2id">CONTACT</a></li>
					<?php } ?>
				</ul>
			</nav>
			<p class="clear"></p>
		</div>
	</section>
	<!-- Footer -->
	<footer class="footer">

		<!-- Wrapper -->
		<div class="wrapper">
		
			<!-- Copyright -->
			<?php if(qtranxf_getLanguage()=="es"){ ?>
			<p class="copyright">Todos los derechos reservados The Marketing Planner 2015.</p>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
			<p class="copyright">All rights reserved The Marketing Planner 2015. YOUR MARKETING PLANS</p>
			<?php } ?>
			<!-- /Copyright -->
			
			<p class="clear"></p>
		</div>
		<!-- /Wrapper -->	
		
	</footer>
	<!-- /Footer -->

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/form.js" ></script>
	
	<?php 
		if(isset($_SESSION["disable"]) && $_SESSION["disable"] == 1){ 
	?>

		<script>
		$(document).ready(function(){
			$("input:radio[name=tipop][value=1]").attr("disabled", "disabled");
			//$("input:radio[name=tipop][value=2]").attr("checked", "checked");
		})
		</script>

	<?php 
		} 

	if(isset($_SESSION["disablecon"]) && $_SESSION["disablecon"] == 1){ 
	?>

		<script>
		$(document).ready(function(){
			$("input:radio[name=tbase][value=3]").attr("disabled", "disabled");
		})
		</script>

	<?php 
		} 
	?>
	
	<?php wp_footer(); ?>

</body>
</html>