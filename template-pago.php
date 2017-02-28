<?php /* Template Name: Pago Template */ 

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if(!isset($_SESSION['payment_servicio_id'])){

		//header("Location: ../servicio"); // template-Productos..
		header("Location: ../historial-de-solicitudes");

		$query_status = mysqli_query($conexion, "SELECT status FROM wp_tmp_solicitud WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");
		if(mysqli_num_rows($query_status) > 0){
			$row_status = mysqli_fetch_assoc($query_status);
			$_SESSION["tmp_status"] = $row_status["status"];
		}

		if($_SESSION["tmp_status"] > 0){

			header("Location: /briefing");

		}
	}else{

		

	}

	

	$query_buscar = mysqli_query($conexion, "SELECT codprom, descuento, meta_value FROM wp_tmp_solicitud INNER JOIN wp_tmp_codpromo ON wp_tmp_solicitud.codprom = wp_tmp_codpromo.codigo INNER JOIN wp_postmeta ON wp_tmp_solicitud.servicio_id = wp_postmeta.post_id WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."' AND meta_key = 'precio'") or die(mysqli_error($conexion));
	
	if(mysqli_num_rows($query_buscar) > 0){
		$row_buscar = mysqli_fetch_assoc($query_buscar);
		$total = $row_buscar["meta_value"] - $row_buscar["descuento"];
		$ds = '<td><h3>Descuento<h3></td><td><p class="precio">$'.$row_buscar["descuento"].'</p></td>';
		$tt = '<td><h3>Total</h3></td><td><p class="precio">$'.$total.'</p></td>';
		$codigo = $row_buscar["codprom"];
		$disabled = 'disabled="disabled"';

	} else {
		$ds = $tt = $codigo = $disabled = '';
	}

?>

<?php get_header(); ?>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/promo.js"></script>	
	
<!-- Section -->
<section class="m_resize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>

		<?php $p = 'p='.$_SESSION["tmp_id_servicio"]; ?>
	
		<?php query_posts($p); ?>
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- Article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<table>
					<tr>						
						<td><h3><?php the_title(); ?></h3></td>
						<td><p class="precio">$<?php the_field('precio'); ?></p></td>
					</tr>
					<tr id="ds"><?php echo $ds; ?></tr>
					<tr id="tt"><?php echo $tt; ?></tr>
					<tr>
						<td colspan="2">
						<form id="promo" class="accordion" method="post">	
							<h3>INGRESA AQUÍ TU CODIGO PROMOCIONAL</h3><div class="relbox"><input type="text" name="codigo" <?php echo $disabled; ?> value="<?php echo $codigo; ?>" ><p class="status"></p><div class="result" style="display:none"><button id='use'>Usar</button></div></div>
						</form>
						</td>
					</tr>
					<tr>
						<script type="text/javascript">
							function validador(){
								if(document.getElementById('payme').style.display=='block')
									document.getElementById('payme').style.display='none';
								else
									document.getElementById('payme').style.display='block';
							}
						</script>
						<td colspan="2" class="terms"><input type="checkbox" class="required" name="terminos" id="terminos" value="1" onclick="validador()"><label for="terminos">Acepto los <a href="/terms-and-conditions" rel="shadowbox;width=1200" class="shadowbox" target="_self">terminos y condiciones</a> de themarketingplanner.com</label><p class="clear"></p></td>
					</tr>
					<tr>						
						<!--<td colspan="2"><p><?php the_field('paypal_button'); ?></p></td>-->
						<td colspan="2">
							<?php
								$_SESSION['payment_promo_cod'] = "";
								$_SESSION['payment_promo_discount'] = "0";
								$_SESSION['payment_amount'] = $_SESSION['payment_precio_servicio'];
							?>
							<p><div id="payme" style="display: none">
								<a href="/paypal-pay">
									<img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-pill-paypal-44px.png" alt="PayPal">
								</a>
								</div>
							</p>
						</td>
					</tr>
				</table>
				<p class="clear"></p>				
				
			</article>
			<!-- /Article -->

		<?php endwhile; ?>
			
		<?php endif; ?>		

	</div>
	
</section>
<!-- /Section -->

<?php get_footer(); ?>