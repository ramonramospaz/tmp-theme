<?php /* Template Name: Report Estrategias Marketing */
    ob_start();
	session_start();

	include("config/conexion.php");
    include_all_php("Classes/");

?>
<page>
	<img style="width: 100%; height: 100%;" src="wp-content/themes/tmp-theme/img/1-PORTADA.png" alt="">
</page>
<page backtop="90px" backbottom="90px" backimgx="center" backimgy="middle" backimgw="100%" backimg="wp-content/themes/tmp-theme/img/4-HOJA-DE-CONTENIDO.png">
	<page_header>
        <img style="width: 100%;" src="wp-content/themes/tmp-theme/img/header_report_bg.png" alt="">
    </page_header>

	<?php

		if($_SESSION["tmp_t_producto"] == 1){
			$tproducto = 'bienes';
			$IDCuestionarioProducto = "257";
			$IDCuestionarioPrecio = "264";
			$IDCuestionarioDistribucion = "268";
		} else{
			$tproducto = 'servicios';
			$IDCuestionarioProducto = "470";
			$IDCuestionarioPrecio = "485";
			$IDCuestionarioDistribucion = "490";
		}

		$ServicioClass = new Servicio();
		$ServicioClass->ID = $_SESSION["tmp_id_servicio"];

		$SolicitudClass = new Solicitud();
		$SolicitudClass->id_solicitud = $_SESSION["tmp_id_solicitud"];
		$SolicitudClass->usuario_id = $_SESSION["tmp_id_user"];

		$BriefingsClass = new Briefings();
		$BriefingsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$BriefingsClass->usuario_id = $_SESSION["tmp_id_user"];
		
		$IdentificacionDeObjetivosEstrategiasActualesMercadoClass = new IdentificacionDeObjetivosEstrategiasActualesMercado();
		$IdentificacionDeObjetivosEstrategiasActualesMercadoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$IdentificacionDeObjetivosEstrategiasActualesMercadoClass->usuario_id = $_SESSION["tmp_id_user"];

		// Se debe sustituir informacion general del mercado por identificacion de la competencia.
		//$InformacionGeneralDelMercadoClass = new InformacionGeneralDelMercado();
		//$InformacionGeneralDelMercadoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		//$InformacionGeneralDelMercadoClass->usuario_id = $_SESSION["tmp_id_user"];

		$CompetenciasDistintivasDeLaCompetenciaClass = new CompetenciasDistintivasDeLaCompetencia();
		$CompetenciasDistintivasDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$CompetenciasDistintivasDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

		$CompetenciasDistintivasDeSuProductoClass = new CompetenciasDistintivasDeSuProducto();
		$CompetenciasDistintivasDeSuProductoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$CompetenciasDistintivasDeSuProductoClass->usuario_id = $_SESSION["tmp_id_user"];

		$VentajasComparativasClass = new VentajasComparativas();
		$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
		$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

		$ServicioClass->GetDataReport();
		
		$SolicitudClass->GetDataReport();

		$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

		$IdentificacionDeObjetivosEstrategiasActualesMercadoClass->GetDataReport();

		//$InformacionGeneralDelMercadoClass->GetDataReport(); //Informacion General Del Mercado DATA

		$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport(); //Competencias Distintivas De Su Producto DATA
		
		$CompetenciasDistintivasDeSuProductoArray = $CompetenciasDistintivasDeSuProductoClass->GetDataReport();

		$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport(); //Ventajas Comparativas DATA

		$Estrategias = GetEstrategia();
	?>
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
		$PreferenciasProductoArray = array();
		$PreferenciasPrecioArray = array();
		$PreferenciasDistribucionArray = array();
		$PreferenciasPromocionArray = array();

		$IDCuestionarioPromocion = "496";
		//Preferencias hacia el PRODUCTO
		$IDCuestionario = $IDCuestionarioProducto;
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$Columns = GetTableFields("wp_tmp_iproducto".$tproducto);
		$QueryInformacionProductos = "SELECT * from wp_tmp_iproducto".$tproducto." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$InformacionProductos = mysqli_query($conexion, $QueryInformacionProductos) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($InformacionProductos)){
			foreach($Columns as $Column){
				if(($Column != "id") && ($Column != "solicitud_id")){
					if(($row[$Column] == "4") || ($row[$Column] == "5")){
						array_push($PreferenciasProductoArray,$Arreglo[$Column]);
					}
				}
			}
		}

		//Preferencias sobre el PRECIO
		$IDCuestionario = $IDCuestionarioPrecio;
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$Columns = GetTableFields("wp_tmp_iprecio".$tproducto);
		$QueryInformacionPrecios = "SELECT * from wp_tmp_iprecio".$tproducto." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$InformacionPrecios = mysqli_query($conexion, $QueryInformacionPrecios) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($InformacionPrecios)){
			foreach($Columns as $Column){
				if(($Column != "id") && ($Column != "solicitud_id")){
					if(($row[$Column] == "4") || ($row[$Column] == "5")){
						array_push($PreferenciasPrecioArray,$Arreglo[$Column]);
					}
				}
			}
		}

		//Preferencias de DISTRIBUCION
		$IDCuestionario = $IDCuestionarioDistribucion;
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$Columns = GetTableFields("wp_tmp_idistribucion".$tproducto);
		$QueryInformacionDistribucion = "SELECT * from wp_tmp_idistribucion".$tproducto." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$InformacionDistribucion = mysqli_query($conexion, $QueryInformacionDistribucion) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($InformacionDistribucion)){
			foreach($Columns as $Column){
				if(($Column != "id") && ($Column != "solicitud_id")){
					if(($row[$Column] == "4") || ($row[$Column] == "5")){
						array_push($PreferenciasDistribucionArray,$Arreglo[$Column]);
					}
				}
			}
		}

		//Preferencias PROMOCIONALES
		$IDCuestionario = $IDCuestionarioPromocion;
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$Columns = GetTableFields("wp_tmp_ipromocion");
		$QueryInformacionPromocion = "SELECT * from wp_tmp_ipromocion WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$InformacionPromocion = mysqli_query($conexion, $QueryInformacionPromocion) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($InformacionPromocion)){
			foreach($Columns as $Column){
				if(($Column != "id") && ($Column != "solicitud_id")){
					if(($row[$Column] == "4") || ($row[$Column] == "5")){
						array_push($PreferenciasPromocionArray,$Arreglo[$Column]);
					}
				}
			}
		}
	?>
	<table class="table">
		<?php
			$ArregloBriefing = array();
			$ArregloBriefing = GetQuestionAnswers("103");
		?>
		<tr>
			<th colspan="2" class="principal">1. CONTEXTO GENERAL DE LA MARCA</th>
		</tr>
		<tr>
			<th colspan="2">1.1. EL PRODUCTO</th>
		</tr>
		<tr>
			<td>El Producto:</td>
			<td><?php echo $BriefingsClass->producto; ?></td>
		</tr>
		<tr>
			<td>Nombre de la marca:</td>
			<td><?php echo $BriefingsClass->marca; ?></td>
		</tr>
		<tr>
			<th	colspan="2">1.2. EL CONSUMIDOR</th>
		</tr>
		<tr>
			<td>Necesidad Básica:</td>
			<td></td>
		</tr>
		<tr>
			<td>Tipo de consumidor:</td>
			<td><?php echo $ArregloBriefing["381_".$BriefingsClass->tbase] ; ?></td>
		</tr>
	</table>
	<table class="table">
		<tr>
			<td colspan="2">Preferencias/tendencias del consumidor</td>
		</tr>
		<tr>
			<th style="color: #f68d1d;">Preferencias hacia el PRODUCTO</th>
		</tr>
		<?php
			foreach($PreferenciasProductoArray as $Producto){
				if($Producto != ""){
					?>
						<tr>
							<td style="width: 80%"><?php echo $Producto; ?></td>
						</tr>
					<?php
				}
			}
		?>
		<tr>
			<th style="color: #f68d1d;">Preferencias sobre el PRECIO</th>
		</tr>
		<?php
			foreach($PreferenciasPrecioArray as $Precio){
				if($Precio != ""){
					?>
						<tr>
							<td style="width: 100%"><?php echo $Precio; ?></td>
						</tr>
					<?php
				}
			}
		?>
		<tr>
			<th style="color: #f68d1d;">preferencias de DISTRIBUCION</th>
		</tr>
		<?php
			foreach($PreferenciasDistribucionArray as $Distribucion){
				if($Distribucion != ""){
					?>
						<tr>
							<td style="width: 100%"><?php echo $Distribucion; ?></td>
						</tr>
					<?php
				}
			}
		?>
		<tr>
			<th style="color: #f68d1d;">preferencias PROMOCIONALES</th>
		</tr>
		<?php
			foreach($PreferenciasPromocionArray as $Promocion){
				if($Promocion != ""){
					?>
						<tr>
							<td style="width: 100%"><?php echo $Promocion; ?></td>
						</tr>
					<?php
				}
			}
		?>
	</table>
	<table class="table">
		<tr>
			<th colspan="2" class="principal">1.3. COMPETENCIA Y PARTICIPACION DE MERCADO</th>
		</tr>
		<tr>
			<td colspan="2">Participación de Mercado:</td>
		</tr>
		<tr>
			<td style="text-align: center;">POSICIONES DE LOS LIDERES DEL MERCADO</td>
			<td>% Participación</td>
		</tr>
		<tr>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m1; ?></td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->pc1; ?>%</td>
		</tr>
		<tr>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m2; ?></td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->pc2; ?>%</td>
		</tr>
		<tr>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m3; ?></td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->pc3; ?>%</td>
		</tr>
		<tr>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m4; ?></td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->pc4; ?>%</td>
		</tr>
		<tr>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m5; ?></td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->pc5; ?>%</td>
		</tr>
		<tr>
			<td>Competencia Principal:</td>
			<td><?php //echo $InformacionGeneralDelMercadoClass->m2; ?></td>
		</tr>
	</table>
	<?php
		$IDCuestionario = "245"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);

		$Proposito = $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->omn == "9" ? $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->otroomn : $Arreglo["384_".$IdentificacionDeObjetivosEstrategiasActualesMercadoClass->omn];
		$Porcentaje = $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->pvar."%";
		$Lapso = $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->lap;
		$Posicionamiento = $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->ep == "8" ? $IdentificacionDeObjetivosEstrategiasActualesMercadoClass->otroep : $Arreglo["384_".$IdentificacionDeObjetivosEstrategiasActualesMercadoClass->ep];
	?>
		<table class="table OneTDTH">
			<tr>
				<th colspan="2" class="principal">2. FORMULACION DEL OBJETIVO DE MERCADEO</th>
			</tr>
			<tr>
				<td><?php echo $Proposito . " en un " . $Porcentaje . " en un periodo de " . $Lapso . " meses."; ?></td>
			</tr>
		</table>

		<table class="table OneTDTH">
			<tr>
				<th colspan="2" class="principal">3. FORMULACION DE LA ESTRATEGIA DE POSICIONAMIENTO</th>
			</tr>
			<tr>
				<td><?php echo $Posicionamiento; ?></td>
			</tr>
		</table>
