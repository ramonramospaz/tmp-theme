<?php /* Template Name: Report Diagnostico Comercial de la Competencia */
    ob_start();

	session_start();

	include("config/conexion.php");
    include_all_php("Classes/");
    ?>
<?php
	$ServicioClass = new Servicio();
	$ServicioClass->ID = $_SESSION["tmp_id_servicio"];

	$SolicitudClass = new Solicitud();
	$SolicitudClass->id_solicitud = $_SESSION["tmp_id_solicitud"];
	$SolicitudClass->usuario_id = $_SESSION["tmp_id_user"];
	
	$BriefingsClass = new Briefings();
	$BriefingsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$BriefingsClass->usuario_id = $_SESSION["tmp_id_user"];

	$CaracterDeLaCompetenciaClass = new CaracterDeLaCompetencia();
	$CaracterDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CaracterDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$IdentificacionDeLaCompetenciaClass = new IdentificacionDeLaCompetencia();
	$IdentificacionDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$IdentificacionDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$CompetenciasDistintivasDeLaCompetenciaClass = new CompetenciasDistintivasDeLaCompetencia();
	$CompetenciasDistintivasDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CompetenciasDistintivasDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

	$VentajasComparativasClass = new VentajasComparativas();
	$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

	$CapacidadDeReaccionClass = new CapacidadDeReaccion();
	$CapacidadDeReaccionClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$CapacidadDeReaccionClass->usuario_id = $_SESSION["tmp_id_user"];

	$ServicioClass->GetDataReport();
	
	$SolicitudClass->GetDataReport();

	$BriefingsClass->GetDataReport(); //BRIEFINGS DATA
	
	$IdentificacionDeLaCompetenciaClass->GetDataReport();

	$CaracterDeLaCompetenciaArray = $CaracterDeLaCompetenciaClass->GetDataReport();

	$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport(); //Competencias Distintivas De La Competencia DATA

	$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport(); //Ventajas Comparativas DATA

	$CapacidadDeReaccionArray = $CapacidadDeReaccionClass->GetDataReport();

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
?>
<page>
	<img style="width: 100%; height: 100%;" src="wp-content/themes/tmp-theme/img/1-PORTADA.png" alt="">
</page>
<page backtop="90px" backbottom="90px" backimgx="center" backimgy="middle" backimgw="800px" backimg="wp-content/themes/tmp-theme/img/4-HOJA-DE-CONTENIDO.png">
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
		$IDCuestionario = "499"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
	?>
	<table class="table">
		<tr>
			<th colspan="5">2.1. COMPETENCIA Y PARTICIPACION DE MERCADO</th>
		</tr>
		<tr class="principal">
			<td>POSICIONES DE LOS LIDERES DEL MERCADO</td>
			<td>% Participación</td><!-- IdentificacionDeLaCompetenciaClass -->
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
			<td>Resto de oferentes del mercado</td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->pc6; ?>%</td>
		</tr>
		<tr>
			<td class="principal">Competencia principal:</td>
			<td><?php echo $IdentificacionDeLaCompetenciaClass->cprincipal; ?></td>
		</tr>
	</table>
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
		<tr>
			<th >Tendencias en cuanto a componentes del PRODUCTO</th>
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
			<th >Tendencias en cuanto al PRECIO</th>
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
			<th >Tendencias en cuanto a la DISTRIBUCION</th>
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
			<th>Tendencias PROMOCIONALES</th>
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
</page>

