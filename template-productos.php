<?php /* Template Name: Servicios express */
session_start();
?>
<?php get_header(); ?>
	
	<section id="pservicios">

		<div class="wrapper">
	
			<h1><?php the_title(); ?></h1>
			<?php if(qtranxf_getLanguage()=="es"){ ?>
				<article style="text-align: center"><div>Obtenga vía online y en tiempo real, los más profesionales planes estratégicos y diagnósticos situacionales, a bajos precios y adaptados a las necesidades de su marca o producto.</div></article>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
				<article style="text-align: center"><div>Obtain the most professional strategic plans and situational diagnoses online, in real time, at low prices and adapted to the needs of your brand or product.</div></article>
			<?php } ?>

			<section id="diseños">

				<h2>Planes</h2>
			
				<?php query_posts('category_name=planes&showposts=10'); ?>
				<?php get_template_part('loop'); ?>
			</section>

			<section id="diagnosticos">

				<h2>Diagnósticos</h2>
			
				<?php query_posts('category_name=diagnosticos&showposts=10'); ?>
				<?php get_template_part('loop'); ?>
			</section>

		</div>
	
	</section>

<?php get_footer(); ?>