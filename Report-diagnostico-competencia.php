<?php /* Template Name: Report Diagnostico de la Competencia */
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
	
	$PerfilGeograficoClass = new PerfilGeografico();
	$PerfilGeograficoClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilGeograficoClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilDemograficoIndividualClass = new PerfilDemograficoIndividual();
	$PerfilDemograficoIndividualClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilDemograficoIndividualClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilDemograficoOrganizacionalClass = new PerfilDemograficoOrganizacional();
	$PerfilDemograficoOrganizacionalClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilDemograficoOrganizacionalClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilPsicologicoIndividualClass = new PerfilPsicologicoIndividual();
	$PerfilPsicologicoIndividualClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilPsicologicoIndividualClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilPsicologicoOrganizacionalClass = new PerfilPsicologicoOrganizacional();
	$PerfilPsicologicoOrganizacionalClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilPsicologicoOrganizacionalClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilSocioCulturalIndividualClass = new PerfilSocioCulturalIndividual();
	$PerfilSocioCulturalIndividualClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilSocioCulturalIndividualClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilSocioCulturalOrganizacionalClass = new PerfilSocioCulturalOrganizacional();
	$PerfilSocioCulturalOrganizacionalClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilSocioCulturalOrganizacionalClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilConductualIndividualClass = new PerfilConductualIndividual();
	$PerfilConductualIndividualClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilConductualIndividualClass->usuario_id = $_SESSION["tmp_id_user"];

	$PerfilConductualOrganizacionalClass = new PerfilConductualOrganizacional();
	$PerfilConductualOrganizacionalClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$PerfilConductualOrganizacionalClass->usuario_id = $_SESSION["tmp_id_user"];

	$IdentificacionDeLaCompetenciaClass = new IdentificacionDeLaCompetencia();
	$IdentificacionDeLaCompetenciaClass->solicitud_id = $_SESSION["tmp_id_solicitud"];
	$IdentificacionDeLaCompetenciaClass->usuario_id = $_SESSION["tmp_id_user"];

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

	$ServicioClass->GetDataReport();
	
	$SolicitudClass->GetDataReport();

	$BriefingsClass->GetDataReport(); //BRIEFINGS DATA

	$PerfilGeograficoClass->GetDataReport(); // PERFIL GEOGRAFICO DATA

	$PerfilDemograficoIndividualClass->GetDataReport(); //PERFIL DEMOGRAFICO INDIVIDUAL DATA

	$PerfilDemograficoOrganizacionalClass->GetDataReport();

	$PerfilPsicologicoIndividualClass->GetDataReport(); //PERFIL PSICOLOGICO INDIVIDUAL DATA
	
	$PerfilPsicologicoOrganizacionalClass->GetDataReport();

	$PerfilSocioCulturalIndividualClass->GetDataReport(); //PERFIL SOCIO CULTURAL INDIVIDUAL DATA

	$PerfilSocioCulturalOrganizacionalClass->GetDataReport();

	$PerfilConductualIndividualClass->GetDataReport(); //Perfil Conductual Individual DATA

	$PerfilConductualOrganizacionalClass->GetDataReport();
	
	$IdentificacionDeLaCompetenciaClass->GetDataReport();
	
	$CompetenciasDistintivasDeLaCompetenciaArray = $CompetenciasDistintivasDeLaCompetenciaClass->GetDataReport(); //Competencias Distintivas De La Competencia DATA

	$VentajasComparativasArray = $VentajasComparativasClass->GetDataReport(); //Ventajas Comparativas DATA

	$FactoresDemograficosClass->GetDataReport(); //Factores Demograficos DATA

	$FactoresEconomicosClass->GetDataReport(); //Factores Economicos DATA

	$FactoresPoliticoLegalesClass->GetDataReport(); //Factores Politico Legales DATA

	$FactoresSocialesClass->GetDataReport(); //Factores Sociales DATA

	$FactoresTecnologicosClass->GetDataReport(); //Factores Tecnologicos DATA

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
			$IDCuestionario = "227";
			$Arreglo = array();
			$Arreglo = GetQuestionAnswers($IDCuestionario);
		?>
		<table class="table">
			<tr>
			<th colspan="5">1. Perfil geográfico</th>
		</tr>
		<tr>
			<td <?php if($PerfilGeograficoClass->clima <= 2) echo 'class="cols5"'; ?>>Tipo de Zona:</td>
			<td <?php if($PerfilGeograficoClass->clima <= 2) echo 'colspan="4" class="cols4a"'; ?>><?php echo $Arreglo["170_".$PerfilGeograficoClass->zona]; ?></td>
		</tr>
		<tr>
			<td <?php if($PerfilGeograficoClass->clima <= 2) echo 'class="cols5"'; ?>>Tipo de clima de la zona</td>
			<td <?php if($PerfilGeograficoClass->clima <= 2) echo 'colspan="4" class="cols4a"'; ?>><?php echo $Arreglo["171_".$PerfilGeograficoClass->zona]; ?></td>
		</tr>
		<?php
			if($PerfilGeograficoClass->clima <= 2){
				?>
					<tr>
						<td colspan="4" class="cols4a">Influencia climática sobre el consumo</td>
					</tr>
				<?php
			}
		?>
			<?php
				if($PerfilGeograficoClass->clima == 1){
			?>
			<tr>
				<td class="cols5">Cuatro estaciones</td>
				<td class="cols5">Aumenta el consumo</td>
				<td class="cols5">se mantiene consumo standard</td>
				<td class="cols5">Disminuye el consumo</td>
				<td class="cols5">No sabe</td>
			</tr>
			<tr>
				<td class="cols5">Primavera</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp1){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<tr>
				<td class="cols5">Verano</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp2){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<tr>
				<td class="cols5">Otoño</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp3){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<tr>
				<td class="cols5">Invierno</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp4){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<?php
				}
			?>
			<?php
				if($PerfilGeograficoClass->clima == 2){
			?>
			<tr>
				<td class="cols5">Dos estaciones: lluvias y sequias</td>
				<td class="cols5">Aumenta el consumo</td>
				<td class="cols5">se mantiene consumo standard</td>
				<td class="cols5">Disminuye el consumo</td>
				<td class="cols5">No sabe</td>
			</tr>
			<tr>
				<td class="cols5">Lluvias</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp1){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<tr>
				<td class="cols5">Sequias</td>
				<?php
					for($i=1; $i<=4; $i++){
						if($i == $PerfilGeograficoClass->temp2){
							echo "<td class='cols5'>O</td>";
						}else{
							echo "<td class='cols5'></td>";
						}
					}
				?>
			</tr>
			<?php
				}
			?>
		</table>
	</page>
	<?php
		if($_SESSION["tmp_t_consumidor"] == "1"){
	?>
		<page pageset="old">
			<?php
				$IDCuestionario = "214"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
			?>
			<table class="table">
				<tr>
					<th colspan="2">2. Perfil demográfico</th>
				</tr>
				<tr>
					<td>EDAD</td>
					<td><?php echo $Arreglo["173_".$PerfilDemograficoIndividualClass->edad]; ?></td>
				</tr>
				<tr>
					<td>GENERO</td>
					<td><?php echo $Arreglo["174_".$PerfilDemograficoIndividualClass->genero]; ?></td>
				</tr>
				<tr>
					<td>ESTADO CIVIL</td>
					<td><?php if($PerfilDemograficoIndividualClass->ecivil != "7" ){ echo $Arreglo["175_".$PerfilDemograficoIndividualClass->ecivil]; }else{ echo $PerfilDemograficoIndividualClass->otroecivil; } ?></td>
				</tr>
				<tr>
					<td>INGRESO MENSUAL</td>
					<td><?php echo $Arreglo["176_".$PerfilDemograficoIndividualClass->imensual]; ?></td>
				</tr>
				<tr>
					<td>GRADO DE INSTRUCCION</td>
					<td><?php if($PerfilDemograficoIndividualClass->ginstruccion != "7" ){ echo $Arreglo["177_".$PerfilDemograficoIndividualClass->ginstruccion]; }else{ echo $PerfilDemograficoIndividualClass->otrogi; } ?></td>
				</tr>
				<tr>
					<td>OCUPACION</td>
					<td><?php if($PerfilDemograficoIndividualClass->ocupacion != "10" ){ echo $Arreglo["178_".$PerfilDemograficoIndividualClass->ocupacion]; }else{ echo $PerfilDemograficoIndividualClass->otraocupacion; } ?></td>
				</tr>
				<tr>
					<td>CICLO DE VIDA FAMILIAR</td>
					<td><?php if($PerfilDemograficoIndividualClass->cdvida != "9" ){ echo $Arreglo["179_".$PerfilDemograficoIndividualClass->cdvida]; }else{ echo $PerfilDemograficoIndividualClass->otraciclo; } ?></td>
				</tr>
				<tr>
					<td>TAMAÑO DE LA FAMILIA</td>
					<td><?php echo $Arreglo["180_".$PerfilDemograficoIndividualClass->nfamiliar]; ?></td>
				</tr>
			</table>
		</page>
		<page pageset="old">
			<?php
				$IDCuestionario = "231"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				$ArrayActividades = explode(",",$PerfilPsicologicoIndividualClass->actividades);
				$ArrayIntereses = explode(",",$PerfilPsicologicoIndividualClass->intereses);
				$CantFilas = 0;
				$CountActividades = count($ArrayActividades);
				$CountIntereses = count($ArrayIntereses);
				if($CountActividades >= $CountIntereses){
					$CantFilas = $CountActividades;
				}else{
					$CantFilas = $CountIntereses;
				}
				$CantFilas++;
			?>
			<table class="table">
				<tr>
					<th colspan="3">3. Perfil Psicológico</th>
				</tr>
				<tr>
					<td class="cols3">NECESIDAD</td>
					<td colspan="2"><?php echo $Arreglo["181_".$PerfilPsicologicoIndividualClass->necesidad]; ?></td>
				</tr>
				<tr>
					<td class="cols3">MOTIVACIÓN</td>
					<td colspan="2"><?php if($PerfilPsicologicoIndividualClass->motivacion != "6" ){ echo $Arreglo["182_".$PerfilPsicologicoIndividualClass->motivacion]; }else{ echo $PerfilPsicologicoIndividualClass->otramotivacion; } ?></td>
				</tr>
				<tr>
					<td class="cols3">ACTITUD</td>
					<td colspan="2"><?php if($PerfilPsicologicoIndividualClass->actitud != "6" ){ echo $Arreglo["183_".$PerfilPsicologicoIndividualClass->actitud]; }else{ echo $PerfilPsicologicoIndividualClass->otraactitud; } ?></td>
				</tr>
				<tr>
					<td colspan="3" class="principal">3.1. Personalidad corporativa</td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo1]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo2]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo3]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo4]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo3]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo6]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo7]; ?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $Arreglo["184_".$PerfilPsicologicoIndividualClass->rasgo8]; ?></td>
				</tr>
				<tr>
					<td style='width: 100px !important; color: #f68d1d;' rowspan="<?php echo $CantFilas;?>">
						Estilo de Vida
					</td>
					<td class='cols3 principal'>Actividades</td>
					<td class='cols3 principal'>Intereses</td>
				</tr>
				<?php
					
					for($i=0;$i<=$CantFilas - 2; $i++){
						$Actividad = "";
						$Interes = "";
						if(isset($ArrayActividades[$i])){
							$Actividad = $Arreglo["185_".$ArrayActividades[$i]];
						}
						if(isset($ArrayIntereses[$i])){
							$Interes = $Arreglo["186_".$ArrayIntereses[$i]];
						}
						echo "<tr>";
						echo "<td class='cols3'>".$Actividad."</td>";
						echo "<td class='cols3'>".$Interes."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</page>
		<page pageset="old">
			<?php
				$IDCuestionario = "233"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
				$ArrayCulturales = explode(",",$PerfilSocioCulturalIndividualClass->fculturales);
				$ArraySubCulturales = explode(",",$PerfilSocioCulturalIndividualClass->fsubculturales);
				$ArrayReferencia = explode(",",$PerfilSocioCulturalIndividualClass->greferencia);
				$ArrayPertenencia = explode(",",$PerfilSocioCulturalIndividualClass->gpertenencia);
			?>
			<table class="table OneTDTH">
				<tr>
					<th>4. Perfil Sociocultural</th>
				</tr>
				<tr>
					<td class="principal">Factores Culturales de ALTA INFLUENCIA sobre el consumidor</td>
				</tr>
				<?php
					foreach($ArrayCulturales as $Cultural){
						echo "<tr>";
						echo "<td>".$Arreglo["187_".$Cultural]."</td>";
						echo "</tr>";
					}
				?>
				<tr>
					<td class="principal">Factores Subculturales de ALTA INFLUENCIA sobre el consumidor</td>
				</tr>
				<?php
					foreach($ArraySubCulturales as $SubCultural){
						echo "<tr>";
						echo "<td>".$Arreglo["188_".$SubCultural]."</td>";
						echo "</tr>";
					}
				?>
				<tr>
					<td class="principal">Grupos de Referencia de ALTA INFLUENCIA sobre el consumidor</td>
				</tr>
				<?php
					foreach($ArrayReferencia as $Referencia){
						echo "<tr>";
						echo "<td>".$Arreglo["189_".$Referencia]."</td>";
						echo "</tr>";
					}
				?>
				<tr>
					<td class="principal">Grupos de Pertenencia de ALTA INFLUENCIA sobre el consumidor</td>
				</tr>
				<?php
					foreach($ArrayPertenencia as $Pertenencia){
						echo "<tr>";
						echo "<td>".$Arreglo["190_".$Pertenencia]."</td>";
						echo "</tr>";
					}
				?>
				<tr>
					<td class="principal">Grupos de Pertenencia de ALTA INFLUENCIA sobre el consumidor</td>
				</tr>
				<tr>
					<td><?php echo $Arreglo["191_".$PerfilSocioCulturalIndividualClass->csocial] ; ?></td>
				</tr>
			</table>
		</page>
		<page pageset="old">
			<?php
				$IDCuestionario = "239"; // POR EJEMPLO...
				$Arreglo = array();
				$Arreglo = GetQuestionAnswers($IDCuestionario);
			?>
			<table class="table">
				<tr>
					<th colspan="4">5. Perfil Conductual</th>
				</tr>
				<tr>
					<td class="cols4reality principal">Frecuencia de compra</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["192_".$PerfilConductualIndividualClass->frecuenciacompra]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->frecuenciacompra != "9" ){ echo $Arreglo["192_".$PerfilConductualIndividualClass->frecuenciacompra]; }else{ echo $PerfilConductualIndividualClass->otrafcompra; } ?></td>
					<td class="cols4reality principal">Frecuencia de uso</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["202_".$PerfilConductualIndividualClass->frecuenciauso]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->frecuenciauso != "9" ){ echo $Arreglo["202_".$PerfilConductualIndividualClass->frecuenciauso]; }else{ echo $PerfilConductualIndividualClass->otrafuso; } ?></td>
				</tr>
				<tr>
					<td class="cols4reality principal">Lugar de compra</td>
					<td class="cols4reality"><?php echo $Arreglo["203_".$PerfilConductualIndividualClass->lugar]; ?></td>
					<td class="cols4reality principal">Numero de Unidades x compra</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["204_".$PerfilConductualIndividualClass->unidades]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->unidades != "8" ){ echo $Arreglo["204_".$PerfilConductualIndividualClass->unidades]; }else{ echo $PerfilConductualIndividualClass->otrasunidades; } ?></td>
				</tr>
				<tr>
					<td class="cols4reality principal">Rol: influyente</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["205_".$PerfilConductualIndividualClass->influye]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->influye != "8" ){ echo $Arreglo["205_".$PerfilConductualIndividualClass->influye]; }else{ echo $PerfilConductualIndividualClass->otroinfluye; } ?></td>
					<td class="cols4reality principal">Rol: comprador</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["206_".$PerfilConductualIndividualClass->compra]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->compra != "8" ){ echo $Arreglo["206_".$PerfilConductualIndividualClass->compra]; }else{ echo $PerfilConductualIndividualClass->otrocompra; } ?></td>
				</tr>
				<tr>
					<td class="cols4reality principal">Rol: usuario</td>
					<!--<td class="cols4reality"><?php echo $Arreglo["207_".$PerfilConductualIndividualClass->usa]; ?></td>-->
					<td class="cols4reality"><?php if($PerfilConductualIndividualClass->usa != "8" ){ echo $Arreglo["207_".$PerfilConductualIndividualClass->usa]; }else{ echo $PerfilConductualIndividualClass->otrousa; } ?></td>
					<td class="cols4reality principal">Fidelidad</td>
					<td class="cols4reality"><?php echo $Arreglo["208_".$PerfilConductualIndividualClass->fidelidad]; ?></td>
				</tr>
			</table>
			<table class="table">
				<tr style="background-color: orange; color: #FFFFFF;">
					<td class="cols3">Temporadas de INFLUENCIA sobre el consumo</td>
					<td class="cols3">Comportamiento de consumo</td>
					<td class="cols3">% Variación del consumo</td>
				</tr>
				<?php
					if($PerfilConductualIndividualClass->vacescolares != 4){
						?>
						<tr>
							<td class="cols3">Vacaciones escolares</td>
							<td class="cols3"><?php echo $Arreglo["193_".$PerfilConductualIndividualClass->vacescolares]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvaces; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vacinvierno != 4){
						?>
						<tr>
							<td class="cols3">Vacaciones de verano</td>
							<td class="cols3"><?php echo $Arreglo["194_".$PerfilConductualIndividualClass->vacinvierno]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacna; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vachalloween != 4){
						?>
						<tr>
							<td class="cols3">Halloween</td>
							<td class="cols3"><?php echo $Arreglo["195_".$PerfilConductualIndividualClass->vachalloween]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacha; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vacfinano != 4){
						?>
						<tr>
							<td class="cols3">Fiestas de fin de año</td>
							<td class="cols3"><?php echo $Arreglo["196_".$PerfilConductualIndividualClass->vacfinano]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacfa; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vaccarnaval != 4){
						?>
						<tr>
							<td class="cols3">Carnaval</td>
							<td class="cols3"><?php echo $Arreglo["197_".$PerfilConductualIndividualClass->vaccarnaval]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacca; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vacacciongracias != 4){
						?>
						<tr>
							<td class="cols3">Dia de Acción de gracias</td>
							<td class="cols3"><?php echo $Arreglo["198_".$PerfilConductualIndividualClass->vacacciongracias]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacag; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->tdeportiva != 4){
						?>
						<tr>
							<td class="cols3">Temporada deportiva (futbol, basket, beisbol, hockey, etc)</td>
							<td class="cols3"><?php echo $Arreglo["199_".$PerfilConductualIndividualClass->tdeportiva]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->ptdep; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vacindependencia != 4){
						?>
						<tr>
							<td class="cols3">Fiestas por Independencia</td>
							<td class="cols3"><?php echo $Arreglo["200_".$PerfilConductualIndividualClass->vacindependencia]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvacin; ?>%</td>
						</tr>
						<?php
					}
					if($PerfilConductualIndividualClass->vacescolares != 4){
						?>
						<tr>
							<td class="cols3">Vacaciones escolares</td>
							<td class="cols3"><?php echo $Arreglo["201_".$PerfilConductualIndividualClass->vacescolares]; ?></td>
							<td class="cols3"><?php echo $PerfilConductualIndividualClass->pvaces; ?>%</td>
						</tr>
						<?php
					}
				?>
			</table>
		</page>
	<?php
		}
		if($_SESSION["tmp_t_consumidor"] == "2"){
	?>
		<page pageset="old">			
		<?php
			$IDCuestionario = "448"; // POR EJEMPLO...
			$Arreglo = array();
			$Arreglo = GetQuestionAnswers($IDCuestionario);
		?>
		<table class="table OneTDTH">
			<tr>
				<th>2. Perfil demográfico</th>
			</tr>
			<tr>
				<td class="principal">2.1. Sector al que se dedican</td>
			</tr>
			<tr><td><?php echo $Arreglo["253_".$PerfilDemograficoOrganizacionalClass->sector]; ?></td></tr>
			<tr>
				<td class="principal">2.2. Tamaño de la empresa - cliente</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["254_".$PerfilDemograficoOrganizacionalClass->tamano]; ?></td>
			</tr>
			<tr>
				<td class="principal">2.3. Antigüedad de las empresas - clientes</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["255_".$PerfilDemograficoOrganizacionalClass->antiguedad]; ?></td>
			</tr>
			<tr>
				<td class="principal">2.4. Calificación de la mano de obra de los clientes</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["256_".$PerfilDemograficoOrganizacionalClass->calificacion]; ?></td>
			</tr>
		</table>
	</page>
	<page pageset="old">
		
		<?php
			$IDCuestionario = "454"; // POR EJEMPLO...
			$Arreglo = array();
			$Arreglo = GetQuestionAnswers($IDCuestionario);
		?>
		<table class="table OneTDTH">
			<tr>
				<th>3. PERFIL PSICOLOGICO</th>
			</tr>
			<tr>
				<td class="principal">Necesidades</td>
			</tr>
			<tr>
				<!--<td><?php echo $Arreglo["257_".$PerfilPsicologicoOrganizacionalClass->necesidad]; ?></td>-->
				<td><?php if($PerfilPsicologicoOrganizacionalClass->necesidad != "5" ){ echo $Arreglo["257_".$PerfilPsicologicoOrganizacionalClass->necesidad]; }else{ echo $PerfilPsicologicoOrganizacionalClass->otranecesidad; } ?></td>
			</tr>
			<tr>
				<td class="principal">Motivación</td>
			</tr>
			<tr>
				<!--<td><?php echo $Arreglo["258_".$PerfilPsicologicoOrganizacionalClass->motivacion]; ?></td>-->
				<td><?php if($PerfilPsicologicoOrganizacionalClass->motivacion != "6" ){ echo $Arreglo["258_".$PerfilPsicologicoOrganizacionalClass->motivacion]; }else{ echo $PerfilPsicologicoOrganizacionalClass->otramotivacion; } ?></td>
			</tr>
			<tr>
				<td class="principal">Actitudes</td>
			</tr>
			<tr>
				<!--<td><?php echo $Arreglo["259_".$PerfilPsicologicoOrganizacionalClass->actitud]; ?></td>-->
				<td><?php if($PerfilPsicologicoOrganizacionalClass->actitud != "6" ){ echo $Arreglo["259_".$PerfilPsicologicoOrganizacionalClass->actitud]; }else{ echo $PerfilPsicologicoOrganizacionalClass->otraactitud; } ?></td>
			</tr>
			<tr>
				<td class="principal">Actitud competitiva</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["260_".$PerfilPsicologicoOrganizacionalClass->calificacion]; ?></td>
			</tr>

			<tr>
				<td class="principal">Personalidad corporativa</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo1]; ?></td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo2]; ?></td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo3]; ?></td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo4]; ?></td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo5]; ?></td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["261_".$PerfilPsicologicoOrganizacionalClass->rasgo6]; ?></td>
			</tr>
		</table>
	</page>
	<page pageset="old">				
		<?php
			$IDCuestionario = "459"; // POR EJEMPLO...
			$Arreglo = array();
			$Arreglo = GetQuestionAnswers($IDCuestionario);
			$ArrayCulturales = explode(",",$PerfilSocioCulturalOrganizacionalClass->fculturales);
			$ArraySubCulturales = explode(",",$PerfilSocioCulturalOrganizacionalClass->fsubculturales);
			$ArrayReferencia = explode(",",$PerfilSocioCulturalOrganizacionalClass->greferencia);
			$ArrayPertenencia = explode(",",$PerfilSocioCulturalOrganizacionalClass->gpertenencia);
		?>
		<table class="table OneTDTH">
			<tr>
				<th>4. Perfil Sociocultural</th>
			</tr>
			<tr>
				<td class="principal">Factores Culturales de ALTA INFLUENCIA sobre el consumidor</td>
			</tr>
			<?php
				foreach($ArrayCulturales as $Cultural){
					echo "<tr>";
					echo "<td>".$Arreglo["262_".$Cultural]."</td>";
					echo "</tr>";
				}
			?>
			<tr>
				<td class="principal">Factores Subculturales de ALTA INFLUENCIA sobre el consumidor</td>
			</tr>
			<?php
				foreach($ArraySubCulturales as $SubCultural){
					echo "<tr>";
					echo "<td>".$Arreglo["263_".$SubCultural]."</td>";
					echo "</tr>";
				}
			?>
			<tr>
				<td class="principal">Grupos de Referencia de ALTA INFLUENCIA sobre el consumidor</td>
			</tr>
			<?php
				foreach($ArrayReferencia as $Referencia){
					echo "<tr>";
					echo "<td>".$Arreglo["264_".$Referencia]."</td>";
					echo "</tr>";
				}
			?>
			<tr>
				<td class="principal">Grupos de Pertenencia de ALTA INFLUENCIA sobre el consumidor</td>
			</tr>
			<?php
				foreach($ArrayPertenencia as $Pertenencia){
					echo "<tr>";
					echo "<td>".$Arreglo["265_".$Pertenencia]."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</page>
	<page pageset="old">				
		<?php
			$IDCuestionario = "464"; // POR EJEMPLO...
			$Arreglo = array();
			$Arreglo = GetQuestionAnswers($IDCuestionario);
		?>
		<table class="table">
			<tr>
				<th colspan="3">5. Perfil Conductual</th>
			</tr>
			<tr >
				<td colspan="3" class="principal">Frecuencia de compra</td>
			</tr>
			<tr>
				<!--<td colspan="3"><?php echo $Arreglo["291_".$PerfilConductualOrganizacionalClass->frecuenciacompra]; ?></td>-->
				<td colspan="3"><?php if($PerfilConductualOrganizacionalClass->frecuenciacompra != "9" ){ echo $Arreglo["291_".$PerfilConductualOrganizacionalClass->frecuenciacompra]; }else{ echo $PerfilConductualOrganizacionalClass->otrafcompra; } ?></td>
			</tr>
			<?php
				if($PerfilConductualOrganizacionalClass->vacescolares != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones escolares</td>
						<td class="cols3"><?php echo $Arreglo["292_".$PerfilConductualOrganizacionalClass->vacescolares]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvaces."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vacverano != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de Verano</td>
						<td class="cols3"><?php echo $Arreglo["293_".$PerfilConductualOrganizacionalClass->vacverano]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacve."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vacinvierno != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de invierno</td>
						<td class="cols3"><?php echo $Arreglo["294_".$PerfilConductualOrganizacionalClass->vacinvierno]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacna."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vachalloween != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de halloween</td>
						<td class="cols3"><?php echo $Arreglo["295_".$PerfilConductualOrganizacionalClass->vachalloween]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacha."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vacfinano != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de fin de año</td>
						<td class="cols3"><?php echo $Arreglo["296_".$PerfilConductualOrganizacionalClass->vacfinano]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacfa."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vaccarnaval != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de carnaval</td>
						<td class="cols3"><?php echo $Arreglo["297_".$PerfilConductualOrganizacionalClass->vaccarnaval]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacca."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vacacciongracias != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de accion de gracias</td>
						<td class="cols3"><?php echo $Arreglo["298_".$PerfilConductualOrganizacionalClass->vacacciongracias]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacag."%"; ?></td>
					</tr>
					<?php
				}
				if($PerfilConductualOrganizacionalClass->vacindependencia != 4){
					?>
					<tr>
						<td class="cols3">Vacaciones de accion de gracias</td>
						<td class="cols3"><?php echo $Arreglo["299_".$PerfilConductualOrganizacionalClass->vacindependencia]; ?></td>
						<td class="cols3"><?php echo $PerfilConductualOrganizacionalClass->pvacin."%"; ?></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="3" class="principal">5.3. Frecuencia de uso del producto</td>
			</tr>
			<tr>
				<!--<td colspan="3"><?php echo $Arreglo["300_".$PerfilConductualOrganizacionalClass->frecuenciauso]; ?></td>-->
				<td colspan="3"><?php if($PerfilConductualOrganizacionalClass->frecuenciauso != "9" ){ echo $Arreglo["300_".$PerfilConductualOrganizacionalClass->frecuenciauso]; }else{ echo $PerfilConductualOrganizacionalClass->otrafuso; } ?></td>
			</tr>
			<tr>
				<td colspan="3" class="principal">5.4. Lugar de busca / compra del producto</td>
			</tr>
			<tr>
				<td colspan="3"><?php echo $Arreglo["301_".$PerfilConductualOrganizacionalClass->lugar]; ?></td>
			</tr>
		</table>
		<table class="table">
			<tr>
				<td colspan="2" class="principal">5.6. DATOS DEL USUARIO DEL PRODUCTO (persona que USA y MANIPULA el producto dentro de una Empresa)</td>
			</tr>
			<tr>
				<td>5.6.1.  Edad del Usuario del producto</td>
				<td>5.6.3. Rango - Cargo del usuario en la compania	</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["303_".$PerfilConductualOrganizacionalClass->edadusuario]; ?></td>
				<td rowspan="3"><?php echo $Arreglo["305_".$PerfilConductualOrganizacionalClass->rangousuario]; ?></td>
			</tr>
			<tr>
				<td>5.6.2. Genero del Usuario del producto</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["304_".$PerfilConductualOrganizacionalClass->edadusuario]; ?></td>
			</tr>
			<tr>
				<td colspan="2" class="principal">5.7. DATOS DEL INFLUENCIADOR DE COMPRA (persona que PROMUEVE la compra del producto y/o de una determinada marca dentro de una Empresa)</td>
			</tr>
			<tr>
				<td>5.7.1. Edad del influenciador del producto</td>
				<td>5.7.3. Rango - Cargo del Influenciador en la compania</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["307_".$PerfilConductualOrganizacionalClass->edadinfluencia]; ?></td>
				<td rowspan="3"><?php echo $Arreglo["309_".$PerfilConductualOrganizacionalClass->rangoinfluencia]; ?></td>
			</tr>
			<tr>
				<td>5.7.2. Genero del Influenciador del producto</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["308_".$PerfilConductualOrganizacionalClass->edadinfluencia]; ?></td>
			</tr>
			<tr>
				<td colspan="2" class="principal">5.8. DATOS DEL COMPRADOR DEL PRODUCTO ( persona que DECIDE Y PAGA por el producto dentro de una Empresa)</td>
			</tr>
			<tr>
				<td>5.8.1. Edad del Comprador del producto</td>
				<td>5.8.3. Rango - Cargo del Comprador del Producto</td>
			</tr>
			<tr>
				<td><?php echo $Arreglo["311_".$PerfilConductualOrganizacionalClass->edadcomprador]; ?></td>
				<td rowspan="3"><?php echo $Arreglo["313_".$PerfilConductualOrganizacionalClass->rangocomprador]; ?></td>
			</tr>
			<tr>
				<td colspan="2">5.8.2. Genero del Comprador del producto</td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $Arreglo["312_".$PerfilConductualOrganizacionalClass->edadcomprador]; ?></td>
			</tr>
			<tr>
				<td colspan="2" class="principal">5.7. GRADO DE FIDELIDAD DEL CONSUMIDOR ORGANIZACIONAL</td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $Arreglo["315_".$PerfilConductualOrganizacionalClass->fidelidad]; ?></td>
			</tr>
		</table>
	</page>				
	<?php
		}
	?>
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
			$Aprovecha = $FactoresDemograficosClass->creaprovecha > 6 ? $FactoresDemograficosClass->creaprovecha - 5 : $FactoresDemograficosClass->creaprovecha;
			$Valor = $Afecta * $Aprovecha;
			if($FactoresDemograficosClass->crecimiento == "1"){
				$ArrayAmenazas[$ContAmenazas]["Texto"] = $Arreglo["210"];
				$ArrayAmenazas[$ContAmenazas]["Valor"] = $Valor;
				$ContAmenazas++;
			}else{
				$ArrayOportunidades[$ContOportnidades]["Texto"] = $Arreglo["210"];
				$ArrayOportunidades[$ContOportnidades]["Valor"] = $Valor;
				$ContOportnidades++;
			}
		}

		if($FactoresDemograficosClass->natalidad != "3"){
			$Afecta = $FactoresDemograficosClass->natafecta > 6 ? $FactoresDemograficosClass->natafecta - 5 : $FactoresDemograficosClass->natafecta;
			$Aprovecha = $FactoresDemograficosClass->nataprovecha > 6 ? $FactoresDemograficosClass->nataprovecha - 5 : $FactoresDemograficosClass->creaprovecha;
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
			$Aprovecha = $FactoresDemograficosClass->migaprovecha > 6 ? $FactoresDemograficosClass->migaprovecha - 5 : $FactoresDemograficosClass->migaprovecha;
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
			$Aprovecha = $FactoresDemograficosClass->divaprovecha > 6 ? $FactoresDemograficosClass->divaprovecha - 5 : $FactoresDemograficosClass->divaprovecha;
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
			$Aprovecha = $FactoresDemograficosClass->pataprovecha > 6 ? $FactoresDemograficosClass->pataprovecha - 5 : $FactoresDemograficosClass->pataprovecha;
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
	<page pageset="old">
		<table class="table">
			<tr>
				<th colspan="5">3.1. FACTORES DEMOGRAFICOS</th>
			</tr>
			<tr class="principal">
				<td>AMENAZAS</td>
				<td>OPORTUNIDADES</td><!-- IdentificacionDeLaCompetenciaClass -->
			</tr>
			<?php
				for($i=0; $i<=$CantFilas - 1; $i++){
					$Amenaza = isset($ArrayAmenazas[$i]["Texto"]) ? $ArrayAmenazas[$i]["Texto"] : "";
					$Oportunidad = isset($ArrayOportunidades[$i]["Texto"]) ? $ArrayOportunidades[$i]["Texto"] : "";
					echo "<tr>";
					echo "<td>".$Amenaza."</td>";
					echo "<td>".$Oportunidad."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</page>

	<?php
		$IDCuestionario = "349"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$ArrayAmenazas = array();
		$ArrayOportunidades = array();
		$ContAmenazas = 0;
		$ContOportnidades = 0;
		if($FactoresEconomicosClass->inf != "3"){
			$Afecta = $FactoresEconomicosClass->infafecta > 6 ? $FactoresEconomicosClass->infafecta - 5 : $FactoresEconomicosClass->infafecta;
			$Valor = $Afecta + $FactoresEconomicosClass->infaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->pibaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->eipaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->pgpaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->pfiaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->tipaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->tibaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->tcmaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->cecaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->cdmaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->codaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->dmpaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->adcaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->rdcaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->edoaprovecha;
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
			$Valor = $Afecta + $FactoresEconomicosClass->cdoaprovecha;
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
	<page pageset="old">
		<table class="table">
			<tr>
				<th colspan="5">3.2. FACTORES ECONOMICOS</th>
			</tr>
			<tr class="principal">
				<td>AMENAZAS</td>
				<td>OPORTUNIDADES</td><!-- IdentificacionDeLaCompetenciaClass -->
			</tr>
			<?php
				for($i=0; $i<=$CantFilas - 1; $i++){
					$Amenaza = isset($ArrayAmenazas[$i]["Texto"]) ? $ArrayAmenazas[$i]["Texto"] : "";
					$Oportunidad = isset($ArrayOportunidades[$i]["Texto"]) ? $ArrayOportunidades[$i]["Texto"] : "";
					echo "<tr>";
					echo "<td>".$Amenaza."</td>";
					echo "<td>".$Oportunidad."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</page>
	<?php
		$IDCuestionario = "352"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$ArrayAmenazas = array();
		$ArrayOportunidades = array();
		$ContAmenazas = 0;
		$ContOportnidades = 0;
		if($FactoresPoliticoLegalesClass->iap != "3"){
			$Afecta = $FactoresPoliticoLegalesClass->iapafecta > 6 ? $FactoresPoliticoLegalesClass->iapafecta - 5 : $FactoresPoliticoLegalesClass->iapafecta;
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->iapaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->ppdaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->idpaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->espaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->conaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->lglaprovecha;
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
			$Valor = $Afecta + $FactoresPoliticoLegalesClass->lgmaprovecha;
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
	<page pageset="old">
		<table class="table">
			<tr>
				<th colspan="5">3.3. FACTORES POLITICO-LEGALES</th>
			</tr>
			<tr class="principal">
				<td>AMENAZAS</td>
				<td>OPORTUNIDADES</td><!-- IdentificacionDeLaCompetenciaClass -->
			</tr>
			<?php
				for($i=0; $i<=$CantFilas - 1; $i++){
					$Amenaza = isset($ArrayAmenazas[$i]["Texto"]) ? $ArrayAmenazas[$i]["Texto"] : "";
					$Oportunidad = isset($ArrayOportunidades[$i]["Texto"]) ? $ArrayOportunidades[$i]["Texto"] : "";
					echo "<tr>";
					echo "<td>".$Amenaza."</td>";
					echo "<td>".$Oportunidad."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</page>
	<?php
		$IDCuestionario = "354"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$ArrayAmenazas = array();
		$ArrayOportunidades = array();
		$ContAmenazas = 0;
		$ContOportnidades = 0;
		if(($FactoresSocialesClass->itd != "3") && ($FactoresSocialesClass->itd != "4")){
			$Afecta = $FactoresSocialesClass->itdafecta > 6 ? $FactoresSocialesClass->itdafecta - 5 : $FactoresSocialesClass->itdafecta;
			$Valor = $Afecta + $FactoresSocialesClass->itdaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->itpaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->vsmaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->cvhaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->ispaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->icpaprovecha;
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
			$Valor = $Afecta + $FactoresSocialesClass->itaaprovecha;
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
	<page pageset="old">
		<table class="table">
			<tr>
				<th colspan="5">3.4. FACTORES SOCIALES</th>
			</tr>
			<tr class="principal">
				<td>AMENAZAS</td>
				<td>OPORTUNIDADES</td><!-- IdentificacionDeLaCompetenciaClass -->
			</tr>
			<?php
				for($i=0; $i<=$CantFilas - 1; $i++){
					$Amenaza = isset($ArrayAmenazas[$i]["Texto"]) ? $ArrayAmenazas[$i]["Texto"] : "";
					$Oportunidad = isset($ArrayOportunidades[$i]["Texto"]) ? $ArrayOportunidades[$i]["Texto"] : "";
					echo "<tr>";
					echo "<td>".$Amenaza."</td>";
					echo "<td>".$Oportunidad."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</page>
	<?php
		$IDCuestionario = "376"; // POR EJEMPLO...
		$Arreglo = array();
		$Arreglo = GetQuestionAnswers($IDCuestionario);
		$ArrayAmenazas = array();
		$ArrayOportunidades = array();
		$ContAmenazas = 0;
		$ContOportnidades = 0;
		if($FactoresTecnologicosClass->nmat != "3"){
			$Afecta = $FactoresTecnologicosClass->nmatafecta > 6 ? $FactoresTecnologicosClass->nmatafecta - 5 : $FactoresTecnologicosClass->nmatafecta;
			$Valor = $Afecta + $FactoresTecnologicosClass->nmataprovecha;
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
			$Valor = $Afecta + $FactoresTecnologicosClass->nproaprovecha;
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
			$Valor = $Afecta + $FactoresTecnologicosClass->nmedaprovecha;
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
			$Valor = $Afecta + $FactoresTecnologicosClass->ntecaprovecha;
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
			$Valor = $Afecta + $FactoresTecnologicosClass->ainfaprovecha;
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
			$Valor = $Afecta + $FactoresTecnologicosClass->ecieaprovecha;
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
	<page pageset="old">
		<table class="table">
			<tr>
				<th colspan="5">3.4. FACTORES SOCIALES</th>
			</tr>
			<tr class="principal">
				<td>AMENAZAS</td>
				<td>OPORTUNIDADES</td><!-- IdentificacionDeLaCompetenciaClass -->
			</tr>
			<?php
				for($i=0; $i<=$CantFilas - 1; $i++){
					$Amenaza = isset($ArrayAmenazas[$i]["Texto"]) ? $ArrayAmenazas[$i]["Texto"] : "";
					$Oportunidad = isset($ArrayOportunidades[$i]["Texto"]) ? $ArrayOportunidades[$i]["Texto"] : "";
					echo "<tr>";
					echo "<td>".$Amenaza."</td>";
					echo "<td>".$Oportunidad."</td>";
					echo "</tr>";
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
				margin-left: -50px;
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
	td.cols4reality{
		width: 130px;
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
