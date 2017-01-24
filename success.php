<?php /* Template Name: Culminado */ 
	$Archivo = "success.php";
	include("Language.php");
	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");
	
	$query_success = mysqli_query($conexion, "UPDATE wp_tmp_solicitud SET status = 99 WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");

	$query_panel = mysqli_query($conexion, "SELECT id_solicitud, servicio_id, producto, marca, DATE_FORMAT(wp_tmp_solicitud.fecha_creacion,'%d/%m/%Y %h:%i %p') AS fecha_creacion FROM wp_tmp_solicitud INNER JOIN wp_posts ON wp_tmp_solicitud.servicio_id = wp_posts.ID INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE usuario_id = '".$_SESSION["tmp_id_user"]."'AND id_solicitud = '".$_SESSION["tmp_id_solicitud"]."' ORDER BY wp_tmp_solicitud.fecha_creacion DESC")or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_panel) > 0){

		$row_panel = mysqli_fetch_assoc($query_panel);

		$id_servicio = $row_panel["servicio_id"];

		$producto = $row_panel["producto"];

		$marca = $row_panel["marca"];

		$servicio = get_the_title($id_servicio);
	}

	?>

<?php get_header(); ?>

	<!-- Section -->
	<section id="main" class="m_resize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
				$Query = "select * from wp_tmp_serviciosreportes where servicio_id = '".$_SESSION['tmp_id_servicio']."'";
				$queryReporte = mysqli_query($conexion,$Query)or die(mysqli_error($conexion));
				if(mysqli_num_rows($queryReporte) > 0){
					$row = mysqli_fetch_assoc($queryReporte);
					$Reporte = $row['reporte'];
				}
			?>
			<p>
			<?php if(qtranxf_getLanguage()=="es"){ ?>
			<?php if( strtoupper(substr($servicio,0,1)) == "E" or strtoupper(substr($servicio,0,1)) == "F"){ echo "La "; }else{ echo "El "; } ?> <?php echo $servicio; ?> para <?php echo $producto; ?> <?php echo $marca; ?> ha sido enviado a tus <a href="/notificaciones">“NOTIFICACIONES”</a> en la sección “TUS PLANES DE MARKETING.</p> 
			
			<p><a class="irMain ir" href="../<?php echo $Reporte; ?>" target="_blank">Ver Reporte</a></p>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
			<?php if( strtoupper(substr($servicio,0,1)) == "E" or strtoupper(substr($servicio,0,1)) == "F"){ echo "The "; }else{ echo "The "; } ?> <?php echo $servicio; ?> for <?php echo $producto; ?> <?php echo $marca; ?> Has been sent to your <a href="/notificaciones">“NOTIFICATIONS”</a> In the section "YOUR MARKETING PLANS.</p> 
			
			<p><a class="irMain ir" href="../<?php echo $Reporte; ?>" target="_blank">Show Reports</a></p>
			<?php } ?>
			<?php the_content(); ?>
			
			<p class="clear"></p>
			<?php if(qtranxf_getLanguage()=="es"){ ?>
			<a class="ir" href="../historial-de-solicitudes">Ir a mis solicitudes</a>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
			<a class="ir" href="../historial-de-solicitudes">Go to my requests</a>
			<?php } ?>
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

<?php get_footer(); ?>