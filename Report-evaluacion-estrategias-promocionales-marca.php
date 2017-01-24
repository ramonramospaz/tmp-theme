<?php /* Template Name: Report Evaluacion Estrategicas Promocionales Marca */
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
	
	$IdentificacionDeLaCompetenciaClass = new IdentificacionDeLaCompetencia();
	$IdentificacionDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$IdentificacionDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeSuProductoClass = new CompetenciasDistintivasDeSuProducto();
	$CompetenciasDistintivasDeSuProductoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeSuProductoClass->usuario_id = $_SESSION["tmp_id_user"];

	$VentajasComparativasClass = new VentajasComparativas();
	$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

	$ServicioClass->GetDataReport();
		
	$SolicitudClass->GetDataReport();

	$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

	$IdentificacionDeLaCompetenciaClass->GetDataReport(); //Informacion General Del Mercado DATA

	$CompetenciasDistintivasDeSuProductoArray = $CompetenciasDistintivasDeSuProductoClass->GetDataReport(); //Competencias Distintivas De Su Producto DATA

	$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport(); //Ventajas Comparativas DATA

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

<?php
	$PreferenciasPublicidadArray = array();
	$PreferenciasPromocionVentasArray = array();
	$PreferenciasRelacionesPublicasArray = array();
	$PreferenciasVentasPersonalesArray = array();
	$PreferenciasMarketingDirectoArray = array();
	$PreferenciasMarketingDigitalArray = array();

	$IDCuestionarioPublicidad = "270";
	$IDCuestionarioPromocionVentas = "273";
	$IDCuestionarioRelacionesPublicas = "276";
	$IDCuestionarioVentasPersonales = "278";
	$IDCuestionarioMarketingDirecto = "282";
	$IDCuestionarioMarketingDigital = "1082";
	
	$IDCuestionario = $IDCuestionarioPublicidad;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_ipublicidad");
	$QueryInformacionProductos = "SELECT * from wp_tmp_ipublicidad WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionProductos = mysqli_query($conexion, $QueryInformacionProductos) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionProductos)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasPublicidadArray,$Arreglo[$Column]);
				}
			}
		}
	}

	
	$IDCuestionario = $IDCuestionarioPromocionVentas;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_ipromocionventas");
	$QueryInformacionPrecios = "SELECT * from wp_tmp_ipromocionventas WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionPrecios = mysqli_query($conexion, $QueryInformacionPrecios) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionPrecios)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasPromocionVentasArray,$Arreglo[$Column]);
				}
			}
		}
	}

	
	$IDCuestionario = $IDCuestionarioRelacionesPublicas;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_irelacionespublicas");
	$QueryInformacionDistribucion = "SELECT * from wp_tmp_irelacionespublicas WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionDistribucion = mysqli_query($conexion, $QueryInformacionDistribucion) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionDistribucion)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasRelacionesPublicasArray,$Arreglo[$Column]);
				}
			}
		}
	}

	
	$IDCuestionario = $IDCuestionarioVentasPersonales;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_iventaspersonales");
	$QueryInformacionPromocion = "SELECT * from wp_tmp_iventaspersonales WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionPromocion = mysqli_query($conexion, $QueryInformacionPromocion) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionPromocion)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasVentasPersonalesArray,$Arreglo[$Column]);
				}
			}
		}
	}


	$IDCuestionario = $IDCuestionarioMarketingDirecto;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_imarketingdirecto");
	$QueryInformacionPromocion = "SELECT * from wp_tmp_imarketingdirecto WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionPromocion = mysqli_query($conexion, $QueryInformacionPromocion) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionPromocion)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasMarketingDirectoArray,$Arreglo[$Column]);
				}
			}
		}
	}

	$IDCuestionario = $IDCuestionarioMarketingDigital;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_imarketingdigital");
	$QueryInformacionPromocion = "SELECT * from wp_tmp_imarketingdigital WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionPromocion = mysqli_query($conexion, $QueryInformacionPromocion) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionPromocion)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasMarketingDigitalArray,$Arreglo[$Column]);
				}
			}
		}
	}
