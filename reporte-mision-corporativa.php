<?php /* Template Name: R Misión Corporativa */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");


	/* MISION CORPORATIVA */
	$query_mcorporativa = mysqli_query($conexion, "SELECT * FROM wp_tmp_mcorporativa WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_mcorporativa) > 0){

		$row_mcorporativa = mysqli_fetch_assoc($query_mcorporativa);

		$aprincipal = array('','Produce (bienes o servicios)','Comercializa (bienes o servicios)','Produce y comercializa (bienes o servicios)','Ofrece servicios','Ofrece y comercializa servicios',$row_mcorporativa["otraaprincipal"]);

		$aprincipal = $aprincipal[$row_mcorporativa["aprincipal"]];
		$bprimario = $row_mcorporativa["bprimario"];
		$tconsumidor = array('','Personas naturales','Personas juridicas con fines de lucro','Personas juridicas sin fines de lucro','Personas juridicas (con y sin fines de lucro)','Personas naturales y juridicas (con fines de lucro)','personas naturales y juridicas (sin fines de lucro)','Personas naturales y juridicas (con y sin fines de lucro)','Ofrece y comercializa servicios', $row_mcorporativa["otrotconsumidor"]);
		$tconsumidor = $tconsumidor[$row_mcorporativa["tconsumidor"]];
		$nbasica = $row_mcorporativa["nbasica"];
		$asocial = $row_mcorporativa["asocial"];
		$feconomica = $row_mcorporativa["feconomica"];
		$recursos_clave = array('Recursos humanos','Recursos tecnologicos','Procesos y sistemas','Recursos tecnicos','Recuersos financieros','Experiencia','Recursos Materiales');
		$rclave = explode(',',$row_mcorporativa["rclave"]);
		$rc = '';
		$c1 = $row_mcorporativa["c1"];
		$c2 = $row_mcorporativa["c2"];
		$c3 = $row_mcorporativa["c3"];
		$c4 = $row_mcorporativa["c4"];
		$c5 = $row_mcorporativa["c5"];
		$c6 = $row_mcorporativa["c6"];
		$c7 = $row_mcorporativa["c7"];
		for($i=0;$i<count($rclave);$i++){
			$rc .='<tr><td>'.$recursos_clave[$rclave[$i]].'</td><td>'.$row_mcorporativa["c".$rclave[$i]].'</td></tr>';
		}
		$otrosrclave = $row_mcorporativa["otrosrclave"];

		
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
					<th class="mh" colspan="2">Misión corporativa</th>
				</tr>
				<tr>
					<th class="sh" colspan="2">Razón de ser</th>
				</tr>
				<tr>
					<th>Actividad Principal de la Empresa:</th>
					<td><?php echo $aprincipal; ?></td>
				</tr>
				<tr>
					<th>Beneficio Primario de la Empresa:</th>
					<td><?php echo $bprimario; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Beneficiario de la empresa</th>
				</tr>
				<tr>
					<th>Tipo de consuidor - cliente</th>
					<td><?php echo $tconsumidor; ?></td>
				</tr>
				<tr>
					<th>Necesidad basica del consumidor - cliente de la Empresa:</th>
					<td><?php echo $nbasica; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Recursos claves de la empresa</th>
				</tr>
				<tr>
					<th>Recursos claves</th>
					<th>Cualidades</th>
				</tr>
				<tr>
					<?php echo $rc; ?>
				</tr>
				<tr>
					<th class="sh" colspan="2">Aporte social de la empresa</th>
				</tr>
				<tr>
					<td colspan="2"><?php echo $asocial; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Finalidad economica de la empresa</th>
				</tr>
				<tr>
					<td colspan="2"><?php echo $feconomica; ?></td>
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