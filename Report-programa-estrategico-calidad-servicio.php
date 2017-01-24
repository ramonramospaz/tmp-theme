<?php /* Template Name: Report Programa Estrategico de Calidad de Servicio */
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

	$CompetenciasDistintivasDeLaCompetenciaClass = new CompetenciasDistintivasDeLaCompetencia();
	$CompetenciasDistintivasDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeSuProductoClass = new CompetenciasDistintivasDeSuProducto();
	$CompetenciasDistintivasDeSuProductoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeSuProductoClass->usuario_id = $_SESSION["tmp_id_user"];

	$VentajasComparativasClass = new VentajasComparativas();
	$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeLaCompetenciaEccsClass = new CompetenciasDistintivasDeLaCompetenciaEccs();
	$CompetenciasDistintivasDeLaCompetenciaEccsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeLaCompetenciaEccsClass->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeSuProductoEccsClass = new CompetenciasDistintivasDeSuProductoEccs();
	$CompetenciasDistintivasDeSuProductoEccsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeSuProductoEccsClass->usuario_id = $_SESSION["tmp_id_user"];

	$VentajasComparativasEccsClass = new VentajasComparativasEccs();
	$VentajasComparativasEccsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$VentajasComparativasEccsClass->usuario_id = $_SESSION["tmp_id_user"];

	$ServicioClass->GetDataReport();
		
	$SolicitudClass->GetDataReport();

	$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

	$IdentificacionDeLaCompetenciaClass->GetDataReport(); //Informacion General Del Mercado DATA

	$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport();

	$CompetenciasDistintivasDeSuProductoArray = $CompetenciasDistintivasDeSuProductoClass->GetDataReport();

	$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport();

	$CompetenciasDistintivasDeLaCompetenciaEccsArray = $CompetenciasDistintivasDeLaCompetenciaEccsClass->GetDataReport();

	$CompetenciasDistintivasDeSuProductoEccsArray = $CompetenciasDistintivasDeSuProductoEccsClass->GetDataReport();

	$VentajasComparativasEccsArray = $VentajasComparativasEccsClass->GetDataReport();

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
	$PreferenciasProcesoRelacionalArray = array();
	$PreferenciasServicioAlClienteArray = array();
	$PreferenciasServiciosComplementariosArray = array();

	$IDCuestionarioProcesoRelacional = "407";
	$IDCuestionarioServicioAlCliente = "410";
	$IDCuestionarioServiciosComplementarios = "1067";
	
	$IDCuestionario = $IDCuestionarioProcesoRelacional;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_prelacionalservicio");
	$QueryInformacionProductos = "SELECT * from wp_tmp_prelacionalservicio WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionProductos = mysqli_query($conexion, $QueryInformacionProductos) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionProductos)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasProcesoRelacionalArray,utf8_decode($Arreglo[$Column]));
				}
			}
		}
	}

	
	$IDCuestionario = $IDCuestionarioServicioAlCliente;
	$Arreglo = array();
	$Arreglo = GetQuestionAnswers($IDCuestionario);
	$Columns = GetTableFields("wp_tmp_scliente");
	$QueryInformacionPrecios = "SELECT * from wp_tmp_scliente WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionPrecios = mysqli_query($conexion, $QueryInformacionPrecios) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionPrecios)){
		foreach($Columns as $Column){
			if(($Column != "id") && ($Column != "solicitud_id")){
				if(($row[$Column] == "4") || ($row[$Column] == "5")){
					array_push($PreferenciasServicioAlClienteArray,utf8_decode($Arreglo[$Column]));
				}
			}
		}
	}


	$Arreglo = array();
	$Arreglo = GetUsersQuestionAnswers($_SESSION["tmp_id_solicitud"]);
	$QueryInformacionDistribucion = "SELECT * from wp_tmp_eccs WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$InformacionDistribucion = mysqli_query($conexion, $QueryInformacionDistribucion) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($InformacionDistribucion)){
		if(($row["respuesta"] == "4") || ($row["respuesta"] == "5")){
			array_push($PreferenciasServiciosComplementariosArray,utf8_decode($Arreglo[$row["pregunta_id"]]));
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
			<td rowspan="<?php echo count($PreferenciasProcesoRelacionalArray) + 1; ?>">preferencias en el PROCESO RELACIONAL(puntos de contacto)</td>
		</tr>
		<?php
			foreach($PreferenciasProcesoRelacionalArray as $Producto){
				?>
					<tr>
						<td><?php echo $Producto; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td rowspan="<?php echo count($PreferenciasServicioAlClienteArray) + 1; ?>">preferencias en el SERVICIO AL CLIENTE</td>
		</tr>
		<?php
			foreach($PreferenciasServicioAlClienteArray as $Precio){
				?>
					<tr>
						<td><?php echo $Precio; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td rowspan="<?php echo count($PreferenciasServiciosComplementariosArray) + 1; ?>">preferencias en los SERVICIOS COMPLEMENTARIOS</td>
		</tr>
		<?php
			foreach($PreferenciasServiciosComplementariosArray as $Distribucion){
				?>
					<tr>
						<td><?php echo $Distribucion; ?></td>
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
	$Estrategias = GetEstrategias();
	//print_r($Estrategias);
	$AreaRO = array();
	$AreaRC = array();
	$AreaAO = array();
	$AreaAC = array();
	$CuestionariosArray = array();
	array_push($CuestionariosArray,"confiabilidad");
	array_push($CuestionariosArray,"tangibilidad");
	array_push($CuestionariosArray,"cortesia");
	array_push($CuestionariosArray,"empatia");
	array_push($CuestionariosArray,"excepciones");
	array_push($CuestionariosArray,"informacion");
	array_push($CuestionariosArray,"consultoria");
	array_push($CuestionariosArray,"capacidadrespuesta");
	array_push($CuestionariosArray,"competencias");
	array_push($CuestionariosArray,"credibilidad");
	array_push($CuestionariosArray,"custodia");
	array_push($CuestionariosArray,"garantias");
	array_push($CuestionariosArray,"proximidad");
	array_push($CuestionariosArray,"tiempoespera");
	array_push($CuestionariosArray,"localizacion");
	array_push($CuestionariosArray,"horarios");
	foreach($CuestionariosArray as $Cuestionarios){
		$AreaRO[$Cuestionarios] = array();
		$AreaRC[$Cuestionarios] = array();
		$AreaAO[$Cuestionarios] = array();
		$AreaAC[$Cuestionarios] = array();
	}
	for($i=0; $i<=count($VentajasComparativasArray) - 1; $i++){
		for($j=0; $j <= count($CompetenciasDistintivasDeLaCompetenciaArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
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
				$Name = substr($Arreglo["Name_".$PreguntaVC],0,strpos($Arreglo["Name_".$PreguntaVC],"_"));
				//echo "Pregunta: ".$PreguntaCD. " - Name: ".$Name." | RespuestaCD: ".$RespuestaCD." - RespuestaVC: ".$RespuestaVC."<br><br>";
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "4")){
					array_push($AreaAC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
					array_push($AreaAC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "5")){
					array_push($AreaAO[$Name],utf8_decode($PreguntaVC));
					break;
				}
			}
		}
	}
	for($i=0; $i<=count($VentajasComparativasArray) - 1; $i++){
		for($j=0; $j <= count($CompetenciasDistintivasDeSuProductoArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasArray[$i]["respuesta"];
			$PreguntaCD = $CompetenciasDistintivasDeSuProductoArray[$j]["pregunta_id"];
			$RespuestaCD = $CompetenciasDistintivasDeSuProductoArray[$j]["respuesta"];
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
				$Name = substr($Arreglo["Name_".$PreguntaVC],0,strpos($Arreglo["Name_".$PreguntaVC],"_"));
				//echo "Pregunta: ".$PreguntaCD. " - Name: ".$Name." | RespuestaCD: ".$RespuestaCD." - RespuestaVC: ".$RespuestaVC."<br><br>";
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "0")){
					array_push($AreaRO[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "1")){
					array_push($AreaRO[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "2")){
					array_push($AreaRC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if((($RespuestaVC == "0") && ($RespuestaCD == "1") || ($RespuestaCD == "2"))){
					array_push($AreaRC[$Name],utf8_decode($PreguntaVC));
					break;
				}
			}
		}
	}
	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	foreach($CuestionariosArray as $Cuestionarios){
		$FCEAreaRO[$Cuestionarios] = array();
		$FCEAreaRC[$Cuestionarios] = array();
		$FCEAO[$Cuestionarios] = array();
		$FCEAreaAC[$Cuestionarios] = array();
	}
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
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
		$Tabla = substr($FieldName,0,strpos($FieldName,"_"));
		$FieldName = substr($FieldName,strpos($FieldName,"_") + 1, strlen($FieldName));
		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_prelacionalservicio WHERE wp_tmp_prelacionalservicio.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		//echo $QuerySQL."<br><br>";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				//echo "Respuesta Competencia: ".$RespuestaCompetencia. " - Respuesta: ".$rowTable[$FieldName]."<br><br>";
				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAO[$Tabla] = $Pregunta_id;
					array_push($FCEAO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}
			}
		}catch(Exception $ex){
			continue;
		}
	}
	/*var_dump($AreaAO);echo "<br>";
	var_dump($AreaAC);echo "<br>";
	var_dump($AreaRO);echo "<br>";
	var_dump($AreaRC);echo "<br>";*/
	echo "<br>";echo "<br>";echo "<br>";echo "<br>";
	/*var_dump($FCEAO);echo "<br>";
	var_dump($FCEAreaAC);echo "<br>";
	var_dump($FCEAreaRO);echo "<br>";
	var_dump($FCEAreaRC);echo "<br>";*/
	$CantRO = 1;
	$CantRC = 1;
	$CantAO = 1;
	$CantAC = 1;
	$LastAreaRO = array();
	$LastAreaRC = array();
	$LastAreaAO = array();
	$LastAreaAC = array();
	
	foreach($CuestionariosArray as $Cuestionarios){
		$LastAreaRO[$Cuestionarios] = array();
		$LastAreaRC[$Cuestionarios] = array();
		$LastAreaAO[$Cuestionarios] = array();
		$LastAreaAC[$Cuestionarios] = array();
	}

	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAO[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaAC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAC[$Cuestionarios],$value2);
				}
			}
		}
	}

	
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRC[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRO[$Cuestionarios],$value2);
				}
			}
		}
	}