?>
<page pageset="old">
	<?php
		$ArregloBriefing = array();
		$ArregloBriefing = GetQuestionAnswers("103");
	?>
	<table class="table">
		<tr>
			<th colspan="2">1. CONTEXTO GENERAL DE LA MARCA</th>
		</tr>
		<tr>
			<th	style="background-color: orange; color: #FFFFFF;" colspan="2">1.1. EL PRODUCTO</th>
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
			<th	style="background-color: orange; color: #FFFFFF;" colspan="2">1.2. EL CONSUMIDOR</th>
		</tr>
		<tr>
			<td>Necesidad Básica:</td>
			<td></td>
		</tr>
		<tr>
			<td>Tipo de consumidor:</td>
			<td><?php echo $ArregloBriefing["381_".$BriefingsClass->tbase]; ?></td>
		</tr>
		<tr>
			<td colspan="2">Preferencias/tendencias del consumidor</td>
		</tr>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasPublicidadArray) + 1; ?>">Preferencias PUBLICITARIAS</td>
		</tr>
		<?php
			foreach($PreferenciasPublicidadArray as $Producto){
				?>
					<tr>
						<td><?php echo $Producto; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasPromocionVentasArray) + 1; ?>">Preferencias de PROMOCION DE VENTAS</td>
		</tr>
		<?php
			foreach($PreferenciasPromocionVentasArray as $Precio){
				?>
					<tr>
						<td><?php echo $Precio; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasRelacionesPublicasArray) + 1; ?>">Preferencias de RELACIONES PUBLICAS</td>
		</tr>
		<?php
			foreach($PreferenciasRelacionesPublicasArray as $Distribucion){
				?>
					<tr>
						<td><?php echo $Distribucion; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasVentasPersonalesArray) + 1; ?>">Preferencias hacia LAS VENTAS DIRECTAS</td>
		</tr>
		<?php
			foreach($PreferenciasVentasPersonalesArray as $Promocion){
				?>
					<tr>
						<td><?php echo $Promocion; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasMarketingDirectoArray) + 1; ?>">Preferencias hacia EL MARKETING DIRECTO</td>
		</tr>
		<?php
			foreach($PreferenciasMarketingDirectoArray as $Promocion){
				?>
					<tr>
						<td><?php echo $Promocion; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasMarketingDigitalArray) + 1; ?>">Preferencias de MARKETING DIGITAL</td>
		</tr>
		<?php
			foreach($PreferenciasMarketingDigitalArray as $Promocion){
				?>
					<tr>
						<td><?php echo $Promocion; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<th	style="background-color: orange; color: #FFFFFF;" colspan="2">1.3. COMPETENCIA Y PARTICIPACION DE MERCADO</th>
		</tr>
		<tr>
			<td colspan="2">Participación de Mercado:</td>
		</tr>
		<tr>
			<td style="text-align: center;">POSICIONES DE LOS LIDERES DEL MERCADO</td>
			<td>% Participación</td>
		</tr>
		<tr>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m1; ?></td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc1; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m2; ?></td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc2; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m3; ?></td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc3; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m4; ?></td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc4; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m5; ?></td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc5; ?>%</td>
		</tr>
		<tr>
			<td>Competencia Principal:</td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->m2; ?></td>
		</tr>
	</table>
</page>

<?php
	$Arreglo = array();
	$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
	$AreaRO = array();
	$AreaRC = array();
	$AreaAO = array();
	$AreaAC = array();
	for($i=0; $i<=count($VentajasComparativasArray) - 1; $i++){
		for($j=0; $j <= count($CompetenciasDistintivasDeSuProductoArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
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
			if($PreguntaVC == $PreguntaCD){
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "0")){
					array_push($AreaRO,utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "1")){
					array_push($AreaRO,utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "1")){
					array_push($AreaRC,utf8_decode($PreguntaVC));
					break;
				}
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "2")){
					array_push($AreaRC,utf8_decode($PreguntaVC));
					break;
				}

				if((($RespuestaVC == "0") || ($RespuestaVC == "1")) && ($RespuestaCD == "4")){
					array_push($AreaAC,utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
					array_push($AreaAC,utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "1") && ($RespuestaCD == "5")){
					array_push($AreaAO,utf8_decode($PreguntaVC));
					break;
				}
			}
		}
	}
	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_ipublicidad WHERE wp_tmp_ipublicidad.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,utf8_decode($Pregunta_id));
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.1. Diagnóstico del desempeño PUBLICITARIO</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS PUBLICITARIAS CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS PUBLICITARIAS CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS PUBLICITARIAS CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS PUBLICITARIAS CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>