</page>
<page pageset="old">
	<?php
		$Arreglo = array();
		$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
		$AreaRO = array();
		$AreaRC = array();
		$AreaAO = array();
		$AreaAC = array();
		for($i=0; $i<=count($VentajasComparativasArray) - 1; $i++){
			for($j=0; $j <= count($CompetenciasDistintivasDeLaCompetenciaArray) - 1; $j++){
				$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
				$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
				if(isset($CompetenciasDistintivasDeLaCompetenciaArray[$i])){
					$PreguntaCD = $CompetenciasDistintivasDeLaCompetenciaArray[$j]["pregunta_id"];
					$RespuestaCD = $CompetenciasDistintivasDeLaCompetenciaArray[$j]["respuesta"];
					switch($RespuestaVC){
						case '1':
							$RespuestaVC = "-1";
						break;
						case '2':
							$RespuestaVC = "0";
						break;
						case '3':
							$RespuestaVC = "1";
						break;
					}
					switch($RespuestaCD){
						case '1':
							$RespuestaCD = "0";
						break;
						case '2':
							$RespuestaCD = "1";
						break;
						case '3':
							$RespuestaCD = "2";
						break;
						case '4':
							$RespuestaCD = "3";
						break;
						case '5':
							$RespuestaCD = "4";
						break;
						case '6':
							$RespuestaCD = "5";
						break;
					}
					if($PreguntaVC == $PreguntaCD){
						if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "4")){
							array_push($AreaAC,utf8_decode($PreguntaVC));
							break;
						}
						if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
							array_push($AreaAC,utf8_decode($PreguntaVC));
							break;
						}
						if(($RespuestaVC == "-1") && ($RespuestaCD == "5")){
							array_push($AreaAO,utf8_decode($PreguntaVC));
							break;
						}
					}
				}
			}
		}

		$FortalezasProductos = GetArrayFortalezasUniqueArray("iproducto".$tproducto);
		$FortalezasPrecios = GetArrayFortalezasUniqueArray("iprecio".$tproducto);
		$FortalezasDistribucion = GetArrayFortalezasUniqueArray("idistribucion".$tproducto);
		$FortalezasPromocion = GetArrayFortalezasUniqueArray("ipromocion");


		$Arreglo = array();
		$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
		$AreaRO = array();
		$AreaRC = array();
		$AreaAO = array();
		$AreaAC = array();
		//error_reporting(0);
		for($i=0; $i<=count($VentajasComparativasArray) - 1; $i++){
			$Boolean = FALSE;
			for($j=0; $j <= count($CompetenciasDistintivasDeSuProductoArray) - 1; $j++){
				$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
				$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
				if(isset($CompetenciasDistintivasDeSuProductoArray[$i])){
					$PreguntaCD = $CompetenciasDistintivasDeSuProductoArray[$i]["pregunta_id"];
					$RespuestaCD = $CompetenciasDistintivasDeSuProductoArray[$i]["respuesta"];
					switch($RespuestaVC){
						case '1':
							$RespuestaVC = "-1";
						break;
						case '2':
							$RespuestaVC = "0";
						break;
						case '3':
							$RespuestaVC = "1";
						break;
					}
					switch($RespuestaCD){
						case '1':
							$RespuestaCD = "0";
						break;
						case '2':
							$RespuestaCD = "1";
						break;
						case '3':
							$RespuestaCD = "2";
						break;
						case '4':
							$RespuestaCD = "3";
						break;
						case '5':
							$RespuestaCD = "4";
						break;
						case '6':
							$RespuestaCD = "5";
						break;
					}
					if(($PreguntaVC == $PreguntaCD) && (!$Boolean)){
						$Boolean = TRUE;

						if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "0")){
							array_push($AreaRO,utf8_decode($PreguntaVC));
							break;
						}
						if(($RespuestaVC == "-1") && ($RespuestaCD == "1")){
							array_push($AreaRO,utf8_decode($PreguntaVC));
							break;
						}
						if(($RespuestaVC == "-1") && ($RespuestaCD == "2")){
							array_push($AreaRC,utf8_decode($PreguntaVC));
							break;
						}
						if(($RespuestaVC == "0") && (($RespuestaCD == "1") || ($RespuestaCD == "2"))){
							array_push($AreaRC,utf8_decode($PreguntaVC));
							break;
						}
						/*echo "<br>PreguntaCD: ".$PreguntaCD;
						echo "<br>PreguntaVC: ".$PreguntaVC;
						echo "<br>RespuestaVC: ".$RespuestaVC;
						echo "<br>RespuestaCD: ".$RespuestaCD;
						echo "<br>";*/
					}	
				}
			}
		}
		$DebilidadesProductos = GetArrayDebilidadesUniqueArray("iproducto".$tproducto);
		$DebilidadesPrecios = GetArrayDebilidadesUniqueArray("iprecio".$tproducto);
		$DebilidadesDistribucion = GetArrayDebilidadesUniqueArray("idistribucion".$tproducto);
		$DebilidadesPromocion = GetArrayDebilidadesUniqueArray("ipromocion");
	?>


	<table class="table OneTDTH">
		<tr>
			<th class="principal">4. LINEAMIENTOS ESTRATEGICOS DE MARKETING (MARKETING MIX)</th>
		</tr>
		<tr>
			<th>Estrategias de producto</th>
		</tr>

		<?php
			if((count($FortalezasProductos) >= 1) || (count($DebilidadesProductos) >= 1)){
				foreach($FortalezasProductos as $FortalezaProducto){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($FortalezaProducto)]; ?></td>
						</tr>
					<?php
				}
				foreach($DebilidadesProductos as $DebilidadProducto){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($DebilidadProducto)]; ?></td>
						</tr>
					<?php
				}
			}else{
				?>
					<tr>
						<td>
							DEBIDO A NO RECONOCER FACTORES CRITICOS SOBRE ESTA VARIABLE QUE REQUIERAN ACCIONES DE CAMBIOS ESTRATEGICOS; NO SE SUGIERE NINGUNA ACCION DIFERENTE AL RESPECTO
						</td>
					</tr>
				<?php
			}
		?>

		<tr>
			<th>Estrategias de precio</th>
		</tr>

		<?php
			if((count($FortalezasPrecios) >= 1) || (count($DebilidadesPrecios) >= 1)){
				foreach($FortalezasPrecios as $FortalezaPrecio){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($FortalezaPrecio)]; ?></td>
						</tr>
					<?php
				}
				foreach($DebilidadesPrecios as $DebilidadPrecio){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($DebilidadPrecio)]; ?></td>
						</tr>
					<?php
				}
			}else{
				?>
					<tr>
						<td>
							DEBIDO A NO RECONOCER FACTORES CRITICOS SOBRE ESTA VARIABLE QUE REQUIERAN ACCIONES DE CAMBIOS ESTRATEGICOS; NO SE SUGIERE NINGUNA ACCION DIFERENTE AL RESPECTO
						</td>
					</tr>
				<?php
			}
		?>

		<tr>
			<th>Estrategias de distribución</th>
		</tr>

		<?php
			if((count($FortalezasDistribucion) >= 1) || (count($DebilidadesDistribucion) >= 1)){
				foreach($FortalezasDistribucion as $FortalezaDistribucion){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($FortalezaDistribucion)]; ?></td>
						</tr>
					<?php
				}
				foreach($DebilidadesDistribucion as $DebilidadDistribucion){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($DebilidadDistribucion)]; ?></td>
						</tr>
					<?php
				}	
			}else{
				?>
					<tr>
						<td>
							DEBIDO A NO RECONOCER FACTORES CRITICOS SOBRE ESTA VARIABLE QUE REQUIERAN ACCIONES DE CAMBIOS ESTRATEGICOS; NO SE SUGIERE NINGUNA ACCION DIFERENTE AL RESPECTO
						</td>
					</tr>
				<?php
			}
		?>

		<tr>
			<th>Estrategias de promoción</th>
		</tr>
		<?php
			if((count($FortalezasPromocion) >= 1) || (count($DebilidadesPromocion) >= 1)){
				foreach($FortalezasPromocion as $FortalezaPromocion){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($FortalezaPromocion)]; ?></td>
						</tr>
					<?php
				}
				foreach($DebilidadesPromocion as $DebilidadPromocion){
					?>
						<tr>
							<td><?php echo $Estrategias[intval($DebilidadPromocion)]; ?></td>
						</tr>
					<?php
				}	
			}else{
				?>
					<tr>
						<td>
							DEBIDO A NO RECONOCER FACTORES CRITICOS SOBRE ESTA VARIABLE QUE REQUIERAN ACCIONES DE CAMBIOS ESTRATEGICOS; NO SE SUGIERE NINGUNA ACCION DIFERENTE AL RESPECTO
						</td>
					</tr>
				<?php
			}
		?>
	</table>
