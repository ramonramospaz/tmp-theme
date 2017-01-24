<?php /* Template Name: R Valores Corporativos */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");


	/* VALORES */
	$resultado_valores = '';
	$verdad = array('investigacion','intuicion','creatividad','innovacion','integridad','calidad','autoanalisis','discernimiento','sintesis','optimismo');
	
	$rectitud = array('compromiso','equidad','confianza','gratitud','honestidad','sinceridad','respeto','responsabilidad','sencillez','virtud','justicia','integridad','fidelidad','puntualidad');
	
	$paz = array('consciencia','calma','comprension','constancia','disciplina','felicidad','humildad','paciencia','reflexion','tranquilidad','tequipo','respeto');
	
	$paz2 = array('Consciencia','Calma','Comprension','Constancia','Disciplina','Felicidad','Humildad','Paciencia','Reflexion','Tranquilidad','Trabajo en equipo','Respeto');
	
	$amor = array('alegria','amistad','amabilidad ','bondad','caridad','compasion','dedicacion','devocion','generosidad','perdon','solidaridad','tolerancia','empatia','sacrificio','servicio','aceptacion');	
	
	$amor2 = array('Alegria','Amistad','Amabilidad ','Bondad','Caridad','Compasion','Dedicacion','Devocion','Generosidad','Perdon','Solidaridad','Tolerancia','Empatia','Sacrificio','Servicio','Aceptacion Incondicional');
	
	$noviolencia = array('amoru','aoculturas','creencias','ciudadania','consideracion','cooperacion','hermandad','equidad','rvida','rmedioambiente','libertad','pertenencia');
	
	$noviolencia2 = array('Amor Universal','Aprecio por otras culturas','Creencias y religiones','Ciudadania','Consideracion','Cooperacion','Hermandad','Equidad','Respeto por la vida','Respeto por el medio ambiente','Libertad','Pertenencia');

	foreach ($verdad as $valor) {
		$query_valor = mysqli_query($conexion, "SELECT aco".$valor.", fac".$valor.", fav".$valor.", ben".$valor." FROM wp_tmp_vcverdad WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_valor) > 0){

			$row_valor = mysqli_fetch_assoc($query_valor);

			$aco = $row_valor["aco".$valor];
			$fac = $row_valor["fac".$valor];
			$fav = $row_valor["fav".$valor];
			$ben = $row_valor["ben".$valor];
			$suma = $aco + $fac + $fav + $ben;

			if($suma >= 16){
				$valores_corporativos[$valor] = $suma;
			}
		}
	}
	foreach ($rectitud as $valor) {
		$query_valor = mysqli_query($conexion, "SELECT aco".$valor.", fac".$valor.", fav".$valor.", ben".$valor." FROM wp_tmp_vcrectitud WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_valor) > 0){

			$row_valor = mysqli_fetch_assoc($query_valor);

			$aco = $row_valor["aco".$valor];
			$fac = $row_valor["fac".$valor];
			$fav = $row_valor["fav".$valor];
			$ben = $row_valor["ben".$valor];
			$suma = $aco + $fac + $fav + $ben;

			if($suma >= 16){
				$valores_corporativos[$valor] = $suma;
			}
		}
	}
	foreach ($paz as $valor) {
		$query_valor = mysqli_query($conexion, "SELECT aco".$valor.", fac".$valor.", fav".$valor.", ben".$valor." FROM wp_tmp_vcpaz WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_valor) > 0){

			$row_valor = mysqli_fetch_assoc($query_valor);

			$aco = $row_valor["aco".$valor];
			$fac = $row_valor["fac".$valor];
			$fav = $row_valor["fav".$valor];
			$ben = $row_valor["ben".$valor];
			$suma = $aco + $fac + $fav + $ben;

			if($suma >= 16){
				$valores_corporativos[$valor] = $suma;
			}
		}
	}
	foreach ($amor as $valor) {
		$query_valor = mysqli_query($conexion, "SELECT aco".$valor.", fac".$valor.", fav".$valor.", ben".$valor." FROM wp_tmp_vcamor WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_valor) > 0){

			$row_valor = mysqli_fetch_assoc($query_valor);

			$aco = $row_valor["aco".$valor];
			$fac = $row_valor["fac".$valor];
			$fav = $row_valor["fav".$valor];
			$ben = $row_valor["ben".$valor];
			$suma = $aco + $fac + $fav + $ben;

			if($suma >= 16){
				$valores_corporativos[$valor] = $suma;
			}
		}
	}
	foreach ($noviolencia as $valor) {
		$query_valor = mysqli_query($conexion, "SELECT aco".$valor.", fac".$valor.", fav".$valor.", ben".$valor." FROM wp_tmp_vcnoviolencia WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));
		if(mysqli_num_rows($query_valor) > 0){

			$row_valor = mysqli_fetch_assoc($query_valor);

			$aco = $row_valor["aco".$valor];
			$fac = $row_valor["fac".$valor];
			$fav = $row_valor["fav".$valor];
			$ben = $row_valor["ben".$valor];
			$suma = $aco + $fac + $fav + $ben;

			if($suma >= 16){
				$valores_corporativos[$valor] = $suma;
			}
		}
	}
	if(!empty($valores_corporativos)){

		arsort($valores_corporativos);

		foreach ($valores_corporativos as $key => $value) {
			
			if (in_array($key, $verdad)) {
				$resultado_valores .= '<tr><td>Verdad</td><td>'.ucfirst($key).'</td></tr>';
			} else if (in_array($key, $rectitud)) {
				$pos = array_search($key, $rectitud);
				$resultado_valores .= '<tr><td>Rectitud</td><td>'.ucfirst($key).'</td></tr>';
			} else if (in_array($key, $paz)) {
				$pos = array_search($key, $paz);
				$resultado_valores .= '<tr><td>Paz</td><td>'.$paz2[$pos].'</td></tr>';
			} else if (in_array($key, $amor)) {
				$pos = array_search($key, $amor);
				$resultado_valores .= '<tr><td>Amor</td><td>'.$amor2[$pos].'</td></tr>';
			} else if (in_array($key, $noviolencia)) {
				$pos = array_search($key, $noviolencia);
				$resultado_valores .= '<tr><td>No violencia</td><td>'.$noviolencia2[$pos].'</td></tr>';
			}
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
		
			<table class="pbasicos">
				<tr>
					<th class="mh" colspan="2">Valores corporativos</th>
				</tr>
				<tr>
					<th>Principio o creencia</th>
					<th>Valores</th>
				</tr>
				<?php echo $resultado_valores; ?>				
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

