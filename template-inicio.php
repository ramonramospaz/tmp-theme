<?php /* Template Name: Inicio */ 

session_start();

if(!isset($_SESSION["tmp_id_user"]) && !isset($_SESSION["tmp_user_nombre"]) && !isset($_SESSION["tmp_user_email"]) && !isset($_SESSION["tmp_user_status"])){ 

	include("config/conexion.php");

} 

get_header();

if(!isset($_SESSION["tmp_id_user"]) && !isset($_SESSION["tmp_user_nombre"]) && !isset($_SESSION["tmp_user_email"]) && !isset($_SESSION["tmp_user_status"])){ 
	
	get_template_part('registro'); 

} 
?>
	
<!-- Section -->
<section id="home" class="m_resize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
		
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="image">

				<?php query_posts('category_name=video&showposts=1'); ?>
	
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					
					<?php the_content(); ?>
						
					<p class="clear"></p>
					
				<?php endwhile; ?>
				
				<?php else: ?>
					
						
					<p><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></p>
				
				<?php endif; ?>
				
			</div>
											
			<br class="clear">				
				
		</article>
		<!-- /Article -->

	</div>

	<section id="intro">
		<?php if(qtranxf_getLanguage()=="es"){ ?>
		<h2>Tu asesor<br/><strong> online</strong><br/><span>de Negocios</span></h2>
		<?php } ?>
		<?php if(qtranxf_getLanguage()=="en"){ ?>
		<h2>Your online<br/><strong> business</strong><br/><span> Advisor</span></h2>
		<?php } ?>
	</section>
	
</section>
<!-- /Section -->

<!-- Section -->
<section id="about">

	<div class="wrapper">
	
		<h1>Acerca de mi</h1>
		
			<article>
				<a href="../quien-soy"><img src="<?php echo get_template_directory_uri(); ?>/img/quien-soy.png" alt="Quién soy" title="Quién soy"></a>
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2><a href="../quien-soy">Quien Soy</a></h2>
				<p>Una Agencia Online de Marketing y Negocios</p>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2><a href="../quien-soy">Who I am</a></h2>
				<p>An Online Marketing and Business Agency</p>
				<?php } ?>
			</article>

			<article>
				<a href="../mi-metodologia"><img src="<?php echo get_template_directory_uri(); ?>/img/metodologia.png" alt="Mi metodologia" title="Mi metodologia"></a>
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2><a href="../mi-metodologia">Mi Metodologia</a></h2>
				<p>Sistemas inteligentes y online de recolección, procesamiento y análisis de datos, para el diseño de las soluciones requeridas.</p>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2><a href="../mi-metodologia">My Methodology</a></h2>
				<p>Intelligent and online systems for data collection, processing and analysis, for the design of the required solutions.</p>
				<?php } ?>
			</article>

			<article>
				<a href="../mi-equipo"><img src="<?php echo get_template_directory_uri(); ?>/img/equipo.png" alt="Mi equipo" title="Mi equipo"></a>
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2><a href="../mi-equipo">Mi Equipo</a></h2>
				<p>Un staff multidisciplinario de creativos profesionales, obsesionados con la diferenciación y la innovación.</p>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2><a href="../mi-equipo">My team</a></h2>
				<p>A multidisciplinary staff of professional creatives, obsessed with differentiation and innovation.</p>
				<?php } ?>
			</article>

			<article>
				<a href="../mis-pbo"><img src="<?php echo get_template_directory_uri(); ?>/img/clientes.png" alt="Mis principios básicos institucionáles" title="Mis principios básicos institucionáles"></a>
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2><a href="../mis-pbo">Mis P.B.O.</a></h2>
				<p>Mis Principios Básicos Organizacionales: Misión, Visión y Valores.</p>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2><a href="../mis-pbo">My P.B.O.</a></h2>
				<p>My Basic Organizational Principles: Mission, Vision and Values.</p>
				<?php } ?>
			</article>

		<p class="clear"></p>

	</div>
	
</section>
<!-- /Section -->

<?php /*<!-- Section -->
<section id="servicios" class="resize">

	<div class="wrapper">
	
		<h1>Servicios</h1>
		
			<article id="express">
				<div class="border">
					<a href="<?php echo get_home_url(); ?>/productos-express"><summary>
						<div class="absol">
							<h2>Servicios ”EXPRESS”</h2>
							<p>Productos con estructuras y precios predeterminados</p>
						<div>
					</summary></a>
				</div>
			</article>

			<article id="especiales">
				<div class="border">
					<!--a href="<?php echo get_home_url(); ?>/productos-especiales"--><summary>
						<div class="absol">
							<h2>Servicios ”ESPECIALES”</h2>
							<p>Productos con estructuras y precios por definir según el alcance del proyecto</p>
						</div>
					</summary><!--/a-->
				</div>
			</article>			

		<p class="clear"></p>

	</div>
	
</section>
<!-- /Section -->

<!-- Section -->
<section id="splan" class="resize">

	<div class="wrapper">
	
		<h1>Solicíta tu plan</h1>			

		<!-- Article -->
		<article>
			<img src="<?php echo get_template_directory_uri(); ?>/img/solicita-tu-plan.png" alt="Solicita tu plán">
			<?php query_posts('category_name=solicitud&showposts=1'); ?>
	
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
					
				<p class="clear"></p>
				
			<?php endwhile; ?>
			
			<?php else: ?>
				
					
			<p><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></p>
			
			<?php endif; ?>
			
			<a href="/login">SOLICITA TU PLAN</a>
		</article>
		<!-- /Article -->

	</div>
	
</section>
<!-- /Section -->*/ ?>

