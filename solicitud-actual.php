<?php /* Template Name: Solicitud actual */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	$solicitudes = '';
	$Query = "SELECT id_solicitud, servicio_id, progreso, DATE_FORMAT(fecha_creacion,'%d/%m/%Y %h:%i %p') AS fecha_creacion FROM wp_tmp_solicitud LEFT JOIN wp_posts ON wp_tmp_solicitud.servicio_id = wp_posts.ID WHERE usuario_id = '".$_SESSION["tmp_id_user"]."'AND id_solicitud = '".$_SESSION["tmp_id_solicitud"]."' ORDER BY fecha_creacion DESC";
	$query_panel = mysqli_query($conexion, $Query)or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_panel) > 0){
		if(qtranxf_getLanguage()=="es"){
		$solicitudes = '<table>
		<tr><th>Solicitud</th><th>Servicio o plan solicitado</th><th>Fecha de solicitud</th></tr>';
		}
		if(qtranxf_getLanguage()=="en"){
		$solicitudes = '<table>
		<tr><th>Request</th><th>Service or plan requested</th><th>Application date</th></tr>';
		}
	    $row_panel = mysqli_fetch_assoc($query_panel);

		$id_solicitud = $row_panel["id_solicitud"];
		$id_servicio = $row_panel["servicio_id"];
		$servicio = get_the_title($id_servicio);
		$fecha = $row_panel["fecha_creacion"];
		$imagen = get_the_post_thumbnail($id_servicio);
		$progreso = $row_panel["progreso"];
		
		$is_array = strpos($progreso, ',');
		if($is_array !== false){
			$progreso = explode(',',$row_panel["progreso"]);
			$progreso = array_unique($progreso);
		}else{
			$progreso = array($progreso);
		}

		$solicitudes .= '<tr><td><span>#'.$id_solicitud.'</span></td><td><div class="thumbnail">'.$imagen.'</div>'.$servicio.'</td><td>'.$fecha.'</td></tr>';

		$solicitudes .= '</table>';
		//echo "SELECT cuestionarios FROM wp_tmp_cuestionarios WHERE servicio_id = '".$id_servicio."' AND tp LIKE '%".$_SESSION["tmp_t_producto"]."%' AND tc LIKE '%".$_SESSION["tmp_t_consumidor"]."%'";
		$query_cuestionarios = mysqli_query($conexion, "SELECT cuestionarios FROM wp_tmp_cuestionarios WHERE servicio_id = '".$id_servicio."' AND tp LIKE '%".$_SESSION["tmp_t_producto"]."%' AND tc LIKE '%".$_SESSION["tmp_t_consumidor"]."%'") or die(mysqli_error($conexion));
		if(qtranxf_getLanguage()=="es"){
		$fases = ($_SESSION["tmp_status"] >= 2) ? '<li><a href="../briefing">Briefing <img src="'. get_template_directory_uri().'/img/checked.png" alt="Cuestionario completo" title="Cuestionario completo"></a></li>' : '<li><a href="../briefing">Briefing</a></li>';
		}
		if(qtranxf_getLanguage()=="en"){
		$fases = ($_SESSION["tmp_status"] >= 2) ? '<li><a href="../briefing">Briefing <img src="'. get_template_directory_uri().'/img/checked.png" alt="Complete questionnaire" title="Complete questionnaire"></a></li>' : '<li><a href="../briefing">Briefing</a></li>';	
		}
		if(mysqli_num_rows($query_cuestionarios) > 0){
			$row_cuestionarios = mysqli_fetch_assoc($query_cuestionarios);
			$cuestionarios = $row_cuestionarios["cuestionarios"];
			$cues_array = explode(",", $cuestionarios);
			foreach ($cues_array as $cues) {
				$check = in_array($cues, $progreso) ? ' <img src="'. get_template_directory_uri().'/img/checked.png" alt="Cuestionario completo">' : '';
				$blocked = in_array($cues, $progreso) ?  '' : ' class="Blocked" ';
				$titulo = get_the_title($cues);
				$url = get_the_permalink($cues);
				$fases .= '<li><a '.$blocked.' href="'.$url.'">'.$titulo.$check.'</a></li>';
			}
		}
	} else {
	}
	/* Fases */
	$cli1 = $cli2 = $cli3 = $cli4 = $cli5 = $cli6 = '';
	if(!empty($id_servicio)){
		$cli1 = 'class="done"';
	}
	if($_SESSION["tmp_status"] == 1){
		$cli2 = $cli3 = 'class="done"';
	}else if($_SESSION["tmp_status"] == 2){
		$cli2 = $cli3 = 'class="done"';
	}else if($_SESSION["tmp_status"] == 3){
		$cli2 = $cli3 = $cli4 = 'class="done"';
	}else if($_SESSION["tmp_status"] == 99){
		$cli2 = $cli3 = $cli4 = $cli5 = $cli6 = 'class="done"';
	}
?>

<?php get_header(); ?>	

	<!-- Section -->
	<section>

	<div class="wrapper">

		
			<?php if(qtranxf_getLanguage()=="es"){ ?>
		<h1>STATUS DE SOLICITUD ACTUAL</h1>
		<ul class="fases">
			<li class="done"><p>Registro/Inicio de sesión</p></li>
			<li <?php echo $cli1; ?>><p>Selección del servicio</p></li>
			<li <?php echo $cli2; ?>><p>Términos y Condiciones</p></li>
			<li <?php echo $cli3; ?>><p>Procesamiento de pago</p></li>
			<li <?php echo $cli4; ?>><p>Brief Completado</p></li>
			<li <?php echo $cli5; ?>><p>Completar cuestionarios</p></li>
			<li <?php echo $cli6; ?>><p>Consignación de solicitud</p></li>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
		<h1>CURRENT APPLICATION STATUS</h1>
		<ul class="fases">
			<li class="done"><p>Registration / Login</p></li>
			<li <?php echo $cli1; ?>><p>Service Selection</p></li>
			<li <?php echo $cli2; ?>><p>Terms and Conditions</p></li>
			<li <?php echo $cli3; ?>><p>Payment processing</p></li>
			<li <?php echo $cli4; ?>><p>Brief Completed</p></li>
			<li <?php echo $cli5; ?>><p>Complete questionnaires</p></li>
			<li <?php echo $cli6; ?>><p>Application form</p></li>
			<?php } ?>
		</ul>
		<article>
		
		<!-- Post Thumbnail -->
		
		<!-- /Post Thumbnail -->
		
		<summary>
			<?php echo $solicitudes; ?>
			<?php if(qtranxf_getLanguage()=="es"){ ?>
			<h2>Cuestionarios</h2>
			<?php } ?>
			<?php if(qtranxf_getLanguage()=="en"){ ?>
			<h2>Questionnaire</h2>
			<?php } ?>
			<ul><?php echo $fases; ?></ul> 				
		</summary>
		
		<p class="clear"></p>
		
		
	</article>
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>