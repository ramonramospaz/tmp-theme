<?php /* Template Name: Registro Template */ 
	
ob_start();

session_start();

get_header(); ?>

<div class="login m_resize">
	
<?php get_template_part('registro'); ?>

</div>

<?php get_footer();?>