?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<th class="principal">4. LINEAMIENTOS ESTRATEGICOS DE CALIDAD DE SERVICIO</th>
		</tr>
		<tr>
			<th>ESTRATEGIAS PARA EL PROCESO DE "PUNTOS DE CONTACTO CON EL CLIENTE" (TOUCHPOINTS)</th>
		</tr>
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Confiabilidad"</td>
		</tr>
		<?php
			if((count($LastAreaAO["confiabilidad"] > 0)) || (count($LastAreaAC["confiabilidad"]) > 0) || (count($LastAreaRO["confiabilidad"]) > 0) || (count($LastAreaRC["confiabilidad"]) > 0)){
				foreach($LastAreaAO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tangibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tangibilidad"] > 0)) || (count($LastAreaAC["tangibilidad"]) > 0) || (count($LastAreaRO["tangibilidad"]) > 0) || (count($LastAreaRC["tangibilidad"]) > 0)){
				foreach($LastAreaAO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Cortesía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["cortesia"] > 0)) || (count($LastAreaAC["cortesia"] >) 0) || (count($LastAreaRO["cortesia"] >) 0) || (count($LastAreaRC["cortesia"] >) 0))){
				foreah($LastAreaAO["cortesia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["cortesia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Empatía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["empatia"] > 0)) || (count($LastAreaAC["empatia"] > 0)) || (count($LastAreaRO["empatia"] > 0)) || (count($LastAreaRC["empatia"] > 0))){)
				foreach($LastAreaO["empatia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["empatia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["empatia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["empatia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Excepciones"</td>
			</tr>
		<?php
			if((count($LastAreaAO["excepciones"] > 0)) || (count($LastAreaAC["excepciones"]) > 0) || (count($LastAreaRO["excepciones"]) > 0) || (count($LastAreaRC["excepciones"]) > 0)){
				foreach($LastAreaAO["excepciones"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["excepciones"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de  "Información"</td>
			</tr>
		<?php
			if((count($LastAreaAO["informacion"] > 0)) || (count($LastAreaAC["informacion"]) > 0) || (count($LastAreaRO["informacion"]) > 0) || (count($LastAreaRC["informacion"]) > 0)){
				foreach($LastAreaAO["informacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["informacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["informacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["informacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Consultoría"</td>
			</tr>
		<?php
			if((count($LastAreaAO["consultoria"] > 0)) || (count($LastAreaAC["consultoria"]) > 0) || (count($LastAreaRO["consultoria"]) > 0) || (count($LastAreaRC["consultoria"]) > 0)){
				foreach($LastAreaAO["consultoria"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["consultoria"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Capacidad de Respuesta"</td>
			</tr>
		<?php
			if((count($LastAreaAO["capacidadrespuesta"] > 0)) || (count($LastAreaAC["capacidadrespuesta)"] > 0) || (count($LastAreaRO["capacidadrespuesta)"] > 0) || (count($LastAreaRC["capacidadrespuesta)"] >0))){
				foreach($LastAreaAO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Competencias"</td>
			</tr>
		<?php
			if((count($LastAreaAO["competencias"] > 0)) || (count($LastAreaAC["competencias"]) > 0) || (count($LastAreaRO["competencias"]) > 0) || (count($LastAreaRC["competencias"]) > 0)){
				foreach($LastAreaAO["competencias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["competencias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["competencias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["competencias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Credibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["credibilidad"] > 0)) || (count($LastAreaAC["credibilidad"]) > 0) || (count($LastAreaRO["credibilidad"]) > 0) || (count($LastAreaRC["credibilidad"]) > 0)){
				foreach($LastAreaAO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Custodia"</td>
			</tr>
		<?php
			if((count($LastAreaAO["custodia"] > 0)) || (count($LastAreaAC["custodia"] >) 0) || (count($LastAreaRO["custodia"] >) 0) || (count($LastAreaRC["custodia"] >) 0))){
				foreah($LastAreaAO["custodia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["custodia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["custodia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["custodia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Garantías"</td>
			</tr>
		<?php
			if((count($LastAreaAO["garantias"] > 0)) || (count($LastAreaAC["garantias"] >) 0) || (count($LastAreaRO["garantias"] >) 0) || (count($LastAreaRC["garantias"] >) 0))){
				foreah($LastAreaAO["garantias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["garantias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["garantias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["garantias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Proximidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["proximidad"] > 0)) || (count($LastAreaAC["proximidad"]) > 0) || (count($LastAreaRO["proximidad"]) > 0) || (count($LastAreaRC["proximidad"]) > 0)){
				foreach($LastAreaAO["proximidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["proximidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tiempos de espera"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tiempoespera"] > 0)) || (count($LastAreaAC["tiempoespera"]) > 0) || (count($LastAreaRO["tiempoespera"]) > 0) || (count($LastAreaRC["tiempoespera"]) > 0)){
				foreach($LastAreaAO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Localización"</td>
			</tr>
		<?php
			if((count($LastAreaAO["localizacion"] > 0)) || (count($LastAreaAC["localizacion"]) > 0) || (count($LastAreaRO["localizacion"]) > 0) || (count($LastAreaRC["localizacion"]) > 0)){
				foreach($LastAreaAO["localizacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["localizacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Horario de Servicio al Cliente"</td>
			</tr>
		<?php
			if((count($LastAreaAO["horarios"] > 0)) || (count($LastAreaAC["horarios"] >) 0) || (count($LastAreaRO["horarios"] >) 0) || (count($LastAreaRC["horarios"] >) 0))){
				foreah($LastAreaAO["horarios"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["horarios"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["horarios"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["horarios"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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

<!-- ////////////////////////////////////////////////// -->

<?php 

	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	foreach($CuestionariosArray as $Cuestionarios){
		$FCEAreaRO[$Cuestionarios] = array();
		$FCEAreaRC[$Cuestionarios] = array();
		$FCEAO[$Cuestionarios] = array();
		$FCEAreaAC[$Cuestionarios] = array();
	}
	$QuerySQL = "SELECT name, pregunta, pregunta_id, respuesta FROM wp_tmp_preguntas INNER JOIN wp_tmp_cdcompetencia ON wp_tmp_preguntas.id = wp_tmp_cdcompetencia.pregunta_id WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
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
		$Tabla = substr($FieldName,0,strpos($FieldName,"_"));
		$FieldName = substr($FieldName,strpos($FieldName,"_") + 1, strlen($FieldName));
		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_scliente WHERE wp_tmp_scliente.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		//echo $QuerySQL."<br><br>";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				//echo "Respuesta Competencia: ".$RespuestaCompetencia. " - Respuesta: ".$rowTable[$FieldName]."<br><br>";
				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAO[$Tabla] = $Pregunta_id;
					array_push($FCEAO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}
			}
		}catch(Exception $ex){
			continue;
		}
	}
	/*var_dump($AreaAO);echo "<br>";
	var_dump($AreaAC);echo "<br>";
	var_dump($AreaRO);echo "<br>";
	var_dump($AreaRC);echo "<br>";*/
	echo "<br>";echo "<br>";echo "<br>";echo "<br>";
	/*var_dump($FCEAO);echo "<br>";
	var_dump($FCEAreaAC);echo "<br>";
	var_dump($FCEAreaRO);echo "<br>";
	var_dump($FCEAreaRC);echo "<br>";*/
	$CantRO = 1;
	$CantRC = 1;
	$CantAO = 1;
	$CantAC = 1;
	$LastAreaRO = array();
	$LastAreaRC = array();
	$LastAreaAO = array();
	$LastAreaAC = array();
	
	foreach($CuestionariosArray as $Cuestionarios){
		$LastAreaRO[$Cuestionarios] = array();
		$LastAreaRC[$Cuestionarios] = array();
		$LastAreaAO[$Cuestionarios] = array();
		$LastAreaAC[$Cuestionarios] = array();
	}

	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAO[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaAC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAC[$Cuestionarios],$value2);
				}
			}
		}
	}

	
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRC[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRO[$Cuestionarios],$value2);
				}
			}
		}
	}

?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<th>ESTRATEGIAS PARA EL SERVICIO AL CLIENTE</th>
		</tr>
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Confiabilidad"</td>
		</tr>
		<?php
			if((count($LastAreaAO["confiabilidad"] > 0)) || (count($LastAreaAC["confiabilidad"]) > 0) || (count($LastAreaRO["confiabilidad"]) > 0) || (count($LastAreaRC["confiabilidad"]) > 0)){
				foreach($LastAreaAO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tangibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tangibilidad"] > 0)) || (count($LastAreaAC["tangibilidad"]) > 0) || (count($LastAreaRO["tangibilidad"]) > 0) || (count($LastAreaRC["tangibilidad"]) > 0)){
				foreach($LastAreaAO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Cortesía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["cortesia"] > 0)) || (count($LastAreaAC["cortesia"] >) 0) || (count($LastAreaRO["cortesia"] >) 0) || (count($LastAreaRC["cortesia"] >) 0))){
				foreah($LastAreaAO["cortesia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["cortesia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Empatía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["empatia"] > 0)) || (count($LastAreaAC["empatia"] > 0)) || (count($LastAreaRO["empatia"] > 0)) || (count($LastAreaRC["empatia"] > 0))){)
				foreach($LastAreaO["empatia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["empatia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["empatia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["empatia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Excepciones"</td>
			</tr>
		<?php
			if((count($LastAreaAO["excepciones"] > 0)) || (count($LastAreaAC["excepciones"]) > 0) || (count($LastAreaRO["excepciones"]) > 0) || (count($LastAreaRC["excepciones"]) > 0)){
				foreach($LastAreaAO["excepciones"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["excepciones"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de  "Información"</td>
			</tr>
		<?php
			if((count($LastAreaAO["informacion"] > 0)) || (count($LastAreaAC["informacion"]) > 0) || (count($LastAreaRO["informacion"]) > 0) || (count($LastAreaRC["informacion"]) > 0)){
				foreach($LastAreaAO["informacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["informacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["informacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["informacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Consultoría"</td>
			</tr>
		<?php
			if((count($LastAreaAO["consultoria"] > 0)) || (count($LastAreaAC["consultoria"]) > 0) || (count($LastAreaRO["consultoria"]) > 0) || (count($LastAreaRC["consultoria"]) > 0)){
				foreach($LastAreaAO["consultoria"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["consultoria"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Capacidad de Respuesta"</td>
			</tr>
		<?php
			if((count($LastAreaAO["capacidadrespuesta"] > 0)) || (count($LastAreaAC["capacidadrespuesta)"] > 0) || (count($LastAreaRO["capacidadrespuesta)"] > 0) || (count($LastAreaRC["capacidadrespuesta)"] >0))){
				foreach($LastAreaAO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Competencias"</td>
			</tr>
		<?php
			if((count($LastAreaAO["competencias"] > 0)) || (count($LastAreaAC["competencias"]) > 0) || (count($LastAreaRO["competencias"]) > 0) || (count($LastAreaRC["competencias"]) > 0)){
				foreach($LastAreaAO["competencias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["competencias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["competencias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["competencias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Credibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["credibilidad"] > 0)) || (count($LastAreaAC["credibilidad"]) > 0) || (count($LastAreaRO["credibilidad"]) > 0) || (count($LastAreaRC["credibilidad"]) > 0)){
				foreach($LastAreaAO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Custodia"</td>
			</tr>
		<?php
			if((count($LastAreaAO["custodia"] > 0)) || (count($LastAreaAC["custodia"] >) 0) || (count($LastAreaRO["custodia"] >) 0) || (count($LastAreaRC["custodia"] >) 0))){
				foreah($LastAreaAO["custodia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["custodia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["custodia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["custodia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Garantías"</td>
			</tr>
		<?php
			if((count($LastAreaAO["garantias"] > 0)) || (count($LastAreaAC["garantias"] >) 0) || (count($LastAreaRO["garantias"] >) 0) || (count($LastAreaRC["garantias"] >) 0))){
				foreah($LastAreaAO["garantias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["garantias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["garantias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["garantias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Proximidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["proximidad"] > 0)) || (count($LastAreaAC["proximidad"]) > 0) || (count($LastAreaRO["proximidad"]) > 0) || (count($LastAreaRC["proximidad"]) > 0)){
				foreach($LastAreaAO["proximidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["proximidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tiempos de espera"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tiempoespera"] > 0)) || (count($LastAreaAC["tiempoespera"]) > 0) || (count($LastAreaRO["tiempoespera"]) > 0) || (count($LastAreaRC["tiempoespera"]) > 0)){
				foreach($LastAreaAO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Localización"</td>
			</tr>
		<?php
			if((count($LastAreaAO["localizacion"] > 0)) || (count($LastAreaAC["localizacion"]) > 0) || (count($LastAreaRO["localizacion"]) > 0) || (count($LastAreaRC["localizacion"]) > 0)){
				foreach($LastAreaAO["localizacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["localizacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Horario de Servicio al Cliente"</td>
			</tr>
		<?php
			if((count($LastAreaAO["horarios"] > 0)) || (count($LastAreaAC["horarios"] >) 0) || (count($LastAreaRO["horarios"] >) 0) || (count($LastAreaRC["horarios"] >) 0))){
				foreah($LastAreaAO["horarios"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["horarios"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["horarios"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["horarios"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo $Estrategias["EST_".$Arreglo["Name_".$Valor]]; ?></td>
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
<!-- ////////////////////////////////////////////////// -->

<?php 

	$Arreglo = GetVCCDEccsQuestion($_SESSION["tmp_id_solicitud"]);
	$AreaRO = array();
	$AreaRC = array();
	$AreaAO = array();
	$AreaAC = array();
	foreach($CuestionariosArray as $Cuestionarios){
		$AreaRO[$Cuestionarios] = array();
		$AreaRC[$Cuestionarios] = array();
		$AreaAO[$Cuestionarios] = array();
		$AreaAC[$Cuestionarios] = array();
	}
	for($i=0; $i<=count($VentajasComparativasEccsArray) - 1; $i++){
		for($j=0; $j <= count($CompetenciasDistintivasDeLaCompetenciaEccsArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasEccsArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasEccsArray[$i]["respuesta"];
			$PreguntaCD = $CompetenciasDistintivasDeLaCompetenciaEccsArray[$j]["pregunta_id"];
			$RespuestaCD = $CompetenciasDistintivasDeLaCompetenciaEccsArray[$j]["respuesta"];
			$CuestionarioVC = $VentajasComparativasEccsArray[$i]["cuestionario"];
			$CuestionarioCD = $CompetenciasDistintivasDeLaCompetenciaEccsArray[$j]["cuestionario"];
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
			if(($PreguntaVC == $PreguntaCD) && ($CuestionarioVC == $CuestionarioCD)){
				$Name = $CuestionarioVC;
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "4")){
					array_push($AreaAC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
					array_push($AreaAC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "5")){
					array_push($AreaAO[$Name],utf8_decode($PreguntaVC));
					break;
				}
			}
		}
	}
	for($i=0; $i<=count($VentajasComparativasEccsArray) - 1; $i++){
		for($j=0; $j <= count($CompetenciasDistintivasDeSuProductoEccsArray) - 1; $j++){
			$PreguntaVC = $VentajasComparativasEccsArray[$i]["pregunta_id"];
			$RespuestaVC = $VentajasComparativasEccsArray[$i]["respuesta"];
			$PreguntaCD = $CompetenciasDistintivasDeSuProductoEccsArray[$j]["pregunta_id"];
			$RespuestaCD = $CompetenciasDistintivasDeSuProductoEccsArray[$j]["respuesta"];
			$CuestionarioVC = $VentajasComparativasEccsArray[$i]["cuestionario"];
			$CuestionarioCD = $CompetenciasDistintivasDeSuProductoEccsArray[$j]["cuestionario"];
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
			if(($PreguntaVC == $PreguntaCD) && ($CuestionarioVC == $CuestionarioCD)){
				$Name = $CuestionarioVC;
				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "0")){
					array_push($AreaRO[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "1")){
					array_push($AreaRO[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "2")){
					array_push($AreaRC[$Name],utf8_decode($PreguntaVC));
					break;
				}
				if((($RespuestaVC == "0") && ($RespuestaCD == "1") || ($RespuestaCD == "2"))){
					array_push($AreaRC[$Name],utf8_decode($PreguntaVC));
					break;
				}
			}
		}
	}

	$FCEAreaRO = array();
	$FCEAreaRC = array();
	$FCEAO = array();
	$FCEAreaAC = array();
	foreach($CuestionariosArray as $Cuestionarios){
		$FCEAreaRO[$Cuestionarios] = array();
		$FCEAreaRC[$Cuestionarios] = array();
		$FCEAO[$Cuestionarios] = array();
		$FCEAreaAC[$Cuestionarios] = array();
	}
	$QuerySQL = "SELECT pregunta, pregunta_id, respuesta, wp_tmp_cdcompetenciaeccs.cuestionario FROM wp_tmp_preguntasusuarios INNER JOIN wp_tmp_cdcompetenciaeccs ON wp_tmp_preguntasusuarios.id = wp_tmp_cdcompetenciaeccs.pregunta_id WHERE wp_tmp_cdcompetenciaeccs.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$Query = mysqli_query($conexion, $QuerySQL) or die(mysqli_error($conexion));
	while($row = mysqli_fetch_assoc($Query)){
		$FieldName = $row['name'];
		$Pregunta_id = $row['pregunta_id'];
		$Pregunta = $row['pregunta'];
		$Cuestionario = $row['cuestionario'];
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
		$Tabla = $Cuestionario;
		$QuerySQL = "SELECT respuesta FROM wp_tmp_eccs WHERE wp_tmp_eccs.solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and pregunta_id = '".$Pregunta_id."' and respuesta between '4' and '5'";
		//echo $QuerySQL."<br><br>";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				//echo "Respuesta Competencia: ".$RespuestaCompetencia. " - Respuesta: ".$rowTable["respuesta"]."<br><br>";
				if((($RespuestaCompetencia == "4")) && (($rowTable["respuesta"] == "4") || ($rowTable["respuesta"] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable["respuesta"] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaAC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable["respuesta"] == "5"))){
					//$FCEAO[$Tabla] = $Pregunta_id;
					array_push($FCEAO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "0")) && (($rowTable["respuesta"] == "4") || ($rowTable["respuesta"] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1")) && (($rowTable["respuesta"] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRO[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && (($rowTable["respuesta"] == "4"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}

				if((($RespuestaCompetencia == "2")) && (($rowTable["respuesta"] == "5"))){
					//$FCEAreaAC[$Tabla] = $Pregunta_id;
					array_push($FCEAreaRC[$Tabla],utf8_decode($Pregunta_id));
				}
			}
		}catch(Exception $ex){
			continue;
		}
	}
	/*var_dump($AreaAO);echo "<br>";
	var_dump($AreaAC);echo "<br>";
	var_dump($AreaRO);echo "<br>";
	var_dump($AreaRC);echo "<br>";
	echo "<br>";echo "<br>";echo "<br>";echo "<br>";
	var_dump($FCEAO);echo "<br>";
	var_dump($FCEAreaAC);echo "<br>";
	var_dump($FCEAreaRO);echo "<br>";
	var_dump($FCEAreaRC);echo "<br>";*/
	$CantRO = 1;
	$CantRC = 1;
	$CantAO = 1;
	$CantAC = 1;
	$LastAreaRO = array();
	$LastAreaRC = array();
	$LastAreaAO = array();
	$LastAreaAC = array();
	
	foreach($CuestionariosArray as $Cuestionarios){
		$LastAreaRO[$Cuestionarios] = array();
		$LastAreaRC[$Cuestionarios] = array();
		$LastAreaAO[$Cuestionarios] = array();
		$LastAreaAC[$Cuestionarios] = array();
	}

	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAO[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaAC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaAC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaAC[$Cuestionarios],$value2);
				}
			}
		}
	}

	
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRC[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRC[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRC[$Cuestionarios],$value2);
				}
			}
		}
	}
	foreach($CuestionariosArray as $Cuestionarios){
		foreach($FCEAreaRO[$Cuestionarios] as $value1){
			//echo "---> ".($value1). "<br>\n";
			foreach($AreaRO[$Cuestionarios] as $value2){
				//echo "---> ---> ".($value2)."<br>\n";
				if($value1 === $value2){
					array_push($LastAreaRO[$Cuestionarios],$value2);
				}
			}
		}
	}

?>
<page pageset="old">
	<table class="table OneTDTH">
		<tr>
			<th>ESTRATEGIAS PARA EL SERVICIO COMPLEMENTARIO</th>
		</tr>
		<tr>
			<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Confiabilidad"</td>
		</tr>
		<?php
			if((count($LastAreaAO["confiabilidad"] > 0)) || (count($LastAreaAC["confiabilidad"]) > 0) || (count($LastAreaRO["confiabilidad"]) > 0) || (count($LastAreaRC["confiabilidad"]) > 0)){
				foreach($LastAreaAO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["confiabilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tangibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tangibilidad"] > 0)) || (count($LastAreaAC["tangibilidad"]) > 0) || (count($LastAreaRO["tangibilidad"]) > 0) || (count($LastAreaRC["tangibilidad"]) > 0)){
				foreach($LastAreaAO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tangibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Cortesía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["cortesia"] > 0)) || (count($LastAreaAC["cortesia"] >) 0) || (count($LastAreaRO["cortesia"] >) 0) || (count($LastAreaRC["cortesia"] >) 0))){
				foreah($LastAreaAO["cortesia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["cortesia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["cortesia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Empatía"</td>
			</tr>
		<?php
			if((count($LastAreaAO["empatia"] > 0)) || (count($LastAreaAC["empatia"] > 0)) || (count($LastAreaRO["empatia"] > 0)) || (count($LastAreaRC["empatia"] > 0))){)
				foreach($LastAreaO["empatia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["empatia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["empatia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["empatia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Excepciones"</td>
			</tr>
		<?php
			if((count($LastAreaAO["excepciones"] > 0)) || (count($LastAreaAC["excepciones"]) > 0) || (count($LastAreaRO["excepciones"]) > 0) || (count($LastAreaRC["excepciones"]) > 0)){
				foreach($LastAreaAO["excepciones"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["excepciones"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["excepciones"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de  "Información"</td>
			</tr>
		<?php
			if((count($LastAreaAO["informacion"] > 0)) || (count($LastAreaAC["informacion"]) > 0) || (count($LastAreaRO["informacion"]) > 0) || (count($LastAreaRC["informacion"]) > 0)){
				foreach($LastAreaAO["informacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["informacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["informacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["informacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Consultoría"</td>
			</tr>
		<?php
			if((count($LastAreaAO["consultoria"] > 0)) || (count($LastAreaAC["consultoria"]) > 0) || (count($LastAreaRO["consultoria"]) > 0) || (count($LastAreaRC["consultoria"]) > 0)){
				foreach($LastAreaAO["consultoria"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["consultoria"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["consultoria"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Capacidad de Respuesta"</td>
			</tr>
		<?php
			if((count($LastAreaAO["capacidadrespuesta"] > 0)) || (count($LastAreaAC["capacidadrespuesta)"] > 0) || (count($LastAreaRO["capacidadrespuesta)"] > 0) || (count($LastAreaRC["capacidadrespuesta)"] >0))){
				foreach($LastAreaAO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["capacidadrespuesta"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Competencias"</td>
			</tr>
		<?php
			if((count($LastAreaAO["competencias"] > 0)) || (count($LastAreaAC["competencias"]) > 0) || (count($LastAreaRO["competencias"]) > 0) || (count($LastAreaRC["competencias"]) > 0)){
				foreach($LastAreaAO["competencias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["competencias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["competencias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["competencias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Credibilidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["credibilidad"] > 0)) || (count($LastAreaAC["credibilidad"]) > 0) || (count($LastAreaRO["credibilidad"]) > 0) || (count($LastAreaRC["credibilidad"]) > 0)){
				foreach($LastAreaAO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["credibilidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Custodia"</td>
			</tr>
		<?php
			if((count($LastAreaAO["custodia"] > 0)) || (count($LastAreaAC["custodia"] >) 0) || (count($LastAreaRO["custodia"] >) 0) || (count($LastAreaRC["custodia"] >) 0))){
				foreah($LastAreaAO["custodia"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["custodia"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["custodia"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["custodia"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Garantías"</td>
			</tr>
		<?php
			if((count($LastAreaAO["garantias"] > 0)) || (count($LastAreaAC["garantias"] >) 0) || (count($LastAreaRO["garantias"] >) 0) || (count($LastAreaRC["garantias"] >) 0))){
				foreah($LastAreaAO["garantias"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["garantias"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["garantias"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["garantias"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Proximidad"</td>
			</tr>
		<?php
			if((count($LastAreaAO["proximidad"] > 0)) || (count($LastAreaAC["proximidad"]) > 0) || (count($LastAreaRO["proximidad"]) > 0) || (count($LastAreaRC["proximidad"]) > 0)){
				foreach($LastAreaAO["proximidad"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["proximidad"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["proximidad"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Tiempos de espera"</td>
			</tr>
		<?php
			if((count($LastAreaAO["tiempoespera"] > 0)) || (count($LastAreaAC["tiempoespera"]) > 0) || (count($LastAreaRO["tiempoespera"]) > 0) || (count($LastAreaRC["tiempoespera"]) > 0)){
				foreach($LastAreaAO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["tiempoespera"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Localización"</td>
			</tr>
		<?php
			if((count($LastAreaAO["localizacion"] > 0)) || (count($LastAreaAC["localizacion"]) > 0) || (count($LastAreaRO["localizacion"]) > 0) || (count($LastAreaRC["localizacion"]) > 0)){
				foreach($LastAreaAO["localizacion"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["localizacion"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["localizacion"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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
				<td style="background-color: orange; color: #FFFFFF;">Lineamientos estratégicos de "Horario de Servicio al Cliente"</td>
			</tr>
		<?php
			if((count($LastAreaAO["horarios"] > 0)) || (count($LastAreaAC["horarios"] >) 0) || (count($LastAreaRO["horarios"] >) 0) || (count($LastAreaRC["horarios"] >) 0))){
				foreah($LastAreaAO["horarios"] as $Valor){
					?>
						<tr style="background-color: blue; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaAC["horarios"] as $Valor){
					?>
						<tr style="background-color: #4997D0;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRO["horarios"] as $Valor){
					?>
						<tr style="background-color: #C80815; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
						</tr>
					<?php
				}
				foreach($LastAreaRC["horarios"] as $Valor){
					?>
						<tr style="background-color: #ff4d4d; color: #FFFFFF;">
							<td><?php echo utf8_decode($Arreglo[$Valor]); ?></td>
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

<style>
	ul{
		margin: 0;
		padding: 0;
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
