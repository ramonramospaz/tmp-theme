<?php /* Template Name: Report Formulacion de Objetivos */
    ob_start();

	session_start();

	include("config/conexion.php");
    include_all_php("Classes/");
?>
<page>
	<img style="width: 100%; height: 100%;" src="wp-content/themes/tmp-theme/img/1-PORTADA.png" alt="">
</page>

	<?php
	
	$ServicioClass = new Servicio();
	$ServicioClass->ID = $_SESSION["tmp_id_servicio"];

	$SolicitudClass = new Solicitud();
	$SolicitudClass->id_solicitud = $_SESSION["tmp_id_solicitud"];
	$SolicitudClass->usuario_id = $_SESSION["tmp_id_user"];

		$BriefingsClass = new Briefings();
		$BriefingsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$BriefingsClass->usuario_id = $_SESSION["tmp_id_user"];

		$DinamicaDelMercadoClass = new DinamicaDelMercado();
		$DinamicaDelMercadoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$DinamicaDelMercadoClass->usuario_id = $_SESSION["tmp_id_user"];

		$ComportamientoOfertaDemandaClass = new ComportamientoOfertaDemanda();
		$ComportamientoOfertaDemandaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$ComportamientoOfertaDemandaClass->usuario_id = $_SESSION["tmp_id_user"];

		$ParticipacionDeMercadoClass = new ParticipacionDeMercado();
		$ParticipacionDeMercadoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$ParticipacionDeMercadoClass->usuario_id = $_SESSION["tmp_id_user"];

		$PosicionVsAtractivoDeNegocioClass = new PosicionVsAtractivoDeNegocio();
		$PosicionVsAtractivoDeNegocioClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$PosicionVsAtractivoDeNegocioClass->usuario_id = $_SESSION["tmp_id_user"];

	$ServicioClass->GetDataReport();
		
	$SolicitudClass->GetDataReport();

		$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

		$DinamicaDelMercadoClass->GetDataReport(); //PERFIL SOCIO CULTURAL INDIVIDUAL DATA

		$ComportamientoOfertaDemandaClass->GetDataReport();

		$ParticipacionDeMercadoClass->GetDataReport(); //Perfil Conductual Individual DATA

		$PosicionVsAtractivoDeNegocioClass->GetDataReport();
	?>
<page backtop="90px" backbottom="90px" backimgx="center" backimgy="middle" backimgw="100%" backimg="wp-content/themes/tmp-theme/img/4-HOJA-DE-CONTENIDO.png">
	<page_header>
        <img style="width: 100%;" src="wp-content/themes/tmp-theme/img/header_report_bg.png" alt="">
    </page_header>
	<table class="table">
		<tr>
			<th colspan="2">INFORME EJECUTIVO</th>
		</tr>
		<tr>
			<td>PROYECTO: </td>
			<td><?php echo get_the_title($ServicioClass->ID); ?></td>
		</tr>
		<tr>
			<td>CLIENTE:</td>
			<td><?php echo $BriefingsClass->nombre. " " .$BriefingsClass->apellido; ?></td>
		</tr>
		<tr>
			<td>PRODUCTO:</td>
			<td><?php echo $BriefingsClass->producto; ?></td>
		</tr>
		<tr>
			<td>FECHA DE REALIZACION:</td>
			<td><?php echo $SolicitudClass->fecha_creacion; ?></td>
		</tr>
	</table>
	<page_footer>
        <img style="width: 100%;" src="wp-content/themes/tmp-theme/img/footer_report_bg.png" alt="">
    </page_footer>
