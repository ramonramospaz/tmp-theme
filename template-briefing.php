<?php /* Template Name: Briefing Template */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$_SESSION["tmp_t_producto"] = $_POST["tipop"];

		$_SESSION["tmp_t_consumidor"] = $_POST["tbase"];

		if($_SESSION["tmp_status"] == 2){

			$query_status = mysqli_query("UPDATE wp_tmp_solicitud SET status = '3' WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");
			$_SESSION["tmp_status"] = 3;

		}
		
		include("redireccion-briefing.php");

	}

?>

<?php get_header(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autoload.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autosave.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/funtions.js"></script>

<section class="cuestionario mresize">

	<div class="wrapper">

		<h1>BRIEFING</h1>

		<?php if(qtranxf_getLanguage()=="es"){ ?>
		<article>			
				
			<form method="post" id="briefing" enctype="multipart/form-data">

				<h2>DATOS DE LA EMPRESA Y MARCA SOLICITANTE</h2>

				<h3>Tipo de usuario</h3>
				<p><label><input type="radio" data-dpnd="d_box1" class="required" name="tipou" value="1"  onclick="RequiredPersonalData()">Personal</label></p>
				<p><label><input type="radio" data-dpnd="d_box2" name="tipou" value="2" onclick="RequiredBusinessData()" >Empresa</label></p>
				
				<div id="d_box1">			

					<h3>Datos personales</h3>

					<p><label>Nombre<input type="text" name="nombre" id="Pnombre"></label></p>
					<p><label>Apellido<input type="text" name="apellido" id="Papellido"></label></p>
					<p><label>Dirección<input type="text" name="direccion" id="Pdireccion"></label></p>
					<p><label>País<input type="text" name="pais" id="Ppais"></label></p>
					<p><label>Ciudad<input type="text" name="ciudad" id="Pciudad"></label></p>
					<p><label>Ocupación u oficio<input type="text" name="oficio" id="Poficio"></label></p>
					<p><label>Numero telefónico<input type="text" name="telefono" id="Ptelefono"></label></p>
					<p><label>Email<input type="text" name="email"></label></p>
					<p><label>Twitter<input type="text" name="twitter"></label></p>
					<p><label>Facebook<input type="text" name="facebook"></label></p>
					<p><label>Instagram<input type="text" name="instagram"></label></p>
					<p><label>Otra red social<input type="text" name="otrared"></label></p>
					
					<p class="clear"></p>				

				</div>

				<div id="d_box2">				

					<h3>Datos de empresa</h3>

					<p><label>Nombre de la empresa<input type="text" name="nombre" id="Enombre"></label></p>
					<p><label>Dirección principal<input type="text" name="direccion" id="Edireccion"></label></p>
					<p><label>País<input type="text" name="pais" id="Epais"></label></p>
					<p><label>Ciudad<input type="text" name="ciudad" id="Eciudad"></label></p>
					<p><label>Nombre persona de contacto<input type="text"  name="contacto"></label></p>
					<p><label>Cargo que ocupa en la empresa<input type="text" name="oficio"></label></p>
					<p><label>Ramo o sector de la empresa<input type="text" name="sector"></label></p>
					<p><label>Numero de empleados<input type="text" name="nempleados"></label></p>
					<p><label>Numero de agencias, oficinas o tiendas<input type="text" name="noficinas"></label></p>
					<p><label>Antigüedad (años)<input type="text" name="antiguedad"></label></p>
					<label class="col-15">Tamaño de la empresa</label>
					<p class="col-15"><label><input type="radio" name="tamano" value="1">Pequeña</label></p>
					<p class="col-15"><label><input type="radio" name="tamano" value="2">Mediana</label></p>
					<p class="col-15"><label><input type="radio" name="tamano" value="3">Grande</label></p>
					<p class="clear"></p>
					
					<p><label>Email<input type="text" name="email"></label></p>
					<p><label>Twitter<input type="text" name="twitter"></label></p>
					<p><label>Facebook<input type="text" name="facebook"></label></p>
					<p><label>Instagram<input type="text" name="instagram"></label></p>
					<p><label>Otra red social<input type="text" name="otrared"></label></p>
					
					<p class="clear"></p>				

				</div>

				<h2>DATOS GENERALES DEL PRODUCTO</h2>

					<h3>Tipo de producto</h3>
					<label><input type="radio" class="required" name="tipop" value="1">Bien fisico  (producto tangible)</label>
					<label><input type="radio" name="tipop" value="2">Servicio (producto intangible)</label>
					<p class="clear"></p>					

					<h3>¿Qué es su producto?</h3>
					<span class="info">(Responda con un nombre genérico, por ejemplo: un periódico, una gaseosa, una marca de caramelos, un tipo de aceite comestible, una tienda de reparación de electrodomésticos, un restaurant, un servicio de seguro de vida, etcétera)</span>
					<input type="text" class="required" name="producto">

					<h3>Nombre de marca del producto: </h3>
					<input type="text" class="required" name="marca">

					<h3>Ciclo de vida del producto</h3>

					<p><label><input type="radio" class="required" name="ciclo" value="1">Introducción (etapa de lanzamiento y ventas inestables)</label></p>
					<p><label><input type="radio" name="ciclo" value="2">Crecimiento (mayor tiempo en el mercado y ventas en ascenso)</label></p>
					<p><label><input type="radio" name="ciclo" value="3">Madurez (mucho tiempo en el mercado y ventas estables)</label></p>
					<p><label><input type="radio" name="ciclo" value="4">Declinación (mucho tiempo en el mercado y ventas en declinacion)</label></p>
					<p><label><input type="radio" name="ciclo" value="5">No sabe / No contesta</label></p>

					<!-- <h3>Describa las caracteristicas generales del producto (haga enfasis en los aspectos positivos y negativos del producto).</h3> -->

					<!-- <p><textarea name="caracteristicas"></textarea></p> -->

					<?php /*<h3>Inserte imagenes del producto</h3>
					<p><input type="file" name="imagenes"></p>*/?>

					<h2>DATOS GENERALES DEL CONSUMIDOR</h2>

					<h3>Describa que necesidad general del consumidor satisface su producto.</h3>

					<textarea name="necesidad"></textarea>

					<h3>¿Que tipo de consumidor es su cliente?</h3>

					<p><label><input type="radio" class="required" name="tbase" value="1">Individual (personas)</label></p>
					<p><label><input type="radio" name="tbase" value="2">Organizacional (empresas, comercios, gobierno, fabricas o industrias)</label></p>
					<p>Para casos de consumidores mixtos (individual y organizacional), debe adquirir cada servicio por separado.</p>

					<h2>DATOS GENERALES DE LA COMPETENCIA</h2>					

					<h3>Mencione las principales cinco marcas del mercado (sin incluir la suya).</h3>

					<table class="t1">
						<tbody>
							<tr>
								<td><label for="m1">1</label></td>
								<td><input type="text" id="m1" name="m1"></td>
							</tr>
							<tr>
								<td><label for="m2">2</label></td>
								<td><input type="text" id="m2" name="m2"></td>
							</tr>
							<tr>
								<td><label for="m3">3</label></td>
								<td><input type="text" id="m3" name="m3"></td>
							</tr>
							<tr>
								<td><label for="m4">4</label></td>
								<td><input type="text" id="m4" name="m4"></td>
							</tr>
							<tr>
								<td><label for="m5">5</label></td>
								<td><input type="text" id="m5" name="m5"></td>
							</tr>
						</tbody>
					</table>

					<h3>Mencione su COMPETIDOR PRINCIPAL en el mercado (similar a su marca en posicion de mercado, tipo de consumidor y tamaño de la Empresa).</h3>

					<p><input type="text" name="cprincipal"></p>					
					

					<!-- <h2>PLANTEAMIENTO DEL CASO</h2>	 -->

					<!-- <h3>SITUACIÓN PROBLEMA: Describa la situación asociada a su marca o producto, por la cual usted esta haciendo esta solicitud a THE MARKETING PLANNER.</h3> -->

					<!-- <textarea name="situacion"></textarea> -->

					<!-- <h3>SOLUCIÓN REQUERIDA: Describa que tipo de solución o aporte espera usted de parte de THE MARKETING PLANNER con relación a la situación planteada.</h3> -->

					<!-- <textarea name="solucion"></textarea>			 -->
				
				<p class="clear"></p>

				<div class="saving"></div>

				<input type="submit" name="siguiente" class="next" value="Siguiente"><br>

			</form>

			<p class="clear"></p>

		</article>
		<?php } ?>
		<?php if(qtranxf_getLanguage()=="en"){ ?>
		<article>			
				
			<form method="post" id="briefing" enctype="multipart/form-data">

				<h2>DATA OF THE COMPANY AND REQUESTING BRAND</h2>

				<h3>User type: personal / company</h3>
				<p><label><input type="radio" data-dpnd="d_box1" class="required" name="tipou" value="1"  onclick="RequiredPersonalData()">Personal</label></p>
				<p><label><input type="radio" data-dpnd="d_box2" name="tipou" value="2" onclick="RequiredBusinessData()" >company</label></p>
				
				<div id="d_box1">			

					<h3>Personal Data</h3>

					<p><label>Name<input type="text" name="nombre" id="Pnombre"></label></p>
					<p><label>Lastname<input type="text" name="apellido" id="Papellido"></label></p>
					<p><label>Address<input type="text" name="direccion" id="Pdireccion"></label></p>
					<p><label>Country<input type="text" name="pais" id="Ppais"></label></p>
					<p><label>City<input type="text" name="ciudad" id="Pciudad"></label></p>
					<p><label>Occupation<input type="text" name="oficio" id="Poficio"></label></p>
					<p><label>Telephone Number<input type="text" name="telefono" id="Ptelefono"></label></p>
					<p><label>Email<input type="text" name="email"></label></p>
					<p><label>Twitter<input type="text" name="twitter"></label></p>
					<p><label>Facebook<input type="text" name="facebook"></label></p>
					<p><label>Instagram<input type="text" name="instagram"></label></p>
					<p><label>Other social network<input type="text" name="otrared"></label></p>
					
					<p class="clear"></p>				

				</div>

				<div id="d_box2">				

					<h3>Company Data</h3>

					<p><label>Name of the company<input type="text" name="nombre" id="Enombre"></label></p>
					<p><label>Address<input type="text" name="direccion" id="Edireccion"></label></p>
					<p><label>Country<input type="text" name="pais" id="Epais"></label></p>
					<p><label>City<input type="text" name="ciudad" id="Eciudad"></label></p>
					<p><label>Name of the Contact<input type="text"  name="contacto"></label></p>
					<p><label>Position (Cargo)<input type="text" name="oficio"></label></p>
					<p><label>Type of company<input type="text" name="sector"></label></p>
					<p><label>Number of Employee<input type="text" name="nempleados"></label></p>
					<p><label>Number of stores<input type="text" name="noficinas"></label></p>
					<p><label>Years of the company<input type="text" name="antiguedad"></label></p>
					<label class="col-15">Size of the company</label>
					<p class="col-15"><label><input type="radio" name="tamano" value="1">Small</label></p>
					<p class="col-15"><label><input type="radio" name="tamano" value="2">Medium</label></p>
					<p class="col-15"><label><input type="radio" name="tamano" value="3">Large</label></p>
					<p class="clear"></p>
					
					<p><label>Email<input type="text" name="email"></label></p>
					<p><label>Twitter<input type="text" name="twitter"></label></p>
					<p><label>Facebook<input type="text" name="facebook"></label></p>
					<p><label>Instagram<input type="text" name="instagram"></label></p>
					<p><label>Other social network<input type="text" name="otrared"></label></p>
					
					<p class="clear"></p>				

				</div>

				<h2>GENERAL DATA OF THE PRODUCT</h2>

					<h3>Product type</h3>
					<label><input type="radio" class="required" name="tipop" value="1">Physical asset (tangible product)</label>
					<label><input type="radio" name="tipop" value="2">Service (intangible product)</label>
					<p class="clear"></p>					

					<h3>What is your product?</h3>
					<span class="info">(Answer with a generic name, for example: a newspaper, a soda, a brand of candy, a type of edible oil, appliances repair shop, a restaurant, a life insurance service, etc.)</span>
					<input type="text" class="required" name="producto">

					<h3>Product brand name: </h3>
					<input type="text" class="required" name="marca">

					<h3>Life cycle of the product </h3>

					<p><label><input type="radio" class="required" name="ciclo" value="1">Introduction (stage of launch and unstable sales)</label></p>
					<p><label><input type="radio" name="ciclo" value="2">Growth (Increase of the time on the market and sales in emerging growth)</label></p>
					<p><label><input type="radio" name="ciclo" value="3">Maturity (long time in the market, and stable sales)</label></p>
					<p><label><input type="radio" name="ciclo" value="4">Decrease (long time in the market and sales in decrease)</label></p>
					<p><label><input type="radio" name="ciclo" value="5">Don't know / No answer</label></p>

					<!-- <h3>Describe the General characteristics of the product (make an emphasis on the positive and negative aspects of the product). </h3> -->

					<!-- <p><textarea name="caracteristicas"></textarea></p> -->

					<?php /*<h3>Inserte imagenes del producto</h3>
					<p><input type="file" name="imagenes"></p>*/?>

					<h2>GENERAL DATA OF THE CONSUMER</h2>

					<h3>Describe what general consumer needs satisfy your product. </h3>

					<textarea name="necesidad"></textarea>

					<h3>What type of consumer is your customer?</h3>

					<p><label><input type="radio" class="required" name="tbase" value="1">Individual (people)</label></p>
					<p><label><input type="radio" name="tbase" value="2">Organizational (companies, businesses, Government, factories or industries)</label></p>
					<p>For mixed consumers (individual and organizational), you must purchase each service separately.</p>

					<h2>GENERAL DATA OF THE COMPETITION</h2>					

					<h3>Mention the top five brands in the market (not including yours)..</h3>

					<table class="t1">
						<tbody>
							<tr>
								<td><label for="m1">1</label></td>
								<td><input type="text" id="m1" name="m1"></td>
							</tr>
							<tr>
								<td><label for="m2">2</label></td>
								<td><input type="text" id="m2" name="m2"></td>
							</tr>
							<tr>
								<td><label for="m3">3</label></td>
								<td><input type="text" id="m3" name="m3"></td>
							</tr>
							<tr>
								<td><label for="m4">4</label></td>
								<td><input type="text" id="m4" name="m4"></td>
							</tr>
							<tr>
								<td><label for="m5">5</label></td>
								<td><input type="text" id="m5" name="m5"></td>
							</tr>
						</tbody>
					</table>

					<h3>Mention its MAIN COMPETITOR in the market (similar to your mark in market position, type of consumer and company size). </h3>

					<p><input type="text" name="cprincipal"></p>					
					

					<!-- <h2>APPROACH TO THE CASE</h2>	 -->

					<!-- <h3>PROBLEM SITUATION: Describe the situation associated with your brand or product, for which you are making this request to THE MARKETING PLANNER. </h3> -->

					<!-- <textarea name="situacion"></textarea> -->

					<!-- <h3>SOLUTION REQUIRED: Describe what type of solution or input that you expect from THE MARKETING PLANNER in relation to the situation.</h3> -->

					<!-- <textarea name="solucion"></textarea>			 -->
				
				<p class="clear"></p>

				<div class="saving"></div>

				<input type="submit" name="siguiente" class="next" value="Siguiente"><br>

			</form>

			<p class="clear"></p>

		</article>
		<?php } ?>
			
	</div>
		
</section>

<?php get_footer(); ?>