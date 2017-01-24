<?php /* Template Name: R Objetivo Corporativo */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");



	/* MISION CORPORATIVA */
	$query_ocorporativo = mysqli_query($conexion, "SELECT * FROM wp_tmp_ocorporativo WHERE solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_ocorporativo) > 0){

		$row_ocorporativo = mysqli_fetch_assoc($query_ocorporativo);
  
	$comportamiento = array('','Ha crecido','Ha decrecido','Se ha mantenido','No sabe / no contesta');  
	$pcmercado = array('',$row_ocorporativo["pcindustria"]."%" ,$row_ocorporativo["pcindustria"]."%",'','');
	$pcmercado = $pcmercado[$row_ocorporativo["cmercado"]];
	$rcrecimiento = array('','Flexibilizacion de Creditos y prestamos gubernamentales','Nuevas medidas publicas que favorecen al sector','Flexibiliacion y accesibidad a creditos bancarios','Crecimiento de la economia nacional','Incremento de oferentes (aparicion de nuevos competidores)','Mayores inversiones en el sector','Crecimiento de la demanda (mas compradores - mas dinero para comprar)','Disminucion de los costos de insumos, materia prima u otras fuentes de produccion','Control o disminucion de la inflacion',$row_ocorporativo["otrasrcrecimiento"],'No sabe / no contesta');
  	$rcontraccion = array('','Endurecimiento de Creditos y prestamos gubernamentales','Nuevas medidas publicas que afectan al sector','Trabas de acceso para creditos bancarios','Decrecimiento de la economia nacional','Reduccion del numero de oferentes (disminucion de competidores)','Reduccion de inversiones en el sector','Contraccion de la demanda (menos compradores - menos dinero para comprar)','Aumento en los costos de insumos, materia prima u otras fuentes de produccion','Aumento en los indicadores inflacionarios',$row_ocorporativo["otrasrcontraccion"],'No sabe / no contesta');
 	$rmantenimiento = array('','Dificil acceso a Creditos y prestamos gubernamentales','No hay incentivos por parte del sector publico','Dificil acceso para creditos bancarios','No hay crecimiento en la economia nacional','La oferta en general (todos los competidores) no promueven el crecimiento del sector','No ha habido control de la inflacion','Contraccion o falta de crecimiento de la demanda (igual o menor numero de compradores y de dinero para comprar)','Aumento en los costos de insumos, materia prima u otras fuentes de produccion',$row_ocorporativo["otrasrmantenimiento"],'No sabe / no contesta');
  	$razones = array('',$row_ocorporativo["rcrecimiento"],$row_ocorporativo["rcontraccion"],$row_ocorporativo["rmantenimiento"],'');
  	$razones_array = array('',$rcrecimiento,$rcontraccion,$rmantenimiento,'');
  	$razones = $razones[$row_ocorporativo["cmercado"]];
  	$razones = explode(",", $razones);
  	$rz = '';
  	for($i=0;$i<count($razones);$i++){
		$rz .= '<li>'.$razones_array[$row_ocorporativo["cmercado"]][$razones[$i]].'</li>';
	}
	$pcoferta = array('',$row_ocorporativo["pcoferta"]."%",$row_ocorporativo["pcoferta"]."%",'','');
	$pcoferta = $pcoferta[$row_ocorporativo["coferta"]];
  	$ccoferta = $row_ocorporativo["ccoferta"];
	$pcdemanda = array('',$row_ocorporativo["pcdemanda"]."%",$row_ocorporativo["pcdemanda"]."%",'','');
	$pcdemanda = $pcdemanda[$row_ocorporativo["cdemanda"]];
	$ccdemanda = $row_ocorporativo["ccdemanda"]; 
  	$pmercado = array('',$row_ocorporativo["ppmercado"]."%",'No sabe / No contesta'); 
  	$m1 = $row_ocorporativo["m1"]; 
  	$pc1 = $row_ocorporativo["pc1"]; 
  	$m2 = $row_ocorporativo["m2"]; 
  	$pc2 = $row_ocorporativo["pc2"]; 
  	$m3 = $row_ocorporativo["m3"]; 
  	$pc3 = $row_ocorporativo["pc3"]; 
  	$m4 = $row_ocorporativo["m4"]; 
  	$pc4 = $row_ocorporativo["pc4"]; 
  	$m5 = $row_ocorporativo["m5"]; 
  	$pc5 = $row_ocorporativo["pc5"]; 
  	$pc6 = $row_ocorporativo["pc6"];
  	$panegocio = array('','ALTA: posiciones de liderazgo y buena participacion de mercado','MEDIA: posiciones intermedias (seguidores) y participacion promedio de mercado','BAJA: posiciones de rezagados de mercado y baja participacion','NO SABE');
	$panegocio = $panegocio[$row_ocorporativo["panegocio"]]; 	
	$atrmercado = array('','ALTA: tendencia de EXPANSIÓN Y CRECIMIENTO de la Industria.','MEDIA: tendencia a un estancamiento o a un mantenimiento estable de la Industria.','BAJA: tendencia a una CONTRACCIÓN y DECRECIMIENTO de la Industria.','NO SABE');
	$atrmercado = $atrmercado[$row_ocorporativo["atrmercado"]];
	$proposito = array('', array('','Expansión de mercado','Innovar producto','Reestructurar'), array('','Innovar en el mercado','Diversificar','Liquidar'), array('','Diversificar','Liquidar','Liquidar'));
	$proposito_objetivo = $proposito[$row_ocorporativo["atrmercado"]][$row_ocorporativo["panegocio"]];
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
					<th class="mh" colspan="2">Objetivos corporativos</th>
				</tr>
				<tr>
					<th class="sh" colspan="2">Comportamiento del mercado</th>
				</tr>
				<tr>
					<th>Comportamiento:</th>
					<td><?php echo $comportamiento[$row_ocorporativo["cmercado"]].' '.$pcmercado; ?></td>
				</tr>
				<tr>
					<th>Razones del comportamiento del mercado:</th>
					<td><?php echo $rz; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Comportamiento de la oferta</th>
				</tr>
				<tr>
					<th>Comportamiento:</th>
					<td><?php echo $comportamiento[$row_ocorporativo["coferta"]].' '.$pcoferta; ?></td>
				</tr>	
				<tr>
					<th>Causas del comportamiento:</th>
					<td><?php echo $ccoferta; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Comportamiento de la demanda</th>
				</tr>
				<tr>
					<th>Comportamiento:</th>
					<td><?php echo $comportamiento[$row_ocorporativo["cdemanda"]].' '.$pcdemanda; ?></td>
				</tr>	
				<tr>
					<th>Causas del comportamiento:</th>
					<td><?php echo $ccdemanda; ?></td>
				</tr>
				<tr>
					<th class="sh" colspan="2">Participación de mercado</th>
				</tr>
				<tr>
					<th>Porcentaje aproximado de participación de mercado del producto</th>
					<td><?php echo $pmercado[$row_ocorporativo["pmercado"]]; ?></td>
				</tr>
				<tr>
					<td class="sh" colspan="2">Listado de participación de oferentes del mercado</td>
				</tr>
				<tr>
					<th>Competidor</th>
					<th>% Participación</th>
				</tr>
				<tr>
					<td>1. <?php echo $m1; ?></td>
					<td><?php echo $pc1; ?></td>
				</tr>	
				<tr>
					<td>2. <?php echo $m2; ?></td>
					<td><?php echo $pc2; ?></td>
				</tr>	
				<tr>
					<td>3. <?php echo $m3; ?></td>
					<td><?php echo $pc3; ?></td>
				</tr>	
				<tr>
					<td>4. <?php echo $m4; ?></td>
					<td><?php echo $pc4; ?></td>
				</tr>	
				<tr>
					<td>5. <?php echo $m5; ?></td>
					<td><?php echo $pc5; ?></td>
				</tr>	
				<tr>
					<td>6. Resto de los oferentes del mercado.</td>
					<td><?php echo $pc6; ?></td>
				</tr>	
				<tr>
					<th class="sh">Proposito del objetivo organizacional</th>
					<td><?php echo $proposito_objetivo; ?></td>
				</tr>
				<tr>
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