</page>
<?php
	function GetArrayFortalezasUniqueArray($Table){
		$AreaAC = $GLOBALS['AreaAC'];
		$AreaAO = $GLOBALS['AreaAO'];
		$tproducto = $GLOBALS['tproducto'];
		$conexion = $GLOBALS['conexion'];

		$ToReturn = array();
		$FCEAreaRO = array();
		$FCEAreaRC = array();
		$FCEAO = array();
		$FCEAreaAC = array();
		$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($Query)){
			$FieldName = $row['name'];
			$Pregunta = $row['pregunta_id'];
			$RespuestaCompetencia = $row['respuesta'];
			switch($RespuestaCompetencia){
				case '1':
					$RespuestaCompetencia = "0";
				break;
				case '2':
					$RespuestaCompetencia = "1";
				break;
				case '3':
					$RespuestaCompetencia = "2";
				break;
				case '4':
					$RespuestaCompetencia = "3";
				break;
				case '5':
					$RespuestaCompetencia = "4";
				break;
				case '6':
					$RespuestaCompetencia = "5";
				break;
			}

			$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_".$Table." WHERE wp_tmp_".$Table.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
			try{
				$QueryTables = @mysqli_query($conexion, $QuerySQL);
				while($rowTable = @mysqli_fetch_assoc($QueryTables)){
					if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
						array_push($FCEAreaAC,utf8_decode($Pregunta));
					}
					if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
						array_push($FCEAreaAC,utf8_decode($Pregunta));
					}

					if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
						array_push($FCEAO,utf8_decode($Pregunta));
					}
				}
			}catch(Exception $ex){
				continue;
			}
			
		}
		$CantRO = 1;
		$CantRC = 1;
		$CantAO = 1;
		$CantAC = 1;
		$LastAreaRO = array();
		$LastAreaRC = array();
		$LastAreaAO = array();
		$LastAreaAC = array();
		
		foreach ($FCEAO as $value1) {
		//echo "---> ". utf8_encode($value1). "<br>\n";
			foreach ($AreaAO as $value2) {
				//echo "---> ---> ".($value2)."<br>\n";
				if (utf8_encode($value1) === $value2){
					array_push($LastAreaAO,$value2);
					array_push($ToReturn,$value2);
				}
			}
		}
		foreach ($FCEAreaAC as $value1) {
		//echo "---> ". utf8_encode($value1). "<br>\n";
			foreach ($AreaAC as $value2) {
				//echo "---> ---> ".($value2)."<br>\n";
				if (utf8_encode($value1) === $value2){
					array_push($LastAreaAC,$value2);
					array_push($ToReturn,$value2);
				}
			}
		}
		return $ToReturn;
	}

	function GetArrayDebilidadesUniqueArray($Table){
		$AreaRC = $GLOBALS['AreaRC'];
		$AreaRO = $GLOBALS['AreaRO'];
		$tproducto = $GLOBALS['tproducto'];
		$conexion = $GLOBALS['conexion'];
	
		$ToReturn = array();
		$FCEAreaRO = array();
		$FCEAreaRC = array();
		$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
		$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($Query)){
			$FieldName = $row['name'];
			$Pregunta = $row['pregunta_id'];
			$RespuestaCompetencia = $row['respuesta'];
			switch($RespuestaCompetencia){
				case '1':
					$RespuestaCompetencia = "0";
				break;
				case '2':
					$RespuestaCompetencia = "1";
				break;
				case '3':
					$RespuestaCompetencia = "2";
				break;
				case '4':
					$RespuestaCompetencia = "3";
				break;
				case '5':
					$RespuestaCompetencia = "4";
				break;
				case '6':
					$RespuestaCompetencia = "5";
				break;
			}

			$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_".$Table." WHERE wp_tmp_".$Table.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
			try{
				$QueryTables = @mysqli_query($conexion, $QuerySQL);
				while($rowTable = @mysqli_fetch_assoc($QueryTables)){
					if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
						array_push($FCEAreaRC,utf8_decode($Pregunta));
					}
					if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
						array_push($FCEAreaRC,utf8_decode($Pregunta));
					}

					if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
						array_push($FCEAreaRO,utf8_decode($Pregunta));
					}
					/*echo "<br>PreguntaCD: ".$Pregunta;
					echo "<br>RespuestaVC: ".$rowTable[$FieldName];
					echo "<br>RespuestaCD: ".$RespuestaCompetencia;
					echo "<br>";*/
				}
			}catch(Exception $ex){
				continue;
			}
			
		}
		$LastAreaRO = array();
		$LastAreaRC = array();
		
		foreach ($FCEAreaRO as $value1) {
		//echo "---> ". utf8_encode($value1). "<br>\n";
			foreach ($AreaRO as $value2) {
				//echo "---> ---> ".($value2)."<br>\n";
				if (utf8_encode($value1) === $value2){
					//echo $value1."<br>";
					array_push($LastAreaRO,$value2);
					array_push($ToReturn,$value2);
				}
			}
		}
		foreach ($FCEAreaRC as $value1) {
		//echo "---> ". utf8_encode($value1). "<br>\n";
			foreach ($AreaRC as $value2) {
				//echo "---> ---> ".($value2)."<br>\n";
				if (utf8_encode($value1) === $value2){
					//echo $value1."<br>";
					array_push($LastAreaRC,$value2);
					array_push($ToReturn,$value2);
				}
			}
		}
		return $ToReturn;
	}

	function GetEstrategia(){
		$ToReturn = array();
		$tproducto = $GLOBALS['tproducto'];
		$conexion = $GLOBALS['conexion'];
		$QuerySQL = "select * from wp_tmp_estrategias where tipo like '%".$tproducto."%' order by pregunta_id";
		$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
		while($row = mysqli_fetch_assoc($Query)){
			$ToReturn[$row['pregunta_id']] = $row['es_estrategia'];
		}
		return $ToReturn;
	}
