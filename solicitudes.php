<?php /* Template Name: Historial de solicitudes */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	$solicitudes = '';

	$query_panel = mysqli_query($conexion, "SELECT id_solicitud, servicio_id, status, DATE_FORMAT(fecha_creacion,'%d/%m/%Y %h:%i %p') AS fecha FROM wp_tmp_solicitud INNER JOIN wp_posts ON wp_tmp_solicitud.servicio_id = wp_posts.ID WHERE usuario_id = '".$_SESSION["tmp_id_user"]."' AND status <> 99 ORDER BY fecha_creacion DESC");

	if(mysqli_num_rows($query_panel) > 0){

		if(qtranxf_getLanguage()=="es"){
		$solicitudes = '<table>
		<tr><th>Solicitud</th><th>Servicio o plan solicitado</th><th>Fecha de solicitud</th><th>Status</th><th></th></tr>';
		}
		if(qtranxf_getLanguage()=="en"){
		$solicitudes = '<table>
		<tr><th>Request</th><th>Service or plan requested</th><th>Application date</th><th>Status</th><th></th></tr>';	
		}	

	    while($row_panel = mysqli_fetch_assoc($query_panel)){

	    	$Query = "select * from wp_tmp_serviciosreportes where servicio_id = '".$row_panel['servicio_id']."'";
			$queryReporte = mysqli_query($conexion,$Query)or die(mysqli_error($conexion));
			if(mysqli_num_rows($queryReporte) > 0){
				$row = mysqli_fetch_assoc($queryReporte);
				$Reporte = $row['reporte'];
			}

		    $id_solicitud = $row_panel["id_solicitud"];
		    $id_servicio = $row_panel["servicio_id"];
		    $servicio = get_the_title($id_servicio);
		    $fecha = $row_panel["fecha"];
		    if(qtranxf_getLanguage()=="es"){
		    $status = $row_panel["status"] !== 99 ? 'En proceso' : 'Completo';
		    $button = $row_panel["status"] !== 99 ? '<a href="../continuar?sol='.$id_solicitud.'">Continuar</a>' : '<a href="../<?php echo $Reporte; ?>">Ver reportes</a>';
			}
			if(qtranxf_getLanguage()=="en"){
			$status = $row_panel["status"] !== 99 ? 'In process' : 'Complete';
		    $button = $row_panel["status"] !== 99 ? '<a href="../continuar?sol='.$id_solicitud.'">Continue</a>' : '<a href="../<?php echo $Reporte; ?>">View reports</a>';
			}
		    $solicitudes .= '<tr><td><span>#'.$id_solicitud.'</span></td><td>'.$servicio.'</td><td>'.$fecha.'</td><td>'.$status.'</td><td>'.$button.'</td></tr>';
		}

		$solicitudes .= '</table>';
	}
?>

<?php get_header(); ?>	

<section class="solicitudes">

	<div class="wrapper">
		
		<!-- <form id="form_new" method="post">
		<input type="submit" name="nueva" value="Nueva solicitud">
		</form> -->
		<?php if(qtranxf_getLanguage()=="es"){  ?>
		<a href="/servicios-online"><input type="submit" name="nueva" value="Nueva solicitud"></a>

		<h1>Solicitudes</h1>
		<?php } 
			if(qtranxf_getLanguage()=="en"){ ?>
		<a href="/servicios-online"><input type="submit" name="nueva" value="New Applications"></a>

		<h1>Applications</h1>
		<?php } ?>
		<article>		
			<?php echo $solicitudes; ?>
		</article>
	</div>
		
</section>

<?php get_footer(); ?>