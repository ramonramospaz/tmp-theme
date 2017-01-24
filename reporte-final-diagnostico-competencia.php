<?php /* Template Name: R Final diagnostico competencia */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");

	/* CARACTER COMPETENCIA */
	$query_cc = mysqli_query($conexion, "SELECT pregunta_id, respuesta FROM wp_tmp_caractercompetencia WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_cc) > 0){

		$me = $pe = '';

		while($row_cc = mysqli_fetch_assoc($query_cc)){

			$pregunta = $row_cc["pregunta"];

			$respuesta = $row_cc["respuesta"];

			$query_pregunta = mysqli_query($conexion, "SELECT pregunta FROM wp_tmp_preguntas WHERE id = '".$pregunta."'");

			if(mysqli_num_rows($query_pregunta)){
				$row_pregunta = mysqli_fetch_assoc($query_pregunta);
				$nombre_pregunta = $row_pregunta["pregunta"];
			}

			if($respuesta == 1){
				$me .= '<li>'.$nombre_pregunta.'</li>';				
			} else if($respuesta == 2){
				$pe .= '<li>'.$nombre_pregunta.'</li>';				
			} else if($respuesta == 3){
				$pe .= '<li>'.$nombre_pregunta.'</li>';				
			} else if($respuesta == 4){
				$pe .= '<li>'.$nombre_pregunta.'</li>';				
			}

		}

		$tabla_cc = '<table class="carcomp">
				<tr>
					<th colspan="2">Estrategias y acciones de la competencia(Carácter)</th>
				</tr>
				<tr>
					<th>Muchos esfuerzos</th>
					<th>Pocos esfuerzos</th>
				</tr>
				<tr>
					<td>
						<ul>'.$me.'</ul>
					</td>
					<td>
						<ul>'.$pe.'</ul>
					</td>					
				</tr>
				</table>';

	}
	/*VENTAJAS COMPARATIVAS VS COMPETENCIAS DISTINTIVAS */
	$query_vc_cd = mysqli_query($conexion, "SELECT wp_tmp_vcproducto.pregunta_id AS pregunta, wp_tmp_vcproducto.respuesta AS respuesta_vc, wp_tmp_cdcompetencia.respuesta AS respuesta_cdc FROM wp_tmp_vcproducto INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_vcproducto.pregunta_id = wp_tmp_cdcompetencia.pregunta_id WHERE wp_tmp_vcproducto.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_vc_cd) > 0){

		$c12 = $c13 = $c22 = $c23 = $c32 = $c33 = $c51 = $c52 = $c61 = $c62 = $inferior = $igual = $superior = '';

		$n = mysqli_num_rows($query_vc_cd);

		while($row_vc_cd = mysqli_fetch_assoc($query_vc_cd)){

			$pregunta = $row_vc_cd["pregunta"];

			$respuesta_vc = $row_vc_cd["respuesta_vc"];	

			$respuesta_cd = $row_vc_cd["respuesta_cdc"];

			$query_pregunta = mysqli_query($conexion, "SELECT pregunta FROM wp_tmp_preguntas WHERE id = '".$pregunta."'");

			if(mysqli_num_rows($query_pregunta)){
				$row_pregunta = mysqli_fetch_assoc($query_pregunta);
				$nombre_pregunta = $row_pregunta["pregunta"];
			}
			if($respuesta_vc == 1){
				if($respuesta_cd == 5){
					$c51 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 6){
					$c61 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 7){
					$c61 .= '<li>'.$nombre_pregunta.'</li>';
				}
				$inferior .= '<li>'.$nombre_pregunta.'</li>'; 
			} else if($respuesta_vc == 2){
				if($respuesta_cd == 1){
					$c12 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 2){
					$c22 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 3){
					$c32 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 5){
					$c52 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 6){
					$c62 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 7){
					$c62 .= '<li>'.$nombre_pregunta.'</li>';
				}
				$igual .= '<li>'.$nombre_pregunta.'</li>'; 
			} else if($respuesta_vc == 3){
				if($respuesta_cd == 1){
					$c13 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 2){
					$c23 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 3){
					$c33 .= '<li>'.$nombre_pregunta.'</li>';
				} 
				$superior .= '<li>'.$nombre_pregunta.'</li>'; 
			}
			$cdme = $c22. $c32. $c33;
			$cdma = $c12. $c13. $c23;
			$cfme = $c51. $c52. $c62;
			$cfma = $c61;
		}
	}

	/* F.C.E. VS COMPETENCIAS DISTINTIVAS DE LA COMPETENCIA */
	if($_SESSION["tmp_t_producto"] == 1){
		$tproducto = 'bienes';
	} else{
		$tproducto = 'servicios';
	}	
	$f41 = $f42 = $f43 = $f44 = $f45 = $f46 = $f51 = $f52 = $f53 = $f54 = $f55 = $f56 = '';
	$sii = $poi = $mei = $mui = $sui = '';

	$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproducto".$tproducto." INNER JOIN wp_tmp_iprecio".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_iprecio".$tproducto.".solicitud_id INNER JOIN wp_tmp_idistribucion".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_idistribucion".$tproducto.".solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'")or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_buscar) > 0){
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		for($i=0;$i<$n;$i++){ 

			/* 1 *
			$query_preguntas_a = mysqli_query($conexion, "SELECT pregunta FROM wp_tmp_preguntas WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND name = '".$array_keys[$i]."'") or die(mysql_error($conexion));

			if(mysqli_num_rows($query_preguntas_a) > 0){

				$row_preguntas_a = mysql_fetch_assoc($query_preguntas_a);

				if($array[$array_keys[$i]] == '1'){
					$sii .= '<li>'.$row_preguntas_a["pregunta"].'</li>';
				} else if($array[$array_keys[$i]] == '2'){
					$poi .= '<li>'.$row_preguntas_a["pregunta"].'</li>';
				} else if($array[$array_keys[$i]] == '3'){
					$mei .= '<li>'.$row_preguntas_a["pregunta"].'</li>';
				} else if($array[$array_keys[$i]] == '4'){
					$mui .= '<li>'.$row_preguntas_a["pregunta"].'</li>';
				} else if($array[$array_keys[$i]] == '5'){
					$sui .= '<li>'.$row_preguntas_a["pregunta"].'</li>';
				}
			/* 2 */
			if(($array[$array_keys[$i]] != '4') && ($array[$array_keys[$i]] != '5')){
			
			} else {

				$query_preguntas = mysqli_query($conexion, "SELECT pregunta, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND name = '".$array_keys[$i]."'") or die(mysql_error($conexion));

				if(mysqli_num_rows($query_preguntas) > 0){

					$row_preguntas = mysqli_fetch_assoc($query_preguntas);
					$pregunta = $row_preguntas["pregunta"];
					$respuesta = $row_preguntas["respuesta"];

					if($array[$array_keys[$i]] == '4'){	
						if($respuesta == 1){
							$f41 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 2){
							$f42 .= '<li>'.$pregunta.'</li>';	
						} else if($respuesta == 3){
							$f43 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 4){
							$f44 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 5){
							$f45 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 6){
							$f46 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 7){
							$f46 .= '<li>'.$pregunta.'</li>';	
						}
					} else if($array[$array_keys[$i]] == '5'){
						if($respuesta == 1){
							$f51 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 2){
							$f52 .= '<li>'.$pregunta.'</li>';	
						} else if($respuesta == 3){
							$f53 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 4){
							$f54 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 5){
							$f55 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 6){
							$f56 .= '<li>'.$pregunta.'</li>';
						} else if($respuesta == 7){
							$f56 .= '<li>'.$pregunta.'</li>';	
						}

					}
					
				}
			}
		}
		$fdme = $f42.$f43.$f53;
		$fdma = $f41.$f51.$f52;
		$ffme = $f45.$f46.$f55;
		$ffma = $f56;
		$com = $f45.$f46.$f55.$f56;
		$inc = $f41.$f42.$f43.$f51.$f52.$f53;

		/* EXPLODE */
		$fdme = explode('</li>', $fdme);
		$fdma = explode('</li>', $fdma);
		$ffme = explode('</li>', $ffme);
		$ffma = explode('</li>', $ffma);

		/*Validar repetidos 
		$n = count($fdme) - 1;
		for($i=0;$i<$n;$i++){
			$pos = strpos($cdme, $fdme[$i]);
			if($pos === false){
				$cdme .= $fdme[$i].'</li>';
			}
		}
		$m = count($fdma) - 1;
		for($i=0;$i<$m;$i++){
			$pos = strpos($cdma, $fdma[$i]);
			if($pos === false){
				$cdma .= $fdma[$i].'</li>';
			}
		}
		$p = count($ffme) - 1;
		for($i=0;$i<$p;$i++){
			$pos = strpos($cfme, $ffme[$i]);
			if($pos === false){
				$cfme .= $ffme[$i].'</li>';
			}
		}
		$q = count($ffma) - 1;
		for($i=0;$i<$q;$i++){
			$pos = strpos($cfma, $ffma[$i]);
			if($pos === false){
				$cfma .= $ffma[$i].'</li>';
			}
		}*/

	} 
	
	$rpme = $rppe = $rnme = $rnpe = explode('</li>', $sui);
	$me = explode('</li>', $me);
	$pe = explode('</li>', $pe);
	$com = explode('</li>', $com);
	$inferior = explode('</li>', $inferior);
	$superior = explode('</li>', $superior);

	/* Validar repetidos */
	$n = count($me) - 1;
	for($i=0;$i<$n;$i++){
		$pos1 = strpos($rpme, $me[$i]);
		$pos2 = strpos($rnme, $me[$i]);
		if($pos1 === false){
			$rpme .= $me[$i].'</li>';
		}
		if($pos2 === false){
			$rnme .= $me[$i].'</li>';
		}
	}
	$m = count($pe) - 1;
	for($i=0;$i<$m;$i++){
		$pos1 = strpos($rppe, $pe[$i]);
		$pos2 = strpos($rnpe, $pe[$i]);
		if($pos1 === false){
			$rppe .= $pe[$i].'</li>';
		}
		if($pos2 === false){
			$rnpe .= $pe[$i].'</li>';
		}
	}
	$p = count($com) - 1;
	for($i=0;$i<$p;$i++){
		$pos1 = strpos($rpme, $com[$i]);
		$pos2 = strpos($rppe, $com[$i]);
		if($pos1 === false){
			$rpme .= $com[$i].'</li>';
		}
		if($pos2 === false){
			$rppe .= $com[$i].'</li>';
		}
	}
	$q = count($inc) - 1;
	for($i=0;$i<$q;$i++){
		$pos1 = strpos($rnme, $inc[$i]);
		$pos2 = strpos($rnpe, $inc[$i]);
		if($pos1 === false){
			$rnme .= $inc[$i].'</li>';
		}
		if($pos2 === false){
			$rnpe .= $inc[$i].'</li>';
		}
	}
	$r = count($inferior) - 1;
	for($i=0;$i<$r;$i++){
		$pos1 = strpos($rpme, $inferior[$i]);
		$pos2 = strpos($rppe, $inferior[$i]);
		if($pos1 === false){
			$rpme .= $inferior[$i].'</li>';
		}
		if($pos2 === false){
			$rnme .= $inferior[$i].'</li>';
		}
	}
	$s = count($superior) - 1;
	for($i=0;$i<$s;$i++){
		$pos1 = strpos($rnme, $superior[$i]);
		$pos2 = strpos($rnpe, $superior[$i]);
		if($pos1 === false){
			$rppe .= $superior[$i].'</li>';
		}
		if($pos2 === false){
			$rnpe .= $superior[$i].'</li>';
		}
	}
	
		$tabla_desempeño = '<table class="carcomp">
				<tr>
					<th colspan="4">Desempeño de acciones de la competencia</th>
				</tr>
				<tr>
					<th colspan="2">Resultados positivos</th>
					<th colspan="2">Resultados negativos</th>
				</tr>
				<tr>
					<th>Muchos esfuerzos</th>
					<th>Pocos esfuerzos</th>
					<th>Muchos esfuerzos</th>
					<th>Pocos esfuerzos</th>
				</tr>
				<tr>
					<td>
						<ul>'.$sui.$me.$com.$inferior.'</ul>
					</td>
					<td>
						<ul>'.$sui.$pe.$com.$inferior.'</ul>
					</td>	
					<td>
						<ul>'.$sui.$me.$inc.$superior.'</ul>
					</td>
					<td>
						<ul>'.$sui.$pe.$inc.$superior.'</ul>
					</td>					
				</tr>
				</table>';
	
 ?>

<?php get_header(); ?>

	<!-- Section -->
	<section class="reporte mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>
		
			<table class="fortdeb">
				<tr>
					<th colspan="2">Fortalezas y debilidades del producto</th>
				</tr>
				<tr>
					<th>Fortalezas</th>
					<th>Debilidades</th>
				</tr>
				<tr>
					<th>Mayores fortalezas</th>
					<th>Mayores debilidades</th>
				</tr>
				<tr>
					<td>
						<ul>
						<?php echo $cfma; ?>
						</ul>
					</td>
					<td>
						<ul>
						<?php echo $cdma; ?>						
						</ul>
					</td>					
				</tr>
				<tr>
					<th>Fortalezas menores</th>
					<th>Debilidades menores</th>
				</tr>
				<tr>
					<td>
						<ul>
						<?php echo $cfme; ?>
						</ul>
					</td>
					<td>
						<ul>
						<?php echo $cdme; ?>
						</ul>
					</td>					
				</tr>
				
			</table> 
			
			<br class="clear">
			
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