<?php
    ob_start();

	session_start();

	include("config/conexion.php");
    include_all_php("Classes/");
	$query_panel = mysqli_query($conexion, "SELECT id_solicitud, servicio_id, producto, marca, DATE_FORMAT(wp_tmp_solicitud.fecha_creacion,'%d/%m/%Y %h:%i %p') AS fecha_creacion, post_title FROM wp_tmp_solicitud INNER JOIN wp_posts ON wp_tmp_solicitud.servicio_id = wp_posts.ID INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE usuario_id = '".$_SESSION["tmp_id_user"]."'AND id_solicitud = '".$_SESSION["tmp_id_solicitud"]."' ORDER BY wp_tmp_solicitud.fecha_creacion DESC")or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_panel) > 0){

		$row_panel = mysqli_fetch_assoc($query_panel);

		$id_servicio = $row_panel["servicio_id"];

		$producto = $row_panel["producto"];

		$marca = $row_panel["marca"];

		//$servicio = get_the_title($id_servicio);

		$servicio = $row_panel["post_title"];
	}
    ?>
	<div class="Bar" style="width: 100%; height: 20px; background-color: #333333; margin: 20px 0;"></div>

			<?php
				$BriefingsClass = new Briefings();
				$BriefingsClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$BriefingsClass->usuario_id = $_SESSION["tmp_id_user"];
				
				$CompetenciasDistintivasDeLaCompetenciaClass = new CompetenciasDistintivasDeLaCompetencia();
				$CompetenciasDistintivasDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$CompetenciasDistintivasDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

				$VentajasComparativasClass = new VentajasComparativas();
				$VentajasComparativasClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$VentajasComparativasClass->usuario_id = $_SESSION["tmp_id_user"];

				$FactoresDemograficosClass = new FactoresDemograficos();
				$FactoresDemograficosClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$FactoresDemograficosClass->usuario_id = $_SESSION["tmp_id_user"];

				$FactoresEconomicosClass = new FactoresEconomicos();
				$FactoresEconomicosClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$FactoresEconomicosClass->usuario_id = $_SESSION["tmp_id_user"];

				$FactoresPoliticoLegalesClass = new FactoresPoliticoLegales();
				$FactoresPoliticoLegalesClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$FactoresPoliticoLegalesClass->usuario_id = $_SESSION["tmp_id_user"];

				$FactoresSocialesClass = new FactoresSociales();
				$FactoresSocialesClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$FactoresSocialesClass->usuario_id = $_SESSION["tmp_id_user"];

				$FactoresTecnologicosClass = new FactoresTecnologicos();
				$FactoresTecnologicosClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
				$FactoresTecnologicosClass->usuario_id = $_SESSION["tmp_id_user"];

				$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

				$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport(); //Competencias Distintivas De La Competencia DATA

				$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport(); //Ventajas Comparativas DATA

				$FactoresDemograficosClass->GetDataReport(); //Factores Demograficos DATA

				$FactoresEconomicosClass->GetDataReport(); //Factores Economicos DATA

				$FactoresPoliticoLegalesClass->GetDataReport(); //Factores Politico Legales DATA

				$FactoresSocialesClass->GetDataReport(); //Factores Sociales DATA

				$FactoresTecnologicosClass->GetDataReport(); //Factores Tecnologicos DATA
			?>
			<table class="table">
				<tr>
					<th colspan="2">INFORME EJECUTIVO</th>
				</tr>
				<tr>
					<td>PROYECTO:</td>
					<td>ESQUEMA DEL PRODUCTO: "<?php echo $servicio; ?>" (BIENES)</td>
				</tr>
				<tr>
					<td>CLIENTE:</td>
					<td></td>
				</tr>
				<tr>
					<td>PRODUCTO:</td>
					<td><?php echo $producto; ?></td>
				</tr>
				<tr>
					<td>FECHA DE REALIZACION:</td>
					<td></td>
				</tr>
			</table>

			<?php
				$Arreglo = array();
				$Arreglo = GetVCCDQuestion($_SESSION["tmp_id_solicitud"]);
				$AreaMDC = array();
				$AreaDC = array();
				$AreaMFC = array();
				$AreaFC = array();
				$CantFor = count($VentajasComparativasArray) >= count($CompetenciasDistintivasDeLaCompetenciaArray) ? count($VentajasComparativasArray) : count($CompetenciasDistintivasDeLaCompetenciaArray);
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
				if($_SESSION["tmp_t_producto"] == 1){
					$tproducto = 'bienes';
				} else{
					$tproducto = 'servicios';
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

			<table class="table">
				<tr>
					<th style="background-color: orange; color: #FFFFFF;" colspan="5">2.2. . FORTALEZAS Y DEBILIDADES DE LA COMPETENCIA</th>
				</tr>
				<tr>
					<th style="background-color: blue; color: #FFFFFF;" colspan="5">2.2.1. FORTALEZAS DE LA COMPETENCIA</th>
				</tr>
				<tr>
					<td style="font-weight: bold;" rowspan="<?php echo $CantMFC; ?>">MAYORES FORTALEZAS</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "MAYORES FORTALEZAS" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($LastAreaMFC) - 1; $i++){
						?>
							<tr>
								<td><?php echo $LastAreaMFC[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo $CantFC; ?>">FORTALEZAS MENORES</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "FORTALEZAS MENORES" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($LastAreaFC) - 1; $i++){
						?>
							<tr>
								<td><?php echo $LastAreaFC[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<th style="background-color: red; color: #FFFFFF;" colspan="5">2.2.2. DEBILIDADES DE LA COMPETENCIA</th>
				</tr>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo $CantMDC; ?>">MAYORES DEBILIDADES</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "MAYORES DEBILIDADES" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($LastAreaMDC) - 1; $i++){
						?>
							<tr>
								<td><?php echo $LastAreaMDC[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo $CantDC; ?>">DEBILIDADES MENORES</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "DEBILIDADES MENORES" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($LastAreaDC) - 1; $i++){
						?>
							<tr>
								<td><?php echo $LastAreaDC[$i]; ?></td>
							</tr>
						<?php
					}
				?>
			</table>

			<?php
				$IDCuestionario = "347"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				$ArrayAmenazas = array();
				$ArrayOportunidades = array();
				$ContAmenazas = 0;
				$ContOportnidades = 0;
				if($FactoresDemograficosClass->crecimiento != "3"){
					$Afecta = $FactoresDemograficosClass->creafecta > 6 ? $FactoresDemograficosClass->creafecta - 5 : $FactoresDemograficosClass->creafecta;
					$Aprovecha = $FactoresDemograficosClass->creaprovecha > 6 ? $FactoresDemograficosClass->creaprovecha - 6 : $FactoresDemograficosClass->creaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->crecimiento == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["209"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["209"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->natalidad != "3"){
					$Afecta = $FactoresDemograficosClass->natafecta > 6 ? $FactoresDemograficosClass->natafecta - 5 : $FactoresDemograficosClass->natafecta;
					$Aprovecha = $FactoresDemograficosClass->nataprovecha > 6 ? $FactoresDemograficosClass->nataprovecha - 6 : $FactoresDemograficosClass->nataprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->natalidad == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["210"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["210"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->migracion != "3"){
					$Afecta = $FactoresDemograficosClass->migafecta > 6 ? $FactoresDemograficosClass->migafecta - 5 : $FactoresDemograficosClass->migafecta;
					$Aprovecha = $FactoresDemograficosClass->migaprovecha > 6 ? $FactoresDemograficosClass->migaprovecha - 6 : $FactoresDemograficosClass->migaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->migracion == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["211"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["211"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->preparacion != "3"){
					$Afecta = $FactoresDemograficosClass->preafecta > 6 ? $FactoresDemograficosClass->preafecta - 5 : $FactoresDemograficosClass->preafecta;
					$Aprovecha = $FactoresDemograficosClass->preaprovecha > 6 ? $FactoresDemograficosClass->preaprovecha - 6 : $FactoresDemograficosClass->preaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->preparacion == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["212"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["212"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->diversidad != "3"){
					$Afecta = $FactoresDemograficosClass->divafecta > 6 ? $FactoresDemograficosClass->divafecta - 5 : $FactoresDemograficosClass->divafecta;
					$Aprovecha = $FactoresDemograficosClass->divaprovecha > 6 ? $FactoresDemograficosClass->divaprovecha - 6 : $FactoresDemograficosClass->divaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->diversidad == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["213"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["213"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->het != "3"){
					$Afecta = $FactoresDemograficosClass->hetafecta > 6 ? $FactoresDemograficosClass->hetafecta - 5 : $FactoresDemograficosClass->hetafecta;
					$Aprovecha = $FactoresDemograficosClass->hetaprovecha > 6 ? $FactoresDemograficosClass->hetaprovecha - 6 : $FactoresDemograficosClass->hetaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->het == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["214"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["214"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->pat != "3"){
					$Afecta = $FactoresDemograficosClass->patafecta > 6 ? $FactoresDemograficosClass->patafecta - 5 : $FactoresDemograficosClass->patafecta;
					$Aprovecha = $FactoresDemograficosClass->pataprovecha > 6 ? $FactoresDemograficosClass->pataprovecha - 6 : $FactoresDemograficosClass->pataprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->pat == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["215"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["215"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresDemograficosClass->moda != "3"){
					$Afecta = $FactoresDemograficosClass->modafecta > 6 ? $FactoresDemograficosClass->modafecta - 5 : $FactoresDemograficosClass->modafecta;
					$Aprovecha = $FactoresDemograficosClass->modaprovecha > 6 ? $FactoresDemograficosClass->modaprovecha - 6 : $FactoresDemograficosClass->modaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresDemograficosClass->moda == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["216"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["216"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}
				$CantFilas = $ContAmenazas >= $ContOportnidades ? $ContAmenazas : $ContOportnidades;
			?>

			<?php
				$IDCuestionario = "349"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				/*$ArrayAmenazas = array();
				$ArrayOportunidades = array();
				$ContAmenazas = 0;
				$ContOportnidades = 0;*/
				if($FactoresEconomicosClass->inf != "3"){
					$Afecta = $FactoresEconomicosClass->infafecta > 6 ? $FactoresEconomicosClass->infafecta - 5 : $FactoresEconomicosClass->infafecta;
					$Aprovecha = $FactoresEconomicosClass->infaprovecha > 6 ? $FactoresEconomicosClass->infaprovecha - 6 : $FactoresEconomicosClass->infaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->inf == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["217"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["217"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->pib != "3"){
					$Afecta = $FactoresEconomicosClass->pibafecta > 6 ? $FactoresEconomicosClass->pibafecta - 5 : $FactoresEconomicosClass->pibafecta;
					$Aprovecha = $FactoresEconomicosClass->pibaprovecha > 6 ? $FactoresEconomicosClass->pibaprovecha - 6 : $FactoresEconomicosClass->pibaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->pib == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["218"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["218"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->eip != "3"){
					$Afecta = $FactoresEconomicosClass->eipafecta > 6 ? $FactoresEconomicosClass->eipafecta - 5 : $FactoresEconomicosClass->eipafecta;
					$Aprovecha = $FactoresEconomicosClass->eipaprovecha > 6 ? $FactoresEconomicosClass->eipaprovecha - 6 : $FactoresEconomicosClass->eipaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->eip == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["219"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["219"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->pgp != "3"){
					$Afecta = $FactoresEconomicosClass->pgpafecta > 6 ? $FactoresEconomicosClass->pgpafecta - 5 : $FactoresEconomicosClass->pgpafecta;
					$Aprovecha = $FactoresEconomicosClass->pgpaprovecha > 6 ? $FactoresEconomicosClass->pgpaprovecha - 6 : $FactoresEconomicosClass->pgpaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->pgp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["220"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["220"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->pfi != "3"){
					$Afecta = $FactoresEconomicosClass->pfiafecta > 6 ? $FactoresEconomicosClass->pfiafecta - 5 : $FactoresEconomicosClass->pfiafecta;
					$Aprovecha = $FactoresEconomicosClass->pfiaprovecha > 6 ? $FactoresEconomicosClass->pfiaprovecha - 6 : $FactoresEconomicosClass->pfiaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->pfi == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["221"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["221"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->tip != "3"){
					$Afecta = $FactoresEconomicosClass->tipafecta > 6 ? $FactoresEconomicosClass->tipafecta - 5 : $FactoresEconomicosClass->tipafecta;
					$Aprovecha = $FactoresEconomicosClass->tipaprovecha > 6 ? $FactoresEconomicosClass->tipaprovecha - 6 : $FactoresEconomicosClass->tipaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->tip == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["222"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["222"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->tib != "3"){
					$Afecta = $FactoresEconomicosClass->tibafecta > 6 ? $FactoresEconomicosClass->tibafecta - 5 : $FactoresEconomicosClass->tibafecta;
					$Aprovecha = $FactoresEconomicosClass->tibaprovecha > 6 ? $FactoresEconomicosClass->tibaprovecha - 6 : $FactoresEconomicosClass->tibaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->tib == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["223"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["223"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->tcm != "3"){
					$Afecta = $FactoresEconomicosClass->tcmafecta > 6 ? $FactoresEconomicosClass->tcmafecta - 5 : $FactoresEconomicosClass->tcmafecta;
					$Aprovecha = $FactoresEconomicosClass->tcmaprovecha > 6 ? $FactoresEconomicosClass->tcmaprovecha - 6 : $FactoresEconomicosClass->tcmaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->tcm == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["224"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["224"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->ceco != "3"){
					$Afecta = $FactoresEconomicosClass->cecafecta > 6 ? $FactoresEconomicosClass->cecafecta - 5 : $FactoresEconomicosClass->cecafecta;
					$Aprovecha = $FactoresEconomicosClass->cecaprovecha > 6 ? $FactoresEconomicosClass->cecaprovecha - 6 : $FactoresEconomicosClass->cecaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->ceco == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["225"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["225"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->cdm != "3"){
					$Afecta = $FactoresEconomicosClass->cdmafecta > 6 ? $FactoresEconomicosClass->cdmafecta - 5 : $FactoresEconomicosClass->cdmafecta;
					$Aprovecha = $FactoresEconomicosClass->cdmaprovecha > 6 ? $FactoresEconomicosClass->cdmaprovecha - 6 : $FactoresEconomicosClass->cdmaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->cdm == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["226"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["226"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->cod != "3"){
					$Afecta = $FactoresEconomicosClass->codafecta > 6 ? $FactoresEconomicosClass->codafecta - 5 : $FactoresEconomicosClass->codafecta;
					$Aprovecha = $FactoresEconomicosClass->codaprovecha > 6 ? $FactoresEconomicosClass->codaprovecha - 6 : $FactoresEconomicosClass->codaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->cod == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["227"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["227"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->dmp != "3"){
					$Afecta = $FactoresEconomicosClass->dmpafecta > 6 ? $FactoresEconomicosClass->dmpafecta - 5 : $FactoresEconomicosClass->dmpafecta;
					$Aprovecha = $FactoresEconomicosClass->dmpaprovecha > 6 ? $FactoresEconomicosClass->dmpaprovecha - 6 : $FactoresEconomicosClass->dmpaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->dmp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["228"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["228"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->adc != "3"){
					$Afecta = $FactoresEconomicosClass->adcafecta > 6 ? $FactoresEconomicosClass->adcafecta - 5 : $FactoresEconomicosClass->adcafecta;
					$Aprovecha = $FactoresEconomicosClass->adcaprovecha > 6 ? $FactoresEconomicosClass->adcaprovecha - 6 : $FactoresEconomicosClass->adcaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->adc == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["229"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["229"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->rdc != "3"){
					$Afecta = $FactoresEconomicosClass->rdcafecta > 6 ? $FactoresEconomicosClass->rdcafecta - 5 : $FactoresEconomicosClass->rdcafecta;
					$Aprovecha = $FactoresEconomicosClass->rdcaprovecha > 6 ? $FactoresEconomicosClass->rdcaprovecha - 6 : $FactoresEconomicosClass->rdcaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->rdc == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["230"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["230"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->edo != "3"){
					$Afecta = $FactoresEconomicosClass->edoafecta > 6 ? $FactoresEconomicosClass->edoafecta - 5 : $FactoresEconomicosClass->edoafecta;
					$Aprovecha = $FactoresEconomicosClass->edoaprovecha > 6 ? $FactoresEconomicosClass->edoaprovecha - 6 : $FactoresEconomicosClass->edoaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->edo == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["231"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["231"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresEconomicosClass->cdo != "3"){
					$Afecta = $FactoresEconomicosClass->cdoafecta > 6 ? $FactoresEconomicosClass->cdoafecta - 5 : $FactoresEconomicosClass->cdoafecta;
					$Aprovecha = $FactoresEconomicosClass->cdoaprovecha > 6 ? $FactoresEconomicosClass->cdoaprovecha - 6 : $FactoresEconomicosClass->cdoaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresEconomicosClass->cdo == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["232"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["232"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}
				$CantFilas = $ContAmenazas >= $ContOportnidades ? $ContAmenazas : $ContOportnidades;
			?>

			<?php
				$IDCuestionario = "352"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				/*$ArrayAmenazas = array();
				$ArrayOportunidades = array();
				$ContAmenazas = 0;
				$ContOportnidades = 0;*/
				if($FactoresPoliticoLegalesClass->iap != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->iapafecta > 6 ? $FactoresPoliticoLegalesClass->iapafecta - 5 : $FactoresPoliticoLegalesClass->iapafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->iapaprovecha > 6 ? $FactoresPoliticoLegalesClass->iapaprovecha - 6 : $FactoresPoliticoLegalesClass->iapaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->iap == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["233"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["233"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->ppd != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->ppdafecta > 6 ? $FactoresPoliticoLegalesClass->ppdafecta - 5 : $FactoresPoliticoLegalesClass->ppdafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->nataprovecha > 6 ? $FactoresPoliticoLegalesClass->nataprovecha - 6 : $FactoresPoliticoLegalesClass->nataprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->ppd == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["234"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["234"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->idp != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->idpafecta > 6 ? $FactoresPoliticoLegalesClass->idpafecta - 5 : $FactoresPoliticoLegalesClass->idpafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->idpaprovecha > 6 ? $FactoresPoliticoLegalesClass->idpaprovecha - 6 : $FactoresPoliticoLegalesClass->idpaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->idp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["235"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["235"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->esp != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->espafecta > 6 ? $FactoresPoliticoLegalesClass->espafecta - 5 : $FactoresPoliticoLegalesClass->espafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->espaprovecha > 6 ? $FactoresPoliticoLegalesClass->espaprovecha - 6 : $FactoresPoliticoLegalesClass->espaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->esp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["236"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["236"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->con != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->conafecta > 6 ? $FactoresPoliticoLegalesClass->conafecta - 5 : $FactoresPoliticoLegalesClass->conafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->conaprovecha > 6 ? $FactoresPoliticoLegalesClass->conaprovecha - 6 : $FactoresPoliticoLegalesClass->conaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->con == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["237"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["237"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->lgl != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->lglafecta > 6 ? $FactoresPoliticoLegalesClass->lglafecta - 5 : $FactoresPoliticoLegalesClass->lglafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->lglaprovecha > 6 ? $FactoresPoliticoLegalesClass->lglaprovecha - 6 : $FactoresPoliticoLegalesClass->lglaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->lgl == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["238"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["238"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresPoliticoLegalesClass->lgm != "3"){
					$Afecta = $FactoresPoliticoLegalesClass->lgmafecta > 6 ? $FactoresPoliticoLegalesClass->lgmafecta - 5 : $FactoresPoliticoLegalesClass->lgmafecta;
					$Aprovecha = $FactoresPoliticoLegalesClass->lgmaprovecha > 6 ? $FactoresPoliticoLegalesClass->lgmaprovecha - 6 : $FactoresPoliticoLegalesClass->lgmaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresPoliticoLegalesClass->lgm == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["239"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["239"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}
				$CantFilas = $ContAmenazas >= $ContOportnidades ? $ContAmenazas : $ContOportnidades;
			?>

			<?php
				$IDCuestionario = "354"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				/*$ArrayAmenazas = array();
				$ArrayOportunidades = array();
				$ContAmenazas = 0;
				$ContOportnidades = 0;*/
				if(($FactoresSocialesClass->itd != "3") && ($FactoresSocialesClass->itd != "4")){
					$Afecta = $FactoresSocialesClass->itdafecta > 6 ? $FactoresSocialesClass->itdafecta - 5 : $FactoresSocialesClass->itdafecta;
					$Aprovecha = $FactoresSocialesClass->itdaprovecha > 6 ? $FactoresSocialesClass->itdaprovecha - 6 : $FactoresSocialesClass->itdaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->itd == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["240"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["240"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->itp != "3") && ($FactoresSocialesClass->itp != "4")){
					$Afecta = $FactoresSocialesClass->itpafecta > 6 ? $FactoresSocialesClass->itpafecta - 5 : $FactoresSocialesClass->itpafecta;
					$Aprovecha = $FactoresSocialesClass->nataprovecha > 6 ? $FactoresSocialesClass->nataprovecha - 6 : $FactoresSocialesClass->nataprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->itp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["241"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["241"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->vsm != "3") && ($FactoresSocialesClass->vsm != "4")){
					$Afecta = $FactoresSocialesClass->vsmafecta > 6 ? $FactoresSocialesClass->vsmafecta - 5 : $FactoresSocialesClass->vsmafecta;
					$Aprovecha = $FactoresSocialesClass->vsmaprovecha > 6 ? $FactoresSocialesClass->vsmaprovecha - 6 : $FactoresSocialesClass->vsmaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->vsm == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["242"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["242"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->cvh != "3") && ($FactoresSocialesClass->cvh != "4")){
					$Afecta = $FactoresSocialesClass->cvhafecta > 6 ? $FactoresSocialesClass->cvhafecta - 5 : $FactoresSocialesClass->cvhafecta;
					$Aprovecha = $FactoresSocialesClass->cvhaprovecha > 6 ? $FactoresSocialesClass->cvhaprovecha - 6 : $FactoresSocialesClass->cvhaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->cvh == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["243"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["243"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->isp != "3") && ($FactoresSocialesClass->isp != "4")){
					$Afecta = $FactoresSocialesClass->ispafecta > 6 ? $FactoresSocialesClass->ispafecta - 5 : $FactoresSocialesClass->ispafecta;
					$Aprovecha = $FactoresSocialesClass->ispaprovecha > 6 ? $FactoresSocialesClass->ispaprovecha - 6 : $FactoresSocialesClass->ispaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->isp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["244"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["244"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->icp != "3") && ($FactoresSocialesClass->icp != "4")){
					$Afecta = $FactoresSocialesClass->icpafecta > 6 ? $FactoresSocialesClass->icpafecta - 5 : $FactoresSocialesClass->icpafecta;
					$Aprovecha = $FactoresSocialesClass->icpaprovecha > 6 ? $FactoresSocialesClass->icpaprovecha - 6 : $FactoresSocialesClass->icpaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->icp == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["245"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["245"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if(($FactoresSocialesClass->ita != "3") && ($FactoresSocialesClass->ita != "4")){
					$Afecta = $FactoresSocialesClass->itaafecta > 6 ? $FactoresSocialesClass->itaafecta - 5 : $FactoresSocialesClass->itaafecta;
					$Aprovecha = $FactoresSocialesClass->itaaprovecha > 6 ? $FactoresSocialesClass->itaaprovecha - 6 : $FactoresSocialesClass->itaaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresSocialesClass->ita == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["246"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["246"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				$CantFilas = $ContAmenazas >= $ContOportnidades ? $ContAmenazas : $ContOportnidades;
			?>

			<?php
				$IDCuestionario = "376"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				/*$ArrayAmenazas = array();
				$ArrayOportunidades = array();
				$ContAmenazas = 0;
				$ContOportnidades = 0;*/
				if($FactoresTecnologicosClass->nmat != "3"){
					$Afecta = $FactoresTecnologicosClass->nmatafecta > 6 ? $FactoresTecnologicosClass->nmatafecta - 5 : $FactoresTecnologicosClass->nmatafecta;
					$Aprovecha = $FactoresTecnologicosClass->nmataprovecha > 6 ? $FactoresTecnologicosClass->nmataprovecha - 6 : $FactoresTecnologicosClass->nmataprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->nmat == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["247"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["247"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresTecnologicosClass->npro != "3"){
					$Afecta = $FactoresTecnologicosClass->nproafecta > 6 ? $FactoresTecnologicosClass->nproafecta - 5 : $FactoresTecnologicosClass->nproafecta;
					$Aprovecha = $FactoresTecnologicosClass->nproaprovecha > 6 ? $FactoresTecnologicosClass->nproaprovecha - 6 : $FactoresTecnologicosClass->nproaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->npro == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["248"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["248"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresTecnologicosClass->nmed != "3"){
					$Afecta = $FactoresTecnologicosClass->nmedafecta > 6 ? $FactoresTecnologicosClass->nmedafecta - 5 : $FactoresTecnologicosClass->nmedafecta;
					$Aprovecha = $FactoresTecnologicosClass->nmedaprovecha > 6 ? $FactoresTecnologicosClass->nmedaprovecha - 6 : $FactoresTecnologicosClass->nmedaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->nmed == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["249"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["249"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresTecnologicosClass->ntec != "3"){
					$Afecta = $FactoresTecnologicosClass->ntecafecta > 6 ? $FactoresTecnologicosClass->ntecafecta - 5 : $FactoresTecnologicosClass->ntecafecta;
					$Aprovecha = $FactoresTecnologicosClass->ntecaprovecha > 6 ? $FactoresTecnologicosClass->ntecaprovecha - 6 : $FactoresTecnologicosClass->ntecaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->ntec == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["250"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["250"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresTecnologicosClass->ainf != "3"){
					$Afecta = $FactoresTecnologicosClass->ainfafecta > 6 ? $FactoresTecnologicosClass->ainfafecta - 5 : $FactoresTecnologicosClass->ainfafecta;
					$Aprovecha = $FactoresTecnologicosClass->ainfaprovecha > 6 ? $FactoresTecnologicosClass->ainfaprovecha - 6 : $FactoresTecnologicosClass->ainfaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->ainf == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["251"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["251"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				if($FactoresTecnologicosClass->ecie != "3"){
					$Afecta = $FactoresTecnologicosClass->ecieafecta > 6 ? $FactoresTecnologicosClass->ecieafecta - 5 : $FactoresTecnologicosClass->ecieafecta;
					$Aprovecha = $FactoresTecnologicosClass->ecieaprovecha > 6 ? $FactoresTecnologicosClass->ecieaprovecha - 6 : $FactoresTecnologicosClass->ecieaprovecha;
					$Valor = $Afecta * $Aprovecha;
					if($FactoresTecnologicosClass->ecie == "1"){
						$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["252"];
						$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
						$ContAmenazas++;
					}else{
						$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["252"];
						$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
						$ContOportnidades++;
					}
				}

				$CantFilas = $ContAmenazas >= $ContOportnidades ? $ContAmenazas : $ContOportnidades;
			?>

			<?php
				$ArrayMayoresOportunidades = array();
				$ArrayOportunidadesPromedio = array();
				$ArrayMayoresAmenazas = array();
				$ArrayAmenazasPromedio = array();
				$ArrayOportunidades = array_sort($ArrayOportunidades, 'Valor', SORT_DESC);
				$ArrayAmenazas = array_sort($ArrayAmenazas, 'Valor', SORT_ASC);
				foreach($ArrayOportunidades as $Oportunidad){
					if(intval($Oportunidad["Valor"]) >= 16){
						array_push($ArrayMayoresOportunidades,$Oportunidad['Texto']);
					}else{
						if((intval($Oportunidad["Valor"]) >= 10) && (intval($Oportunidad["Valor"]) >= 15)){
							array_push($ArrayOportunidadesPromedio,$Oportunidad['Texto']);
						}
					}
				}
				foreach($ArrayAmenazas as $Amenaza){
					if((intval($Amenaza["Valor"]) >= 0) && (intval($Amenaza["Valor"]) >= 10)){
						array_push($ArrayMayoresAmenazas,$Amenaza['Texto']);
					}else{
						if((intval($Amenaza["Valor"]) >= 11) && (intval($Amenaza["Valor"]) >= 19)){
							array_push($ArrayAmenazasPromedio,$Amenaza['Texto']);
						}
					}
				}
			?>

			<table class="table">
				<tr>
					<th style="background-color: orange; color: #FFFFFF;" colspan="5">2. DIAGNOSTICO EXTERNO DEL PRODUCTO</th>
				</tr>
				<tr>
					<th style="background-color: blue; color: #FFFFFF;" colspan="5">2.1. OPORTUNIDADES DEL PRODUCTO</th>
				</tr>
				<tr>
					<td style="font-weight: bold;" rowspan="<?php echo count($ArrayMayoresOportunidades) + 1; ?>">MAYORES OPORTUNIDADES DEL PRODUCTO</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "MAYORES OPORTUNIDADES" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($ArrayMayoresOportunidades) - 1; $i++){
						?>
							<tr>
								<td><?php echo $ArrayMayoresOportunidades[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo count($ArrayOportunidadesPromedio) + 1; ?>">OPORTUNIDADES PROMEDIO</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "OPORTUNIDADES PROMEDIO" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($ArrayOportunidadesPromedio) - 1; $i++){
						?>
							<tr>
								<td><?php echo $ArrayOportunidadesPromedio[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<th style="background-color: red; color: #FFFFFF;" colspan="5">2.2. AMENAZAS DEL PRODUCTO</th>
				</tr>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo count($ArrayMayoresAmenazas) + 1; ?>">MAYORES AMENAZAS DEL PRODUCTO</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "MAYORES AMENAZAS" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($ArrayMayoresAmenazas) - 1; $i++){
						?>
							<tr>
								<td><?php echo $ArrayMayoresAmenazas[$i]; ?></td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td style="font-weight: bold;"  rowspan="<?php echo count($ArrayAmenazasPromedio) + 1; ?>">AMENAZAS PROMEDIO</td>
					<td style="font-weight: bold;" >Mención de los ítems que aparecen en el cuadrante "AMENAZAS PROMEDIO" en la pestana anterior</td>
				</tr>
				<?php
					for($i=0; $i<=count($ArrayAmenazasPromedio) - 1; $i++){
						?>
							<tr>
								<td><?php echo $ArrayAmenazasPromedio[$i]; ?></td>
							</tr>
						<?php
					}
				?>
			</table>
<style>
	.table{
		background-color: #cfcfcf;
		margin: 30px auto;
		padding: 20px 10px;
		width: 80%;
		display: block;
	}
		.table tr{
			width: 100%;
		}
			.table tr td{
				border: 1px solid #FFFFFF;
				text-align: left;
			}
	.headerReport{
		width: 100%;
		padding: 10px 0;
		text-align: center;
		background-color: blue;
		color: #FFFFFF;
	}
</style>