<!-- Section -->
<section id="planes" class="resize">
	<div class="wrapper">
	
		<h1>Tus planes de Marketing</h1>

		<section class="ab_box">		

			<article>
				<img src="<?php echo get_template_directory_uri(); ?>/img/historial-de-solicitudes.png" alt="Historial de solicitudes" title="Historial de solicitudes">
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2>Historial<br> de solicitudes</h2>
				<a href="../historial-de-solicitudes">CLICK AQUI</a>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2>History<br> Request</h2>
				<a href="../historial-de-solicitudes">CLICK HERE</a>
				<?php } ?>
			</article>

			<article>
				<img src="<?php echo get_template_directory_uri(); ?>/img/status-de-tu-solicitud.png" alt="Status de tu solicitud actual" title="Status de tu solicitud actual">
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2>Status de tu solicitud actual</h2>
				<a href="../solicitud-actual">CLICK AQUI</a>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2>Status of your current request</h2>
				<a href="../solicitud-actual">CLICK HERE</a>
				<?php } ?>
			</article>

			<article>
				<img src="<?php echo get_template_directory_uri(); ?>/img/notificaciones.png" alt="Notificaciones" title="Notificaciones">
				<?php if(qtranxf_getLanguage()=="es"){ ?>
				<h2><br>Notificaciones</h2>
				<a href="../notificaciones">CLICK AQUI</a>
				<?php } ?>
				<?php if(qtranxf_getLanguage()=="en"){ ?>
				<h2><br>Notifications</h2>
				<a href="../notificaciones">CLICK HERE</a>
				<?php } ?>
			</article>
			<p class="clear"></p>

		</section>
		<!-- /Section -->

	</div>

	<section class="b_bar">

		<div class="wrapper">
			<?php if(qtranxf_getLanguage()=="es"){ ?>
			<p><strong>"TÚ CONOCES TU NEGOCIO,</strong><br> yo de planificación de marketing"</p>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
			<p><strong>"YOU KNOW YOUR BUSINESS,</strong><br> i know about marketing planning"</p>
			<?php } ?>
		</div>
	
	</section>
	<!-- /Section -->
	
</section>
<!-- /Section -->

<!-- Section 
<section id="blog">

	<div class="wrapper">
	
		<h1>Blog</h1>	

			
			<?php query_posts('category_name=blog&showposts=4'); ?>		
	
			<?php get_template_part('loop-blog'); ?>

			<p class="clear"></p>
	</div>
</section>
<!-- /Section -->

	<!-- Section -->
<section id="contacto" class="resize">

	<div class="wrapper">
	
		<h1>Contacto</h1>

		<article class="left">	
			<p class="dir">12878 SW 31st St<br> #143 Miramar,<br> Fl 33027 – USA<br> (001) (786) 715.72.02</p>
			<p class="email">tmp@themarketingplanner.com</p>
			<ul class="social">
				<li><a href="http://www.facebook.com/TheMarketingplanner" target="_blank" class="fb"></a></li>
				<li><a href="http://www.twitter.com/TMarketPlanner" target="_blank" class="tw"></a></li>
				<li><a href="http://www.instagram.com/TheMarketingplanner" target="_blank" class="ig"></a></li>
				<li><a href="https://www.youtube.com/channel/UC_X0PnfCp4xsTVGaNRsq4vA" target="_blank" class="yt"></a></li>
				<li><a href="https://www.linkedin.com/company/the-marketing-planner" target="_blank" class="li"></a></li>
				<li><a href="http://www.slideshare.net/TheMarketingplanner" target="_blank" class="ss"></a></li>
			</ul>	
			<p class="clear"></p>
		</article>	

		<!-- Article -->
		<article class="right">
			
			<?php query_posts('category_name=contacto&showposts=1'); ?>
	
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
					
				<p class="clear"></p>
				
			<?php endwhile; ?>
			
			<?php else: ?>
				
					
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
			<?php endif; ?>
			</article>

	</div>
	
	</section>
	<!-- /Section -->

<?php get_footer(); ?>