<?php
	$Array_CDC_SMC = array();
	$Array_CDC_SMLI = array();
	//
	$Array_CC_ME = array();
	$Array_CC_NPME = array();
	//
	$Array_VC_I = array();
	$Array_VC_S = array();


	foreach($VentajasComparativasArray as $VC){
		$Pregunta = $VC['pregunta_id'];
		$Respuesta = $VC['respuesta'];
		switch($Respuesta){
				case '1':
					$Respuesta = "-1";
				break;
				case '2':
					$Respuesta = "0";
				break;
				case '3':
					$Respuesta = "1";
				break;
			}
		if($Respuesta == "-1"){
			array_push($Array_VC_I,$Pregunta);
		}
		if($Respuesta == "1"){
			array_push($Array_VC_S,$Pregunta);
		}
	}
	foreach($CompetenciasDistintivasDeLaCompetenciaArray as $CDC){
		$Pregunta = $CDC['pregunta_id'];
		$Respuesta = $CDC['respuesta'];
		switch($Respuesta){
			case '1':
				$Respuesta = "0";
			break;
			case '2':
				$Respuesta = "1";
			break;
			case '3':
				$Respuesta = "2";
			break;
			case '4':
				$Respuesta = "3";
			break;
			case '5':
				$Respuesta = "4";
			break;
			case '6':
				$Respuesta = "5";
			break;
		}
		if(($Respuesta == "4") || ($Respuesta == "5")){
			array_push($Array_CDC_SMC,$Pregunta);
		}
		if(($Respuesta == "0") || ($Respuesta == "1") || ($Respuesta == "2")){
			array_push($Array_CDC_SMLI,$Pregunta);
		}
	}
	foreach($CaracterDeLaCompetenciaArray as $CC){
		$Pregunta = $CC['pregunta_id'];
		$Respuesta = $CC['respuesta'];
		if($Respuesta == "1"){
			array_push($Array_CC_ME,$Pregunta);
		}
		if(($Respuesta == "2") || ($Respuesta == "3") || ($Respuesta == "4")){
			array_push($Array_CC_NPME,$Pregunta);
		}
	}

	//FMIRP
	$ArrayFMIRP = array();
	$ArrayFMIRP = $Array_CC_ME;
	foreach($ArrayFMIRP as $key => $CC){
		$Exist = FALSE;
		foreach($Array_CDC_SMC as $CDC){
			if($CDC == $CC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFMIRP[$key]);
		}
	}
	foreach($ArrayFMIRP as $key => $CC_CDC){
		$Exist = FALSE;
		foreach($Array_VC_I as $VC){
			if($VC == $CC_CDC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFMIRP[$key]);
		}
	}

	//FmIRP
	$ArrayFmIRP = array();
	$ArrayFmIRP = $Array_CC_NPME;
	foreach($ArrayFMIRP as $key => $CC){
		$Exist = FALSE;
		foreach($Array_CDC_SMC as $CDC){
			if($CDC == $CC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFmIRP[$key]);
		}
	}
	foreach($ArrayFMIRP as $key => $CC_CDC){
		$Exist = FALSE;
		foreach($Array_VC_I as $VC){
			if($VC == $CC_CDC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFmIRP[$key]);
		}
	}

	//FMIRN
	$ArrayFMIRN = array();
	$ArrayFMIRN = $Array_CC_ME;
	foreach($ArrayFMIRN as $key => $CC){
		$Exist = FALSE;
		foreach($Array_CDC_SMLI as $CDC){
			if($CDC == $CC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFMIRN[$key]);
		}
	}
	foreach($ArrayFMIRN as $key => $CC_CDC){
		$Exist = FALSE;
		foreach($Array_VC_S as $VC){
			if($VC == $CC_CDC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFMIRN[$key]);
		}
	}

	//FmIRN
	$ArrayFmIRN = array();
	$ArrayFmIRN = $Array_CC_NPME;
	foreach($ArrayFmIRN as $key => $CC){
		$Exist = FALSE;
		foreach($Array_CDC_SMLI as $CDC){
			if($CDC == $CC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFmIRN[$key]);
		}
	}
	foreach($ArrayFmIRN as $key => $CC_CDC){
		$Exist = FALSE;
		foreach($Array_VC_S as $VC){
			if($VC == $CC_CDC){
				$Exist = TRUE;
			}
		}
		if(!$Exist){
			unset($ArrayFmIRN[$key]);
		}
	}
	$ArrayFMIRP = array_values($ArrayFMIRP);
	$ArrayFmIRP = array_values($ArrayFmIRP);
	$ArrayFMIRN = array_values($ArrayFMIRN);
	$ArrayFmIRN = array_values($ArrayFmIRN);

	$FactoresPositivosCount = count($ArrayFMIRP) >= count($ArrayFmIRP) ? count($ArrayFMIRP) : count($ArrayFmIRP);
	$FactoresNegativosCount = count($ArrayFMIRN) >= count($ArrayFmIRN) ? count($ArrayFMIRN) : count($ArrayFmIRN);
	
	$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