</page>
<page pageset="old">
	<?php
		$IDCuestionario = "103";
		$ArregloBriefing = array();
		$ArregloBriefing = GetQuestionAnswers($IDCuestionario);
		$IDCuestionario = "649";
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
	?>
	<table class="table">
		<tr>
			<td colspan="2" style="background-color: orange; color: #FFFFFF;">1. CONTEXTO GENERAL DE LA MARCA</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color: orange; color: #FFFFFF;">1.1. EL PRODUCTO</td>
		</tr>
		<tr>
			<td>Nombre de la Marca:</td>
			<td><?php echo $BriefingsClass->marca; ?></td>
		</tr>
		<tr>
			<td>Tiempo en el mercado:</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Etapa del Ciclo de vida:</td>
			<td><?php echo $ArregloBriefing["380_".$BriefingsClass->ciclo]; ?></td>
		</tr>
		<tr>
			<td colspan="2" style="background-color: orange; color: #FFFFFF;">1.2. EL CONSUMIDOR</td>
		</tr>
		<tr>
			<td colspan="2">Necesidad básica:</td>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color: orange; color: #FFFFFF;">1.3. COMPETENCIA Y PARTICIPACION DE MERCADO</td>
		</tr>
		<tr>
			<td>a. <?php echo " " .$ParticipacionDeMercadoClass->m1; ?></td>
			<td><?php echo $ParticipacionDeMercadoClass->pc1; ?></td>
		</tr>
		<tr>
			<td>b. <?php echo " " .$ParticipacionDeMercadoClass->m2; ?></td>
			<td><?php echo $ParticipacionDeMercadoClass->pc2; ?></td>
		</tr>
		<tr>
			<td>c. <?php echo " " .$ParticipacionDeMercadoClass->m3; ?></td>
			<td><?php echo $ParticipacionDeMercadoClass->pc3; ?></td>
		</tr>
		<tr>
			<td>d. <?php echo " " .$ParticipacionDeMercadoClass->m4; ?></td>
			<td><?php echo $ParticipacionDeMercadoClass->pc4; ?></td>
		</tr>
		<tr>
			<td>e. <?php echo " " .$ParticipacionDeMercadoClass->m5; ?></td>
			<td><?php echo $ParticipacionDeMercadoClass->pc5; ?></td>
		</tr>
	</table>
</page>
<page pageset="old">
	<?php
		$IDCuestionario = "642";
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$ArrayCrecimiento = explode(",",$DinamicaDelMercadoClass->rcrecimiento);
		$ArrayContraccion = explode(",",$DinamicaDelMercadoClass->rcontraccion);
		$ArrayMantenimiento = explode(",",$DinamicaDelMercadoClass->rmantenimiento);
	?>
	<table class="table OneTDTH">
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">2. TENDENCIA GENERAL DEL MERCADO</td>
		</tr>
		<tr>
			<td>
				El mercado
				<?php
					echo $Arreglo["369_".$DinamicaDelMercadoClass->cmercado];
					if($DinamicaDelMercadoClass->cmercado < 3){
						switch($DinamicaDelMercadoClass->cmercado){
							case '1':
								echo " en un " . $DinamicaDelMercadoClass->pcindustria . " (%)";
							break;
							case '2':
								echo " en un " . $DinamicaDelMercadoClass->pdindustria . " (%)";
							break;
						}
					}
				?>
				, debido principalmente a:
			</td>
		</tr>
		<?php
			switch($DinamicaDelMercadoClass->cmercado){
				case '1':
					foreach($ArrayCrecimiento as $Value){
						?>
							<tr style="background-color: orange; color: #FFFFFF;">
								<td><?php echo $Arreglo["370_".$Value]; ?></td>
							</tr>
						<?php
					}
				break;
				case '2':
					foreach($ArrayContraccion as $Value){
						?>
							<tr style="background-color: orange; color: #FFFFFF;">
								<td><?php echo $Arreglo["370_".$Value]; ?></td>
							</tr>
						<?php
					}
				break;
				case '3':
					foreach($ArrayMantenimiento as $Value){
						?>
							<tr style="background-color: orange; color: #FFFFFF;">
								<td><?php echo $Arreglo["370_".$Value]; ?></td>
							</tr>
						<?php
					}
				break;
			}
		?>

	</table>


