<?php /* Template Name: R Diagnostico producto */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");

	/* VENTAJAS COMPARATIVAS VS PRODUCTOS DISTINTIVAS*/
	$query_vc_cd = mysqli_query($conexion, "SELECT wp_tmp_vcproducto.pregunta_id AS pregunta, wp_tmp_vcproducto.respuesta AS respuesta_vc, wp_tmp_cdproducto.respuesta AS respuesta_cdp FROM wp_tmp_vcproducto INNER JOIN wp_tmp_cdproducto ON wp_tmp_vcproducto.pregunta_id = wp_tmp_cdproducto.pregunta_id WHERE wp_tmp_vcproducto.solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_vc_cd) > 0){

		$c12 = $c13 = $c22 = $c23 = $c32 = $c33 = $c51 = $c52 = $c61 = $c62 = '';

		$n = mysqli_num_rows($query_vc_cd);

		while($row_vc_cd = mysqli_fetch_assoc($query_vc_cd)){

			$pregunta = $row_vc_cd["pregunta"];

			$respuesta_vc = $row_vc_cd["respuesta_vc"];	

			$respuesta_cd = $row_vc_cd["respuesta_cdp"];

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
			} else if($respuesta_vc == 3){
				if($respuesta_cd == 1){
					$c13 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 2){
					$c23 .= '<li>'.$nombre_pregunta.'</li>';
				} else if($respuesta_cd == 3){
					$c33 .= '<li>'.$nombre_pregunta.'</li>';
				} 
			}
			$cdme = $c22. $c32. $c33;
			$cdma = $c12. $c13. $c23;
			$cfme = $c51. $c52. $c62;
			$cfma = $c61;
		}
	}

	/* F.C.E. VS COMPETENCIAS DISTINTIVAS DEL PRODUCTO */
	if($_SESSION["tmp_t_producto"] == 1){
		$tproducto = 'bienes';
	} else{
		$tproducto = 'servicios';
	}	
	$f41 = $f42 = $f43 = $f44 = $f45 = $f46 = $f51 = $f52 = $f53 = $f54 = $f55 = $f56 = '';

	$query_buscar = mysqli_query($conexion, "SELECT * FROM wp_tmp_iproducto".$tproducto." INNER JOIN wp_tmp_iprecio".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_iprecio".$tproducto.".solicitud_id INNER JOIN wp_tmp_idistribucion".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_idistribucion".$tproducto.".solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["solicitud_id"]."'");

	if(mysqli_num_rows($query_buscar) > 0){
		$preguntas = '';
		$array = mysqli_fetch_array($query_buscar);
		$array_keys = array_keys($array);
		$n = count($array);
		for($i=0;$i<$n;$i++){

			if(($array[$array_keys[$i]] != '4') && ($array[$array_keys[$i]] != '5')){
			
			} else {

				$query_preguntas = mysqli_query($conexion, "SELECT pregunta, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["solicitud_id"]."' AND name = '".$array_keys[$i]."'") or die(mysql_error($conexion));

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
		$fdme = $f42. $f43. $f53;
		$fdma = $f41. $f51. $f52;
		$ffme = $f45. $f46. $f55;
		$ffma = $f56;

		/* EXPLODE */
		$fdme = explode('</li>', $fdme);
		$fdma = explode('</li>', $fdma);
		$ffme = explode('</li>', $ffme);
		$ffma = explode('</li>', $ffma);

		/*Validar repetidos */
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
		}


	} 
	
	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

		}

	}

?>

<?php get_header(); ?>

	<!-- Section -->
	<section class="reporte mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>

		<?php get_template_part('heading-reportes'); ?>
	
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
						<?php echo $cfma;  ?>
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