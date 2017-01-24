<?php /* Template Name: Notificaciones */ 

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	$solicitudes = '';

	$query_panel = mysqli_query($conexion, "SELECT id_solicitud, servicio_id, producto, marca, DATE_FORMAT(wp_tmp_solicitud.fecha_creacion,'%d/%m/%Y %h:%i %p') AS fecha FROM wp_tmp_solicitud INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE wp_tmp_solicitud.usuario_id = '".$_SESSION["tmp_id_user"]."' AND status = 99 ORDER BY wp_tmp_solicitud.fecha_creacion DESC")or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_panel) > 0){

		if(qtranxf_getLanguage()=="es"){
		$solicitudes = '<table>
		<tr><th>Descripción</th><th>Fecha</th><th></th></tr>';
		}
		if(qtranxf_getLanguage()=="en"){
		$solicitudes = '<table>
		<tr><th>Description</th><th>Date</th><th></th></tr>';
		}

	    while($row_panel = mysqli_fetch_assoc($query_panel)){

		    $id_solicitud = $row_panel["id_solicitud"];
		    $id_servicio = $row_panel["servicio_id"];
		    $servicio = get_the_title($id_servicio);
		    $fecha = $row_panel["fecha"];
		    if(qtranxf_getLanguage()=="es"){
		    $button = '<a href="../ver-reporte?sol='.$id_solicitud.'" target="_blank">Ver reportes</a>';
			}
			if(qtranxf_getLanguage()=="en"){
		    $button = '<a href="../ver-reporte?sol='.$id_solicitud.'" target="_blank">Show reports</a>';
			}
		    $solicitudes .= '<tr><td>'.$servicio.'</td><td>'.$fecha.'</td><td>'.$button.'</td></tr>';
		}
	} else {

		if(qtranxf_getLanguage()=="es"){
		$solicitudes = '<h3>No tienes Notificaciones.</h3>'; 
		}	
		if(qtranxf_getLanguage()=="en"){
		$solicitudes = '<h3>You have no Notifications.</h3>'; 
		}
	}
?>

<?php get_header(); ?>	

<section class="solicitudes">

	<div class="wrapper">
		<?php if(qtranxf_getLanguage()=="es"){ ?>
		<h1>Notificaciones</h1>
		<?php } ?>
		<?php if(qtranxf_getLanguage()=="en"){ ?>
		<h1>Notifications</h1>
		<?php } ?>
		<article>		
			<?php echo $solicitudes; ?>
		</article>
			
	</div>
		
</section>