</page>
<page pageset="old">
	<?php
		$IDCuestionario = "644";
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
	?>
	<table class="table OneTDTH">
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">3. COMPORTAMIENTO DE LA OFERTA Y LA DEMANDA</td>
		</tr>
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">3.1. Comportamiento de la Oferta</td>
		</tr>
		<tr>
			<td>
				La oferta del mercado
				<?php
					echo $Arreglo["373_".$ComportamientoOfertaDemandaClass->coferta];
					if($ComportamientoOfertaDemandaClass->coferta < 3){
						switch($ComportamientoOfertaDemandaClass->coferta){
							case '1':
								echo " en un " . $ComportamientoOfertaDemandaClass->pcoferta . " (%)";
							break;
							case '2':
								echo " en un " . $ComportamientoOfertaDemandaClass->pdoferta . " (%)";
							break;
						}
					}
				?>
			</td>
		</tr>
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">3.1. Comportamiento de la Demanda</td>
		</tr>
		<tr>
			<td>
				La oferta del mercado
				<?php
					echo $Arreglo["373_".$ComportamientoOfertaDemandaClass->cdemanda];
					if($ComportamientoOfertaDemandaClass->cdemanda < 3){
						switch($ComportamientoOfertaDemandaClass->cdemanda){
							case '1':
								echo " en un " . $ComportamientoOfertaDemandaClass->pcdemanda . " (%)";
							break;
							case '2':
								echo " en un " . $ComportamientoOfertaDemandaClass->pddemanda . " (%)";
							break;
						}
					}
				?>
			</td>
		</tr>
	</table>