?>
<page pageset="old">
	<table class="table">
		<tr>
			<th colspan="2">2.1. CARÁCTER DE LA COMPETENCIA</th>
		</tr>
		<tr>
			<td colspan="2">RESULTADOS O PERFORMANCES POSITIVOS EN EL CARÁCTER DE LA COMPETENCIA</td>
		</tr>
		<tr class="principal">
			<td>Factores de mayor inversión con resultados positivos (prioridad comercial de la competencia)</td>
			<td>Factores de menor inversión con resultados positivos</td>
		</tr>
		<?php
			for($i=0; $i<=$FactoresPositivosCount - 1; $i++){
				?>
					<tr>
						<td style="background-color: blue; color: #FFFFFF;"><?php if(isset($ArrayFMIRP[$i])){ echo $Arreglo[$ArrayFMIRP[$i]]; } ?></td>
						<td style="background-color: #4997D0; color: #FFFFFF;"><?php if(isset($ArrayFmIRP[$i])){ echo $Arreglo[$ArrayFmIRP[$i]]; } ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<th class="principal" colspan="2">RESULTADOS O PERFORMANCES NEGATIVOS EN EL CARACTER DE LA COMPETENCIA</th>
		</tr>
		<tr class="principal">
			<td>Factores de mayor inversión con resultados negativos (prioridad comercial de la competencia)</td>
			<td>Factores de menor inversión con resultados negativos</td>
		</tr>
		<?php
			for($i=0; $i<=$FactoresNegativosCount - 1; $i++){
				?>
					<tr>
						<td style="background-color: #C80815; color: #FFFFFF;"><?php if(isset($ArrayFMIRN[$i])){ echo $Arreglo[$ArrayFMIRN[$i]]; } ?></td>
						<td style="background-color: #ff4d4d; color: #FFFFFF;"><?php if(isset($ArrayFmIRN[$i])){ echo $Arreglo[$ArrayFmIRN[$i]]; } ?></td>
					</tr>
				<?php
			}
		?>
	</table>
</page>

<?php
	$Arreglo = array();
	$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
	$AreaMDC = array();
	$AreaDC = array();
	$AreaMFC = array();
	$AreaFC = array();
	for($i=0; $i <= count($VentajasComparativasArray) - 1; $i++){
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
			if($PreguntaVC === $PreguntaCD){
				if((($RespuestaVC == "0") || ($RespuestaVC == "1")) && ($RespuestaCD == "0")){
					array_push($AreaMDC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "1") && ($RespuestaCD == "1")){
					array_push($AreaMDC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "1")){
					array_push($AreaDC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if((($RespuestaVC == "0") || ($RespuestaVC == "1")) && ($RespuestaCD == "2")){
					array_push($AreaDC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}

				if((($RespuestaVC == "-1") || ($RespuestaVC == "0")) && ($RespuestaCD == "4")){
					array_push($AreaFC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "0") && ($RespuestaCD == "5")){
					array_push($AreaFC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
				if(($RespuestaVC == "-1") && ($RespuestaCD == "5")){
					array_push($AreaMFC,utf8_decode($Arreglo[$PreguntaVC]));
					break;
				}
			}
		}
	}
	$FCEAreaMDC = array();
	$FCEAreaDC = array();
	$FCEAreaMFC = array();
	$FCEAreaFC = array();
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

		$QuerySQL = "SELECT ".$FieldName." FROM wp_tmp_iproducto".$tproducto." INNER JOIN wp_tmp_iprecio".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_iprecio".$tproducto.".solicitud_id INNER JOIN wp_tmp_idistribucion".$tproducto." ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_idistribucion".$tproducto.".solicitud_id INNER JOIN wp_tmp_ipromocion ON wp_tmp_iproducto".$tproducto.".solicitud_id = wp_tmp_ipromocion.solicitud_id WHERE wp_tmp_iproducto".$tproducto.".solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' and ".$FieldName." between '4' and '5'";
		try{
			$QueryTables = @mysqli_query($conexion, $QuerySQL);
			while($rowTable = @mysqli_fetch_assoc($QueryTables)){
				if((($RespuestaCompetencia == "0")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaMDC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "1")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaMDC,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "1") || ($RespuestaCompetencia == "2")) && ($rowTable[$FieldName] == "4")){
					array_push($FCEAreaDC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "2")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaDC,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "4")) && (($rowTable[$FieldName] == "4") || ($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaFC,utf8_decode($Pregunta));
				}
				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "4"))){
					array_push($FCEAreaFC,utf8_decode($Pregunta));
				}

				if((($RespuestaCompetencia == "5")) && (($rowTable[$FieldName] == "5"))){
					array_push($FCEAreaMFC,utf8_decode($Pregunta));
				}
			}
		}catch(Exception $ex){
			continue;
		}
		
	}
	$CantMDC = 1;
	$CantDC = 1;
	$CantMFC = 1;
	$CantFC = 1;
	$LastAreaMDC = array();
	$LastAreaDC = array();
	$LastAreaMFC = array();
	$LastAreaFC = array();
	
	foreach ($FCEAreaMDC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaMDC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaMDC,$value2);
				$CantMDC++;
			}
		}
	}
	foreach ($FCEAreaDC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaDC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaDC,$value2);
				$CantDC++;
			}
		}
	}
	foreach ($FCEAreaMFC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaMFC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaMFC,$value2);
				$CantMFC++;
			}
		}
	}
	foreach ($FCEAreaFC as $value1) {
	//echo "---> ". utf8_encode($value1). "<br>\n";
		foreach ($AreaFC as $value2) {
			//echo "---> ---> ".($value2)."<br>\n";
			if (utf8_encode($value1) === $value2){
				array_push($LastAreaFC,$value2);
				$CantFC++;
			}
		}
	}