?>


<style>
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
	th.principal{
		background-color: #f68d1d;
	}
	.headerReport{
		width: 100%;
		padding: 10px 0;
		text-align: center;
		background-color: blue;
		color: #FFFFFF;
	}
</style>
<style type="text/css">
	/*table{
		background-color: #cfcfcf;
		margin: 30px 75px;
		padding: 20px 10px;
		width: 80%;
		min-width: 100%;
		display: block;
		box-sizing: border-box;
	}
		table tr{
			width: 100%;
		}
			table tr td{
				border: 1px solid transparent;
				text-align: left;
			}
			table tr th{
				margin: 30px 10%;
				border: 1px solid #fff;
				text-align: left;
			}
.infot {
		background-color: transparent;
		margin: 30px 75px;
		padding: 20px 10px;
		width: 80%;
		min-width: 80%;
		max-width: 80%;
		display: block;
		box-sizing: border-box;
	}
	.infot{
		width: 80%;
	}
	.infot th, .infot td {
		width: 50%;
		text-align: left;
		padding: 5px;
    	vertical-align: top;
    	border-bottom: 2px solid #eceeef;
	}

	.infot th {
		background: #313c41;
		color: #ffffff;
		vertical-align: bottom;
		border-bottom: inherit;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}


			*/
	
		/*TEMP
.table {
    width: 1024px;
    min-width: 1024px;
    max-width: 1024px;
    /*margin-bottom: 1rem;
    color: #eceeef;
    background-color: #373a3c;
    margin: 10px 100px;
}
table {
    border-collapse: collapse;
    /*background-color: transparent;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #eceeef;
    border-color: #55595c;
}
.table td, .table th {
    padding: .3rem;
    vertical-align: top;
    border-top: 1px solid #eceeef;
    border-color: #55595c;
}
th {
    text-align: left;
}*/
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
	echo $content;
?>