</page>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">5. FORMULACION DE OBJETIVO ESTRATEGICO DEL NEGOCIO</td>
		</tr>
		<tr>
			<th style="background-color: orange; color: #FFFFFF;">OBJETIVO ESTRATEGICO DE NEGOCIO</th>
		</tr>
		<?php
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "1") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "1")){
				?>
					<tr>
						<th>ACCION GENERAL: "EXPANSION DE MERCADO"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Invertir - Crecer"</td>
					</tr>
					<tr>
						<th>1. OBJETIVO ESTRATEGICO: DESARROLLAR</th>
					</tr>
					<tr>
						<td>
							Esta EXPANSION DE MERCADO puede implicar cualquiera de las siguientes líneas estratégicas: <br>
							<ul>
								<li>
									<strong>a. Abordar nuevos mercados con los productos actuales de la compania. Usted puede elegir entre:</strong>
									<ul>
										<li>- Expandir las operaciones de la empresa y presencia de productos actuales hacia otras zonas geográficas no cubiertas previamente</li>
										<li>- Dirigir sus productos actuales y operaciones comerciales hacia nuevos segmentos o nichos de consumidores no cubiertos previamente</li>
									</ul>
								</li>
							</ul>
							<ul>
								<li>
									<strong>b. Abordar nuevos mercados a través del desarrollo de nuevos productos. Usted puede elegir entre:</strong>
									<ul>
										<li>- Desarrollar nuevos rubros o categorías de productos, para los clientes o consumidores actuales de la Compania.</li>
										<li>- Desarrollar nuevos rubros y categorías de productos, para nuevas zonas geográficas no cubiertas previamente</li>
										<li>- Desarrollar nuevos rubros y categorías de productos, para nuevos segmentos o nichos de consumidores no cubiertos previamente</li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "2") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "1")){
				?>
					<tr>
						<th>ACCION GENERAL: "INNOVAR PRODUCTO"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Invertir - Desarrollar innovando"</td>
					</tr>
					<tr>
						<th>2. OBJETIVO ESTRATEGICO: DESARROLLAR INNOVACIONES Y/O MEJORAS VANGUARDISTAS A LOS PRODUCTOS ACTUALES DE LA COMPANIA</th>
					</tr>
					<tr>
						<td>
							Esta INNOVACION DE PRODUCTOS implica agregar nuevas y diferenciadas cualidades a los productos actuales de la Compania, tales como: <br>
							<ul>
								<li>
									<ul>
										<li>- Nuevas tecnologías aplicadas a los productos, envases o empaques mas prácticos y sofisticados, soporte técnico pionero y avanzado, etcétera.</li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "3") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "1")){
				?>
					<tr>
						<th>ACCION GENERAL: "ARRIESGAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Todo o Nada - Crecer selectivamente"</td>
					</tr>
					<tr>
						<th>4. OBJETIVO ESTRATEGICO: REDOBLAR LOS ESFUERZOS COMERCIALES ALREDEDOR DE LAS PRINCIPALES FORTALEZAS DE LA MARCA Y/O DE SUS PRODUCTOS</th>
					</tr>
					<tr>
						<td>
							Esta acción de ARRIESGAR EN EL MERCADO implica "crecer o morir", a través del aumento de inversiones selectivas alrededor de las fortalezas de la marca y minimizando sus debilidades; o en su defecto, abandonar si no hay crecimiento.<br>
						</td>
					</tr>
				<?php
			}

			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "1") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "2")){
				?>
					<tr>
						<th>ACCION GENERAL: "INNOVAR EN EL MERCADO"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Invertir - Desarrollar innovando"</td>
					</tr>
					<tr>
						<th>3. OBJETIVO ESTRATEGICO: DESARROLLAR ESTRATEGIAS COMERCIALES INNOVADORAS EN EL MERCADO ACTUAL</th>
					</tr>
					<tr>
						<td>
							Esta INNOVACION EN EL MERCADO implica la planificación y ejecución de novedosas estrategias comerciales de la marca y sus productos que impacten el mercado tales como:<br>
							<ul>
								<li>
									<ul>
										<li>-- Estrategias publicitarias agresivas, nuevos puntos no convencionales de distribución, nuevas áreas de servicio de apoyo a la marca, nuevos nichos de mercado, etc.</li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "2") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "2")){
				?>
					<tr>
						<th>ACCION GENERAL: "REORIENTAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Reorganizar - Ganar selectivamente"</td>
					</tr>
					<tr>
						<th>5. OBJETIVO ESTRATEGICO: REORIENTAR LA ESTRATEGIA COMERCIAL SOLO HACIA LOS SEGMENTOS DE CLIENTES - CONSUMIDORES RENTABLES PARA LA MARCA</th>
					</tr>
					<tr>
						<td>
							Esta acción de REORIENTACION implica sacrificar aquellas unidades, productos, presentaciones o variantes de servicios que no sean rentables; así como reducir los gastos innecesarios; y en su lugar, orientar esfuerzos e INVERTIR SELECTIVAMENTE en aquellos productos que generen beneficios para los segmentos rentables para la marca.<br>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "3") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "2")){
				?>
					<tr>
						<th>ACCION GENERAL: "REPLANTEAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Redimensionar el negocio o abandonar"</td>
					</tr>
					<tr>
						<th>7. OBJETIVO ESTRATEGICO: REPLANTEAR EL PROPOSITO DE LOS OBJETIVOS COMERCIALES DEL NEGOCIO</th>
					</tr>
					<tr>
						<td>
							Esta acción de "REPLANTEAR" implica reformular la naturaleza del negocio, es decir, migrar las inversiones y operaciones de la marca,  hacia NUEVOS MERCADOS Y RUBROS O CATEGORIAS DE PRODUCTOS, que podrían tener o no relación con sus productos actuales. Lo anterior implica sacrificar todas aquellas unidades, productos y presentaciones actuales que no sean rentables.<br>
							Con las condiciones actuales la opción de "CRECER" no es viable, por lo que única alternativa es "reorientar la oferta comercial del negocio hacia nuevos rubros de productos y nuevos mercados"; sacrificando los productos actuales no rentables de la Empresa"; de lo contrario, ABANDONE SUS OPERACIONES.<br>
						</td>
					</tr>
				<?php
			}

			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "1") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "3")){
				?>
					<tr>
						<th>ACCION GENERAL: "COSECHAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Recoger beneficios - Invertir selectivamente"</td>
					</tr>
					<tr>
						<th>6. OBJETIVO ESTRATEGICO: OBTENER LA MAXIMA RENTABILIDAD POSIBLE DE LOS BENEFICIOS DE LA MARCA, CON LA MINIMA INVERSION NECESARIA</th>
					</tr>
					<tr>
						<td>
							Esta acción de "COSECHAR" implica recoger los beneficios que pueda extraérsele a la marca o producto, mientras esto sea posible; sacrificando todas aquellas unidades, productos, presentaciones y/o variantes de servicios que no sean rentables; recortando los gastos innecesarios; y reduciendo al mínimo y de forma selectiva las inversiones y operaciones  de la marca, enfocado solo en aquellos productos y/o segmentos de clientes - consumidores que generen rentabilidad para la Empresa. La opción de "CRECER" no es viable, por lo que única alternativa es "cosechar beneficios", y cuando esta opción comience a generar perdidas, ABANDONE EL MERCADO.<br>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "2") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "3")){
				?>
					<tr>
						<th>ACCION GENERAL: "ABANDONAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Salir del mercado dignamente"</td>
					</tr>
					<tr>
						<th>8. OBJETIVO ESTRATEGICO: ABANDONAR LAS OPERACIONES ACTUALES DE LA EMPRESA CON LA MENOR PERDIDA POSIBLE</th>
					</tr>
					<tr>
						<td>
							Esta acción de "ABANDONAR" implica planificar la salida de la Empresa del mercado, buscando sacar el mayor provecho económico de los activos y de la posición actual de la Compania y de sus productos; evitando mayores perdidas de dinero; durante el plazo mientras se van cerrando operaciones.<br>
							Algunas de las acciones a considerar podrían ser: vender activos o la Compania al mejor precio posible; comenzar el cierre de las operaciones con los productos - servicios que generan mas perdidas, reducir drásticamente la estructura de gastos; abandonar las inversiones; evitar prologar las perdidas, entre otras.<br>
						</td>
					</tr>
				<?php
			}
			if(($PosicionVsAtractivoDeNegocioClass->panegocio == "3") && ($PosicionVsAtractivoDeNegocioClass->atrmercado == "3")){
				?>
					<tr>
						<th>ACCION GENERAL: "LIQUIDAR"</th>
					</tr>
					<tr>
						<td>Palabras claves: "Rematar - Abandonar con inmediatez"</td>
					</tr>
					<tr>
						<th>9. OBJETIVO ESTRATEGICO: ABANDONAR LAS OPERACIONES ACTUALES DE LA EMPRESA A LA MAYOR BREVEDAD POSIBLE</th>
					</tr>
					<tr>
						<td>
							Esta acción de "LIQUIDAR" implica cerrar las operaciones de la Empresa DE INMEDIATO; aun cuando esto conlleve a vender los activos de la Empresa, o la compania misma, a precios de "remate". Sin embargo, esto es necesario para evitar prolongar por mas tiempo las inminentes perdidas no recuperables del negocio.<br>
							ABANDONE EL MERCADO a la brevedad posible y venda al precio que sea los activos de la Compania; antes de que la perdida económica represente una verdadera amenaza para su estabilidad personal.<br>
						</td>
					</tr>
				<?php
			}
		?>
	</table>