?>
<page pageset="old">
	<table class="table">
		<tr>
			<th class="principal" colspan="5">2.2. . FORTALEZAS Y DEBILIDADES DE LA COMPETENCIA</th>
		</tr>
		<tr>
			<th class="principal" colspan="5">2.2.1. FORTALEZAS DE LA COMPETENCIA</th>
		</tr>
		<tr style="background-color: blue; color: #FFFFFF;">
			<td style="font-weight: bold;" rowspan="<?php echo $CantMFC; ?>">MAYORES FORTALEZAS</td>
		</tr>
		<?php
			for($i=0; $i<=count($LastAreaMFC) - 1; $i++){
				?>
					<tr style="background-color: blue; color: #FFFFFF;">
						<td><?php echo $LastAreaMFC[$i]; ?></td>
					</tr>
				<?php
			}
		?>
		<tr style="background-color: #4997D0; color: #FFFFFF;">
			<td style="font-weight: bold;"  rowspan="<?php echo $CantFC; ?>">FORTALEZAS MENORES</td>
		</tr>
		<?php
			for($i=0; $i<=count($LastAreaFC) - 1; $i++){
				?>
					<tr style="background-color: #4997D0; color: #FFFFFF;">
						<td><?php echo $LastAreaFC[$i]; ?></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<th class="principal" colspan="5">2.2.2. DEBILIDADES DE LA COMPETENCIA</th>
		</tr>
		<tr style="background-color: #C80815; color: #FFFFFF;">
			<td style="font-weight: bold;"  rowspan="<?php echo $CantMDC; ?>">MAYORES DEBILIDADES</td>
		</tr>
		<?php
			for($i=0; $i<=count($LastAreaMDC) - 1; $i++){
				?>
					<tr style="background-color: #C80815; color: #FFFFFF;">
						<td><?php echo $LastAreaMDC[$i]; ?></td>
					</tr>
				<?php
			}
		?>
		<tr style="background-color: #ff4d4d; color: #FFFFFF;">
			<td style="font-weight: bold;"  rowspan="<?php echo $CantDC; ?>">DEBILIDADES MENORES</td>
		</tr>
		<?php
			for($i=0; $i<=count($LastAreaDC) - 1; $i++){
				?>
					<tr style="background-color: #ff4d4d; color: #FFFFFF;">
						<td><?php echo $LastAreaDC[$i]; ?></td>
					</tr>
				<?php
			}
		?>
	</table>
</page>
<page pageset="old">
	<?php
		$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
		$FactoresNegativosDeLaCompetencia = array_merge($ArrayFMIRN,$ArrayFmIRN);
		$Debilidades = array_merge($LastAreaMDC,$LastAreaDC);
		$AreaVulnerable = array();
		$CapacidadDeReaccion = array();
		foreach($FactoresNegativosDeLaCompetencia as $key => $Factor){
			$FactoresNegativosDeLaCompetencia[$key] = $Arreglo[$Factor];
		}
		foreach($FactoresNegativosDeLaCompetencia as $Factor){
			foreach($Debilidades as $Debilidad){
				if($Debilidad == $Factor){
					array_push($AreaVulnerable,$Factor);
				}
			}
		}
		foreach($CapacidadDeReaccionArray as $CReaccion){
			foreach($AreaVulnerable as $AVulnerable){
				if($Arreglo[$CReaccion['pregunta_id']] == $AVulnerable){
					array_push($CapacidadDeReaccion,$AVulnerable);
				}
			}
		}
	?>
	<table class="table OneTDTH">
		<tr>
			<th class="principal">2.3. ÁREAS VULNERABLES DE LA COMPETENCIA</th>
		</tr>
		<?php
			foreach($CapacidadDeReaccion as $CReaccion){
				?>
					<tr>
						<td><?php echo $CReaccion; ?></td>
					</tr>
				<?php
			}
		?>
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
