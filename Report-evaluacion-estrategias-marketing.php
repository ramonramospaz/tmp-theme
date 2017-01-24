<?php /* Template Name: Report Evaluacion Estrategias Marketing Marca */
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
	
	$InformacionGeneralObjetivosParticipacion = new InformacionGeneralObjetivosParticipacion();
	$InformacionGeneralObjetivosParticipacion->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$InformacionGeneralObjetivosParticipacion->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeLaCompetenciaClass = new CompetenciasDistintivasDeLaCompetencia();
	$CompetenciasDistintivasDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$VentajasComparativasClass = new VentajasComparativas();
	$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

	$ServicioClass->GetDataReport();
		
	$SolicitudClass->GetDataReport();

	$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

	$InformacionGeneralObjetivosParticipacion->GetDataReport(); //Informacion General Del Mercado DATA

	$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport(); //Competencias Distintivas De Su Producto DATA

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
	$PreferenciasProductoArray = array();
	$PreferenciasPrecioArray = array();
	$PreferenciasDistribucionArray = array();
	$PreferenciasPromocionArray = array();

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
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasProductoArray) + 1; ?>">Preferencias hacia el PRODUCTO</td>
		</tr>
		<?php
			foreach($PreferenciasProductoArray as $Producto){
				?>
					<tr>
						<td><?php echo $Producto; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasPrecioArray) + 1; ?>">Preferencias sobre el PRECIO</td>
		</tr>
		<?php
			foreach($PreferenciasPrecioArray as $Precio){
				?>
					<tr>
						<td><?php echo $Precio; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasDistribucionArray) + 1; ?>">preferencias de DISTRIBUCION</td>
		</tr>
		<?php
			foreach($PreferenciasDistribucionArray as $Distribucion){
				?>
					<tr>
						<td><?php echo $Distribucion; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td style="color: #f68d1d;" rowspan="<?php echo count($PreferenciasPromocionArray) + 1; ?>">preferencias PROMOCIONALES</td>
		</tr>
		<?php
			foreach($PreferenciasPromocionArray as $Promocion){
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
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m1; ?></td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->pc1; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m2; ?></td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->pc2; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m3; ?></td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->pc3; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m4; ?></td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->pc4; ?>%</td>
		</tr>
		<tr>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m5; ?></td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->pc5; ?>%</td>
		</tr>
		<tr>
			<td>Competencia Principal:</td>
			<td><?php echo $InformacionGeneralObjetivosParticipacion->m2; ?></td>
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
		for($j=0; $j <= count($CompetenciasDistintivasDeLaCompetenciaArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
			$PreguntaCD = $CompetenciasDistintivasDeLaCompetenciaArray[$i]["pregunta_id"];
			$RespuestaCD = $CompetenciasDistintivasDeLaCompetenciaArray[$i]["respuesta"];
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
				if((($RespuestaVC == "0") || ($RespuestaVC == "1")) && ($RespuestaCD == "0")){
					array_push($AreaRO,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "1") && ($RespuestaCD == "1")){
					array_push($AreaRO,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "1")){
					array_push($AreaRC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if((($RespuestaVC == "0") || ($RespuestaVC == "1")) && ($RespuestaCD == "2")){
					array_push($AreaRC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}

				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "4")){
					array_push($AreaAC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
					array_push($AreaAC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "5")){
					array_push($AreaAO,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
			}
		}
	}


	if($_SESSION["tmp_t_producto"] == 1){
		$tproducto = 'bienes';
	} else{
		$tproducto = 'servicios';
	}


	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_iproducto".$tproducto." WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}

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
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.1. Diagnóstico de desempeño sobre la configuración del producto de la competencia</td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>EXCELENTE DESEMPENO EN EL SERVICIO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAO[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>DEFICIENTE DESEMPENO DEL PRODUCTO (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRO[$i]; ?>
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
					<p>BUEN DESEMPENO EN EL SERVICIO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAC[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>MAL DESEMPENO DEL PRODUCTO  (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRC[$i]; ?>
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
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_iprecio".$tproducto." WHERE wp_tmp_iprecio".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}

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
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.2. Diagnóstico de desempeño sobre las estrategias de precios de la competencia </td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>EXCELENTE DESEMPENO EN EL PRECIO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAO[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>DEFICIENTE DESEMPENO SOBRE EL PRECIO (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRO[$i]; ?>
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
					<p>BUEN DESEMPENO EN EL PRECIO</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAC[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>MAL DESEMPENO SOBRE EL PRECIO  (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRC[$i]; ?>
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
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_idistribucion".$tproducto." WHERE wp_tmp_idistribucion".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}

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
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.3. Diagnóstico de desempeño sobre la distribución de la competencia </td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>EXCELENTE DESEMPENO EN LA DISTRIBUCION</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAO[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>DEFICIENTE DESEMPENO SOBRE LA DISTRIBUCION (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRO[$i]; ?>
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
					<p>BUEN DESEMPENO EN  LA DISTRIBUCION</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAC[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>MAL DESEMPENO SOBRE LA DISTRIBUCION  (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRC[$i]; ?>
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
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_ipromocion WHERE wp_tmp_ipromocion.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRO,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaRC,utf8_decode($Pregunta));
				}

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
			<td	style="background-color: orange; color: #FFFFFF;" colspan="2">2.4. Diagnóstico de desempeño sobre la mezcla promocional de la competencia </td>
		</tr>
		<tr>
			<td>
				<div style="background-color: blue; color: #FFFFFF;" class="Left">
					<p>EXCELENTE DESEMPENO PROMOCIONAL / COMUNICACIONAL</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAO[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #C80815; color: #FFFFFF;" class="Right">
					<p>DEFICIENTE DESEMPENO PROMOCIONAL (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRO - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRO[$i]; ?>
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
					<p>BUEN DESEMPENO PROMOCIONAL / COMUNICACIONAL</p>
					<ul>
						<?php
							for($i=0; $i <= $CantAC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaAC[$i]; ?>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div style="background-color: #ff4d4d; color: #FFFFFF;" class="Right">
					<p>MAL DESEMPENO PROMOCIONAL  (Oportunidades para su marca)</p>
					<ul>
						<?php
							for($i=0; $i <= $CantRC - 2; $i++){
								?>
									<li>
										<?php echo $LastAreaRC[$i]; ?>
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