</page>

<style>
	ul{
		list-style: none;
	}
	ul > ul{
		padding: -30px;
	}
	page{
    	display: block;
	}
	page_header{
		width: 100%;
		display: none !important;
	}
	table {
		background-color: transparent;
		margin: 15px 75px;
		padding: 5px 10px;
		width: 800px;
		min-width: 800px;
		max-width: 800px;
		display: block;
		box-sizing: border-box;
	}
	table tr {
		width: 615px;
	}
	table th, table td {
		width: 50%;
		text-align: left;
		padding: 5px;
    	vertical-align: top;
    	border-bottom: 2px solid #eceeef;
	}
		table tr td .Left, table tr td .Right{
			/*width: 50%;
			float: left;*/
			width: 100%;
		}
			table tr td .Left p, table tr td .Right p{
				padding: 0 10px;
				font-weight: bold;
			}
			table tr td .Left ul, table tr td .Right ul{
				margin: 0;
				/*margin-left: -50px;*/
				padding: 0;
				list-style: none;
			}
	table.OneTDTH th, table.OneTDTH td {
		width: 100%;
	}
	table th {
		background: #313c41;
		color: #ffffff;
		vertical-align: bottom;
		border-bottom: inherit;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}
	th.principal, td.principal, tr.principal{
		background-color: #f68d1d;color: #ffffff;
	}
	td.cols5 {
		width: 90px;
	}
	td.cols4 {
		width: 360px;
	}
	td.cols4a {
		width: 500px;
	}
	td.cols3 {
		width: 183px;
	}
	.headerReport{
		width: 100%;
		padding: 10px 0;
		text-align: center;
		background-color: #dbdcdd;
		color: #313c41;
	}
</style>

<?php

	$content = ob_get_clean();
	// convert in PDF
    include("_class/html2pdf.class.php");
    include("_class/exception.class.php");
    include("_class/locale.class.php");
    include("_class/myPdf.class.php");
    include("_class/parsingHtml.class.php");
    include("_class/parsingCss.class.php");
    try
    {
        $html2pdf = new HTML2PDF('P','Letter', 'es', true, 'UTF-8', array(0,0,0,0));
      	//$html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($BriefingsClass->producto. ' - '.get_the_title($ServicioClass->ID).'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>