<!-- /////////////////////////////////////////////////////////////////////////// -->                      
<?php
$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_ipromocionventas WHERE wp_tmp_ipromocionventas.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,$Pregunta_id);
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.2. Diagnóstico de desempeño de las PROMOCIONES DE VENTAS</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE PROMOCION DE VENTAS CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE PROMOCION DE VENTAS CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE PROMOCION DE VENTAS CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE PROMOCION DE VENTAS CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>
<!-- /////////////////////////////////////////////////////////////////////////// -->                      
<?php
$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_irelacionespublicas WHERE wp_tmp_irelacionespublicas.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,$Pregunta_id);
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.3. Diagnóstico de desempeño de las RELACIONES PUBLICAS</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE RELACIONES PUBLICAS CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE RELACIONES PUBLICAS CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE RELACIONES PUBLICAS CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE RELACIONES PUBLICAS CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>
<!-- /////////////////////////////////////////////////////////////////////////// -->                      
<?php
	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_iventaspersonales WHERE wp_tmp_iventaspersonales.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,$Pregunta_id);
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.4. Diagnóstico de desempeño de las VENTAS PERSONALES</td>
		</tr>
		<tr>
			<td>
				<div style="backgroundbackground-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE VENTAS PERSONALES CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE VENTAS PERSONALES CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE VENTAS PERSONALES CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE VENTAS PERSONALES CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>
<!-- /////////////////////////////////////////////////////////////////////////// -->                      
<?php
	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_imarketingdirecto WHERE wp_tmp_imarketingdirecto.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,$Pregunta_id);
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.5. Diagnóstico de desempeño del MARKETING DIRECTO</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE MARKETING DIRECTO CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE MARKETING DIRECTO CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE MARKETING DIRECTO CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE MARKETING DIRECTO CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>
<!-- /////////////////////////////////////////////////////////////////////////// -->                      
<?php
	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdproducto ON wp_tmp_preguntas.id = wp_tmp_cdproducto.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_imarketingdigital WHERE wp_tmp_imarketingdigital.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaAC,$Pregunta_id);
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAO,$Pregunta_id);
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
	
	foreach ($FCEAreaRO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRO,$value2);
				$CantRO++;
			}
		}
	}
	foreach ($FCEAreaRC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaRC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaRC,$value2);
				$CantRC++;
			}
		}
	}
	foreach ($FCEAO as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAO as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAO,$value2);
				$CantAO++;
			}
		}
	}
	foreach ($FCEAreaAC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaAC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaAC,$value2);
				$CantAC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.6. Diagnóstico de desempeño del MARKETING DIGITAL</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE MARKETING DIGITAL CON EXCELENTE DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE MARKETING DIGITAL CON DEFICIENTE DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRO[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: #4997D0; color: #FFFFFF;" class="Left">
					<p>ESTRATEGIAS DE MARKETING DIGITAL CON BUEN DESEMPENO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaAC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>ESTRATEGIAS DE MARKETING DIGITAL CON MAL DESEMPENO (TOMAR CORRECTIVOS)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $Arreglo[$LastAreaRC[$i]]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</page>
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
