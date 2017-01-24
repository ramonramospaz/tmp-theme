<?php /* Template Name: R Perfil Consumidor */

	ob_start();

	include("config/conexion.php");

	include("config/session.php");

	$tabla_ind = $tabla_org = '';
	/* Perfil del consumidor Individual*/
	$query_pcind = mysqli_query($conexion, "SELECT * FROM wp_tmp_pgeografico INNER JOIN wp_tmp_pdemograficoind ON wp_tmp_pgeografico.solicitud_id = wp_tmp_pdemograficoind.solicitud_id INNER JOIN wp_tmp_ppsicologicoind ON wp_tmp_pdemograficoind.solicitud_id = wp_tmp_ppsicologicoind.solicitud_id INNER JOIN wp_tmp_psocioculturalind ON wp_tmp_ppsicologicoind.solicitud_id = wp_tmp_psocioculturalind.solicitud_id INNER JOIN wp_tmp_pconductualind ON wp_tmp_psocioculturalind.solicitud_id = wp_tmp_pconductualind.solicitud_id WHERE wp_tmp_pdemograficoind.solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_pcind) > 0){

		$row_pcind = mysqli_fetch_assoc($query_pcind);

		/*pgeografico*/
		$zona = array('','Zona(s) Urbanas (capitales y/o ciudades muy pobladas)','Zona (s) suburbanas (Pequenas ciudades con menor poblacion)','Zona(s) rurales (Pueblos o caserios)','No sabe');
		$clima = array('','Cuatro estaciones','Dos estaciones: lluvias y sequias','Verano permanente (zona caliente)','Invierno permanente (frio constante)','Lluvias permanentes','Clima templado permanentemente','No sabe / No contesta');
		$consumo = array('','Aumenta el consumo','se mantiene consumo standard','Disminuye el consumo','No sabe');
		/*pdemografico*/
		$edad = array('','Hombre','de 6 a 12','de 13 a 17','de 18 a 25','de 26 a 39','de 40 a 59','de 60 a 74','Mas de 75','No sabe');
		$genero = array('','Hombre','Mujer','Hombre homosexual','Mujer homosexual',$row_pcind["otrogenero"],'No sabe');
		$ecivil = array('','Solteros','Parejas en convivencia','Casados','Divorciados','Viudos',$row_pcind["otroecivil"],'No sabe');
		$ingreso = $row_pcind["ingreso"];
		$imensual = array('',$ingreso,'No sabe');
		$ginstruccion = array('','Hasta primaria o secundaria incompleta','Bachiller','Tecnico','Universitario','Postgrados',$row_pcind["otrogi"],'No sabe');
		$ocupacion = array('','Estudiante','Ama de casa','Empleado privado - publico','Desempleado','Trabajador independiente','Empresario','Comerciante','Jubilado',$row_pcind["otraocupacion"],'No sabe');
		$cdvida = array('','Solteros independientes sin hijos','Parejas jovenes sin hijos','Parejas con hijos pequenos','Parejas con hijos adolescentes o adultos aun en casa','Madres o padres solteros o divorciados viviendo con hijos','Parejas maduras solas con hijos fuera de la casa','Viudo(a) viviendo con hijo(a)',$row_pcind["otrociclo"],'No sabe');
		$nfamiliar = array('','1 persona','2 personas','3 a 4 personas','5 a 6 personas','Mas de 7 personas','No sabe');
		/*psicologico*/
		$necesidad = array('','Fisiologica (basica para vivir)','Seguridad (proteccion, resguardo, etc)','Sociales (afecto, amor, pertenencia, amistad)','Reconocimiento (exitos, logros, prestigio)','Autorealizacion (reconocimientos, meritos, crecimiento)','No sabe');
		$motivacion = array('','Es mas barata que la competencia','Es la que mas usan sus amigos, familiares o conocidos','Es la marca que le da mas prestigio','Es la marca mas facil de encontrar en el mercado','El consumidor se siente mas seguro usando su marca',$row_pcind["otramotivación"],'No sabe');
		$actitud = array('','Sienten una afinidad  personal e identidad muy estrecha con la marca. La sienten como parte de ellos','Hay una preferencia masiva por su marca, pero no una afinidad personal o identidad con ella','Tienen una buena percepcion o imagen de su marca, pero no necesariamente una preferencia masiva o afinidad personal','Reconocen la marca entre las demas, pero no necesariamente tienen una buena impresión de ella','No reconocen o identifican su marca, sino que las compras son por impulso u otra necesidad basica',$row_pcind["otraactitud"],'No sabe');
		$rasgo1 = array('','Son decididos,','Son indecisos,');
		$rasgo2 = array('','Son arriegados,','Son temerosos,');
		$rasgo3 = array('','Son emprendedores,','Son rezagados,');
		$rasgo4 = array('','Son innovadores,','Son tradicionalistas,');
		$rasgo5 = array('','Son extrovertidos,','Son introvertidos,');
		$rasgo6 = array('','Son activos,','Son pasivos,');
		$rasgo7 = array('','Son organizados (planificados),','Son desorganizados (improvisadores),');
		$rasgo8 = array('','Son pacificos','Son violentos');
		$otrosrasgos = !empty($row_pcind["otrosrasgos"]) ? ', '.$row_pcind["otrosrasgos"] : '';
		$rasgos = $rasgo1[$row_pcind["rasgo1"]].$rasgo2[$row_pcind["rasgo2"]].$rasgo3[$row_pcind["rasgo3"]].$rasgo4[$row_pcind["rasgo4"]].$rasgo5[$row_pcind["rasgo5"]].$rasgo6[$row_pcind["rasgo6"]].$rasgo7[$row_pcind["rasgo7"]].$rasgo8[$row_pcind["rasgo8"]].$otrosrasgos;
		$actividades = array('','Practicar deportes','Entrenar en gimnasios o similares','Escuchar musica','Leer','Ver TV','Comer fuera de casa','Practicar deportes extremos','Socializar en redes sociales','Viajar','Navegar por internet','Hablar por telefono','Ir a la playa','Ir al cine','Ir a discotecas','Viajar en carro','Viajar en avion','Pasear en lancha o barco','Hacer turismo de aventura','Beber licor','Hacer reuniones sociales en la casa','Ir a eventos deportivos','Ir a eventos musicales','Ir a eventos culturales (museos, galerias, etc)','Fumar','Pescar','Jugar juegos de video','Estudiar');
		$actsel = explode(',',$row_pcind["actividades"]);
		$nact = count($actsel);
		$l_actividades = '';
		for($i=0;$i<$nact;$i++){
			$l_actividades .= '<li>'.$actividades[$actsel[$i]].'</li>';
		}
		$otrasactividades = $row_pcind["otrasactividades"];	
		$intereses = array('','Estar a la moda	Estar en buena forma fisica','Comer saludable','Mantenerse informados','Estar actualizados en tecnologia','Estar en los sitios de moda','Ser referencia en redes sociales y en campos laborales','Tener nuevos y buenos carros','Ser reconocido en su profesion u oficio','Hacer mucho dinero','Compartir con sus amigos','Mantener trabajos estables','Tener su propia compania rentable');
		$intsel = explode(',',$row_pcind["intereses"]);
		$nint = count($intsel);
		$l_intereses = '';
		for($i=0;$i<$nint;$i++){
			$l_intereses .= '<li>'.$intereses[$intsel[$i]].'</li>';
		}
		$otrosintereses = $row_pcind["otrosintereses"];	
		/*sc*/
		$alimentos = $row_pcind["alimentos"] == 1 ? '<tr><td colspan="2">habitos de alimentacion de la region</td><td></td></tr>' : '';
		$bebidas = $row_pcind["bebidas"] == 1 ? '<tr><td colspan="2">Tipos de bebidas consumidas en la region</td><td></td></tr>' : '';
		$vocabulario = $row_pcind["vocabulario"] == 1 ? '<tr><td colspan="2">Tipo de vocabulario, lenguaje y/o dialectos en la region</td><td></td></tr>' : '';
		$creencias = $row_pcind["creencias"]== 1 ? '<tr><td colspan="2">creencias populares en la region</td><td></td></tr>' : '';
		$vestimenta = $row_pcind["vestimenta"]== 1 ? '<tr><td colspan="2">Tipo de vestimenta o atuendos en la region</td><td></td></tr>' : '';
		$transporte = $row_pcind["transporte"]== 1 ? '<tr><td colspan="2">Medios de transporte utilizados en la region</td><td></td></tr>' : '';
		$vivienda = $row_pcind["vivienda"]== 1 ? '<tr><td colspan="2">Vivienda y forma de vida en el hogar en la region</td><td></td></tr>' : '';
		$ritmo = $row_pcind["ritmo"]== 1 ? '<tr><td colspan="2">Ritmo y actitud de vida (ante el trabajo, ante el desarrollo, etc) en la region</td><td></td></tr>' : '';
		$valores = $row_pcind["valores"]== 1 ? '<tr><td colspan="2">Actitud frente a la ley, valores y morales en la region</td><td></td></tr>' : '';
		$fculturales = $alimentos.$bebidas.$vocabulario.$creencias.$vestimenta.$transporte.$vivienda.$ritmo.$valores;
		$divnacionalidad = $row_pcind["divnacionalidad"]== 1 ? '<tr><td colspan="2">Diversidad de nacionalidades</td><td></td></tr>' : '';
		$nacmayoritarias = $row_pcind["nacmayoritarias"]== 1 ? '<tr><td colspan="2">Una o pocas nacionalidades mayoritarias</td><td></td></tr>' : '';
		$divreligion = $row_pcind["divreligion"]== 1 ? '<tr><td colspan="2">Diversidad de religiones</td><td></td></tr>' : '';
		$relmayoritarias = $row_pcind["relmayoritarias"]== 1 ? '<tr><td colspan="2">Una o dos religiones mayoritarias</td><td></td></tr>' : '';
		$divracial = $row_pcind["divracial"]== 1 ? '<tr><td colspan="2">Diversidad de grupos raciales y/o etnicos</td><td></td></tr>' : '';
		$etnmayoritarias = $row_pcind["etnmayoritarias"]== 1 ? '<tr><td colspan="2">Uno o dos grupos etnicos mayoritarios</td><td></td></tr>' : '';
		$fsubculturales = $divnacionalidad.$nacmayoritarias.$divreligion.$relmayoritarias.$divracial.$etnmayoritarias;

		$ascendientes = $row_pcind["ascendientes"]== 1 ? '<tr><td colspan="2">Su Familia de ascendencia (sus padres, tios y/o abuelos)</td><td></td></tr>' : '';
		$nucleofamiliar = $row_pcind["nucleofamiliar"]== 1 ? '<tr><td colspan="2">Su nucleo familiar (su pareja e hijos)</td><td></td></tr>' : '';
		$amistades = $row_pcind["amistades"]== 1 ? '<tr><td colspan="2">Sus amistades</td><td></td></tr>' : '';
		$vecinos = $row_pcind["vecinos"] == 1 ? '<tr><td colspan="2">Sus vecinos</td><td></td></tr>' : '';
		$comptrabajo = $row_pcind["comptrabajo"]== 1 ? '<tr><td colspan="2">Sus companeros de trabajo</td><td></td></tr>' : '';
		$greferencia = $ascendientes.$nucleofamiliar.$amistades.$vecinos.$comptrabajo;

		$greligioso = $row_pcind["greligioso"]== 1 ? '<tr><td colspan="2">Su grupo religioso</td><td></td></tr>' : '';
		$colegas = $row_pcind["colegas"]== 1 ? '<tr><td colspan="2">Sus colegas (homologos profesionales o de oficio)</td><td></td></tr>' : '';
		$gremiales = $row_pcind["gremiales"]== 1 ? '<tr><td colspan="2">Sus companeros gremiales</td><td></td></tr>' : '';
		$patronales = $row_pcind["patronales"]== 1 ? '<tr><td colspan="2">Sus companeros patronales</td><td></td></tr>' : '';
		$partidopolitico = $row_pcind["partidopolitico"]== 1 ? '<tr><td colspan="2">Sus companeros de partido politico</td><td></td></tr>' : '';
		$asociacion = $row_pcind["asociacion"]== 1 ? '<tr><td colspan="2">Sus companeros de alguna asociacion o circulo al que pertenezca </td><td></td></tr>' : '';
		$gpertenencia = $greligioso.$colegas.$gremiales.$patronales.$partidopolitico.$asociacion;
		$clasesocial = array('','Clase baja','Clase media baja','Clase media','Clase media alta','Clase alta','No sabe');
		/* Perfil conductual */
		$frecuenciacompra = array('','Diariamente','Semanalmente','Quincenalmente','Mensualmente','Bimestralmente','Trimestralmente','Semestralmente','Anualmente',$row_pcind["otrafcompra"],'No sabe');
		$frecuenciauso = array('','Diariamente','Semanalmente','Quincenalmente','Mensualmente','Bimestralmente','Trimestralmente','Semestralmente','Anualmente',$row_pcind["otrafuso"],'No sabe');
		$lugar = array('','Tiendas especializadas','Farmacias','Supermercados','Ferreterias','Panaderias','Conseconario','Proveedor exclusivo','Expendio de licores','Centros comerciales');
		$unidades = array('','solo 1','de 2 a 3','de 4 a 6','de 7 a 12','de 13 a 24','de 25 a 48','mas de 49',$row_pcind["otrasunidades"],'No sabe');
		$influye = array('','Padre','Madre','Hijo(s) (varones) mayores de 12 años','Hija(s) (hembras) mayores de 12 años','Hijo(s) (varones) nino(s) menores de 11 años','Hija(s) (hembras) nina(s) menores de 11 años',$row_pcind["otroinfluye"],'No sabe');
		$compra = array('','Padre','Madre','Hijo(s) (varones) mayores de 12 años','Hija(s) (hembras) mayores de 12 años','Hijo(s) (varones) nino(s) menores de 11 años','Hija(s) (hembras) nina(s) menores de 11 años',$row_pcind["otrocompra"],'No sabe');		
		$usa = array('','Padre','Madre','Hijo(s) (varones) mayores de 12 años','Hija(s) (hembras) mayores de 12 años','Hijo(s) (varones) nino(s) menores de 11 años','Hija(s) (hembras) nina(s) menores de 11 años','Todos o la mayoria de los miembros del nucleo familiar',$row_pcind["otrousa"],'No sabe');
		$fidelidad = array('','Son sumamente fieles a su marca de preferencia','Tienden a ser fieles a su marca en la mayoria de los casos','Tienden a probar varias marcas en la mayoria de los casos','Siempre prueban otras marcas','No sabe');
		$vacescolares = array('','<tr><td>Vacaciones escolares</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvaces"].'%</td></tr>','<tr><td>Vacaciones escolares</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvaces"].'%</td></tr>');
		$vacverano = array('','<tr><td>Vacaciones de verano</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacve"].'%</td></tr>','<tr><td>Vacaciones de verano</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacve"].'%</td></tr>');
		$vacinvierno = array('','<tr><td>Vacaciones de invierno / Navidad</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacna"].'%</td></tr>','<tr><td>Vacaciones de invierno / Navidad</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacna"].'%</td></tr>');
		$vachalloween = array('','<tr><td>Hallowen</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacha"].'%</td></tr>','<tr><td>Hallowen</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacha"].'%</td></tr>');
		$vacfinano = array('','<tr><td>Fiestas de fin de año</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacfa"].'%</td></tr>','<tr><td>Fiestas de fin de año</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacfa"].'%</td></tr>');
		$vaccarnaval = array('','<tr><td>Carnaval</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacca"].'%</td></tr>','<tr><td>Carnaval</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacca"].'%</td></tr>');
		$vacacciongracias = array('','<tr><td>Dia de Accion de gracias</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacag"].'%</td></tr>','<tr><td>Dia de Accion de gracias</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacag"].'%</td></tr>');
		$vacindependencia = array('','<tr><td>Fiestas por Independencia</td><td>Incrementa el consumo</td><td>'.$row_pcind["pvacin"].'%</td></tr>','<tr><td>Fiestas por Independencia</td><td>Se reduce el consumo</td><td>'.$row_pcind["pvacin"].'%</td></tr>');
		$comp_consumo = $vacescolares[$row_pcind["vacescolares"]].$vacverano[$row_pcind["vacverano"]].$vacinvierno[$row_pcind["vacinvierno"]].$vachalloween[$row_pcind["vachalloween"]].$vacfinano[$row_pcind["vacfinano"]].$vaccarnaval[$row_pcind["vaccarnaval"]].$vacacciongracias[$row_pcind["vacacciongracias"]].$vacindependencia[$row_pcind["vacindependencia"]];
		
		$tabla_ind = '<table class="pconsumidor">
		<tr>
			<th class="mh" colspan="3">CONSUMIDOR INDIVIDUAL</th>
		</tr>
		<tr>
			<th class="pgh" colspan="3">Perfil geografico</th>
		</tr>
		<tr>
			<th>Tipo de Zona</th>
			<td colspan="2">'.$zona[$row_pcind["zona"]].'</td>
		</tr>
		<tr>
			<th>Tipo de clima de la zona</th>
			<td colspan="2">'.$clima[$row_pcind["clima"]].'</td>
		</tr>';
		if($row_pcind["clima"] == 1){
			$tabla_ind .= '<tr>
			<th>Primavera</th>
			<td colspan="2">'.$consumo[$row_pcind["temp1"]].'</td>
			</tr>
			<tr>
				<th>Verano</th>
				<td>'.$consumo[$row_pcind["temp2"]].'</td>
			</tr>
			<tr>
				<th>Otono</th>
				<td>'.$consumo[$row_pcind["temp3"]].'</td>
			</tr>
			<tr>
				<th>Invierno</th>
				<td>'.$consumo[$row_pcind["temp4"]].'</td>
			</tr>';
		}else if ($row_pcind["clima"] == 2){
			$tabla_ind .= '<tr>
			<th>Lluvias</th>
			<td colspan="2">'.$consumo[$row_pcind["temp1"]].'</td>
			</tr>
			<tr>
				<th>Sequias</th>
				<td colspan="2">'.$consumo[$row_pcind["temp2"]].'</td>
			</tr>';
		}
		$tabla_ind .= '<tr>
			<th class="pdh" colspan="3">Perfil demografico</th>
		</tr>
		<tr>
			<th>Edad</th>
			<td colspan="2">'.$edad[$row_pcind["edad"]].'</td>
		</tr>
		<tr>
			<th>Genero</th>
			<td colspan="2">'.$genero[$row_pcind["genero"]].'</td>
		</tr>
		<tr>
			<th>Estado civil</th>
			<td colspan="2">'.$ecivil[$row_pcind["ecivil"]].'</td>
		</tr>
		<tr>
			<th>Ingreso mensual</th>
			<td colspan="2">'.$imensual[$row_pcind["imensual"]].'</td>
		</tr>
		<tr>
			<th>Grado de instrucción</th>
			<td colspan="2">'.$ginstruccion[$row_pcind["ginstruccion"]].'</td>
		</tr>
		<tr>
			<th>Ocupación</th>
			<td colspan="2">'.$ocupacion[$row_pcind["ocupacion"]].'</td>
		</tr>
		<tr>
			<th>Ciclo de vida familiar</th>
			<td colspan="2">'.$cdvida[$row_pcind["cdvida"]].'</td>
		</tr>
		<tr>
			<th>Tamaño de la familia</th>
			<td colspan="2">'.$nfamiliar[$row_pcind["nfamiliar"]].'</td>
		</tr>';

		$tabla_ind .= '<tr>
			<th class="pph" colspan="3">Perfil psicológico</th>
		</tr>
		<tr>
			<th>Necesidad</th>
			<td colspan="2">'.$necesidad[$row_pcind["necesidad"]].'</td>
		</tr>
		<tr>
			<th>Motivación</th>
			<td colspan="2">'.$motivacion[$row_pcind["motivacion"]].'</td>
		</tr>
		<tr>
			<th>Actitud</th>
			<td colspan="2">'.$actitud[$row_pcind["actitud"]].'</td>
		</tr>
		<tr>
			<th>Personalidad</th>
			<td colspan="2">'.$rasgos.'</td>
		</tr>
		<tr>
			<th rowspan="2">Estilo de vida</th>
			<th>Actividades</th>
			<td><ul>'.$l_actividades.$otrasactividades.'</ul></td>
		</tr>
		<tr>
			<th>Intereses</th>
			<td><ul>'.$l_intereses.$otrosintereses.'</ul></td>
		</tr>';	


		$tabla_ind .= '<tr>
			<th class="psh" colspan="3">Perfil sociocultural</th>
		</tr>
		<tr>
			<th colspan="2">Factores culturales con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$fculturales.'
		<tr>
			<th colspan="2">Factores subculturales con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$fsubculturales.'
		<tr>
			<th colspan="2">Grupos de referencia con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$greferencia.'
		<tr>
			<th colspan="2">Grupos de pertenencia con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$gpertenencia.'
		<tr>
			<th colspan="2">Clase social</th>
			<td>'.$clasesocial[$row_pcind["clasesocial"]].'</td>
		</tr>';

		$tabla_ind .= '<tr>
			<th class="pch" colspan="3">Perfil conductual</th>
		</tr>
		<tr>
			<th>Frecuencia de compra</th>
			<td colspan="2">'.$frecuenciacompra[$row_pcind["frecuenciacompra"]].'</td>
		</tr>
		<tr>
			<th>Frecuencia de uso</th>
			<td colspan="2">'.$frecuenciauso[$row_pcind["frecuenciauso"]].'</td>
		</tr>
		<tr>
			<th>Lugar de compra</th>
			<td colspan="2">'.$lugar[$row_pcind["lugar"]].'</td>
		</tr>
		<tr>
			<th>Numero de productos x compra</th>
			<td colspan="2">'.$unidades[$row_pcind["unidades"]].'</td>
		</tr>
		<tr>
			<th>Rol: influyente</th>
			<td colspan="2">'.$influye[$row_pcind["influye"]].'</td>
		</tr>
		<tr>
			<th>Rol: comprador</th>
			<td colspan="2">'.$compra[$row_pcind["compra"]].'</td>
		</tr>
		<tr>
			<th>Rol: usuario</th>
			<td colspan="2">'.$usa[$row_pcind["usa"]].'</td>
		</tr>
		<tr>
			<th>Fidelidad</th>
			<td colspan="2">'.$fidelidad[$row_pcind["fidelidad"]].'</td>
		</tr>
		<tr>
			<th>Temporadas</th>
			<th>Comportamiento de consumo</th>
			<th>Porcentaje de variación</th>
		</tr>'.$comp_consumo;	


		/* psociocultural */
		
		$otroselementos = $row_pcind["otroselementos"];
		
		$otrosgrupos = $row_pcind["otrosgrupos"]== 1 ? 'Tipos de bebidas consumidas en la region' : '';		
		$otrosgpertenencia = $row_pcind["otrosgpertenencia"];	

		$tabla_ind .= '</table>';
	}
	/* Perfil del consumidor Organizacional*/
	$query_pcorg = mysqli_query($conexion, "SELECT * FROM wp_tmp_pgeografico INNER JOIN wp_tmp_pdemograficoorg ON wp_tmp_pgeografico.solicitud_id = wp_tmp_pdemograficoorg.solicitud_id INNER JOIN wp_tmp_ppsicologicoorg ON wp_tmp_pdemograficoorg.solicitud_id = wp_tmp_ppsicologicoorg.solicitud_id INNER JOIN wp_tmp_psocioculturalorg ON wp_tmp_ppsicologicoorg.solicitud_id = wp_tmp_psocioculturalorg.solicitud_id INNER JOIN wp_tmp_pconductualorg ON wp_tmp_psocioculturalorg.solicitud_id = wp_tmp_pconductualorg.solicitud_id WHERE wp_tmp_pdemograficoorg.solicitud_id = '".$_SESSION["solicitud_id"]."'") or die(mysqli_error($conexion));

	if(mysqli_num_rows($query_pcorg) > 0){

		$row_pcorg = mysqli_fetch_assoc($query_pcorg);
		$zona = array('','Zona(s) Urbanas (capitales y/o ciudades muy pobladas)','Zona (s) suburbanas (Pequenas ciudades con menor poblacion)','Zona(s) rurales (Pueblos o caserios)','No sabe');
		$clima = array('','Cuatro estaciones','Dos estaciones: lluvias y sequias','Verano permanente (zona caliente)','Invierno permanente (frio constante)','Lluvias permanentes','Clima templado permanentemente','No sabe / No contesta');
		$consumo = array('','Aumenta el consumo','se mantiene consumo standard','Disminuye el consumo','No sabe');

		$sector = array('','Primario (extraccion directa del campo / naturaleza. Ej: ganaderia, mineria)','Secundario (manufactura)','Terciario (servicios)','No sabe / No contesta');
		$tamaño = array('','Pequeñas','Medianas','Grandes','No sabe / No contesta');
		$antiguedad = array('','Menos de 5 anos','Entre 6 y 15 anos','Entre 16 y 30 anos','Mas de 31 anos','No sabe / No contesta');
		$calificada = array('','No calificada','Poco calificada','Calificada','Muy calificada','No sabe / No contesta');
		$necesidad = array('','Reposicion (compra habitual del producto como insumo para sus propios procesos basicos)','Reposicion modificada (compra de nueva marca como insumo para procesos basicos)','Compra nueva (adquisicion de nuevo insumo para proceso operativo)','Reventa del producto','No sabe / No contesta',$row_pcorg["otranecesidad"]);
		$motivacion = array('','El precio es mas econmico que su competencia','Garantia de calidad en sus procesos operativos','Es la marca que le da mas prestigio','Es la marca mas facil de encontrar en el mercado','El soporte tecnico y servicio postventa del producto','No sabe / No contesta',$row_pcorg["otramotivacion"]);
		$actitud = array('','Sienten una afinidad  personal e identidad muy estrecha con la marca. La sienten como parte de ellos','Hay una preferencia masiva por su marca, pero no una afinidad personal o identidad con ella','Tienen una buena percepcion o imagen de su marca, pero no necesariamente una preferencia masiva o afinidad personal','Reconocen la marca entre las demas, pero no necesariamente tienen una buena impresión de ella','No reconocen o identifican su marca, sino que las compras son por impulso u otra necesidad basica','No sabe / No contesta',$row_pcorg["otraactitud"]);

		$acompetitiva = array('','Lider del mercado (mantienen puesto de liderazgo)','Retador (luchan con riesgos por el liderazgo del mercado)','Seguidor (imitan al lider para mantenerse establer en el mercado)','Especialista (se centran en un nicho de mercado no cubierto plenamente por la competencia)','Varias o todas las anteriores','No sabe / No contesta');

		$rasgo1 = array('','Arriesgados,','Precavidos,');
		$rasgo2 = array('','Emprendedores,','Rezagados,');
		$rasgo3 = array('','Innovadores,','Costumbristas,');
		$rasgo4 = array('','Expresivos,','retraidos,');
		$rasgo5 = array('','Activos,','Pasivos,');
		$rasgo6 = array('','Con capacidad de respuesta','Sin capacidad de respuesta');
		$rasgos = $rasgo1[$row_pcorg["rasgo1"]].$rasgo2[$row_pcorg["rasgo2"]].$rasgo3[$row_pcorg["rasgo3"]].$rasgo4[$row_pcorg["rasgo4"]].$rasgo5[$row_pcorg["rasgo5"]].$rasgo6[$row_pcorg["rasgo6"]];

		$alimentacion = $row_pcorg["alimentacion"] == 1 ? '<tr><td colspan="2">habitos de alimentacion de la region</td><td></td></tr>' : '';
		$bebidas = $row_pcorg["bebidas"] == 1 ? '<tr><td colspan="2">Tipos de bebidas consumidas en la region</td><td></td></tr>' : '';
		$vocabulario = $row_pcorg["vocabulario"] == 1 ? '<tr><td colspan="2">Tipo de vocabulario, lenguaje y/o dialectos en la region</td><td></td></tr>' : '';
		$creencias = $row_pcorg["creencias"]== 1 ? '<tr><td colspan="2">creencias populares en la region</td><td></td></tr>' : '';
		$dferiados = $row_pcorg["dferiados"]== 1 ? '<tr><td colspan="2">Dias laborables y feriados en la region</td><td></td></tr>' : '';
		$transporte = $row_pcorg["transporte"]== 1 ? '<tr><td colspan="2">Medios de transporte utilizados en la region</td><td></td></tr>' : '';
		$ritmo = $row_pcorg["ritmo"]== 1 ? '<tr><td colspan="2">Ritmo y actitud laboral del sector empresarial en la region</td><td></td></tr>' : '';
		$ley = $row_pcorg["ritmo"]== 1 ? '<tr><td colspan="2">Actitud frente al cumplimiento de la ley en el sector empresarial de la region</td><td></td></tr>' : '';
		$valores = $row_pcorg["valores"]== 1 ? '<tr><td colspan="2">Actitud ante los principios y valores universales en el sector empresarial</td><td></td></tr>' : '';
		$hconsumo = $row_pcorg["valores"]== 1 ? '<tr><td colspan="2">Estilos y habitos de compra y consumo del sector empresarial en la region</td><td></td></tr>' : '';
		$fculturales = $alimentos.$bebidas.$vocabulario.$creencias.$dferiados.$transporte.$ritmo.$ley.$valores.$hconsumo;

		$gformal = $row_pcorg["gformal"]== 1 ? '<tr><td colspan="2">Empresas con gerencia estrategica de sus negocios (con mision, vision, valores, objetivos, planificacion, planes de accion, etc),</td><td></td></tr>' : '';
		$ginformal = $row_pcorg["ginformal"]== 1 ? '<tr><td colspan="2">Empresas con gerencia informal del negocio</td><td></td></tr>' : '';
		$gintegracion = $row_pcorg["gintegracion"]== 1 ? '<tr><td colspan="2">Grado de integracion y cohesion del personal de las empresas en la region</td><td></td></tr>' : '';
		$gfragmentacion = $row_pcorg["gfragmentacion"]== 1 ? '<tr><td colspan="2">Grado de fragmentacion o division entre el personal de las empresas en la region</td><td></td></tr>' : '';
		$gproactividad = $row_pcorg["gproactividad"]== 1 ? '<tr><td colspan="2">Grado de proactividad de las organizaciones (toman decisiones adelantandose a situaciones futuras)</td><td></td></tr>' : '';
		$greactividad = $row_pcorg["greactividad"]== 1 ? '<tr><td colspan="2">Grado de reactividad de las organizaciones (toman decisiones inmediatas ante situaciones actuales)</td><td></td></tr>' : '';
		$otrosgsubculturales = $row_pcorg["otrosgsubculturales"];

		$fsubculturales = $gformal.$ginformal.$gintegracion.$gfragmentacion.$gproactividad.$greactividad;

		$asesores  = $row_pcorg["asesores"]== 1 ? '<tr><td colspan="2">Asesores, consultores y contratistas de la Empresa</td><td></td></tr>' : '';
		$competidoras = $row_pcorg["competidoras"]== 1 ? '<tr><td colspan="2">Otras empresas competidoras</td><td></td></tr>' : '';
		$otrosmercados = $row_pcorg["otrosmercados"]== 1 ? '<tr><td colspan="2">Otras empresas de otros mercados (no son competencia)</td><td></td></tr>' : '';
		$cindividuales = $row_pcorg["cindividuales"] == 1 ? '<tr><td colspan="2">Consumidores individuales del mercado</td><td></td></tr>' : '';
		$corganizacionales = $row_pcorg["corganizacionales"]== 1 ? '<tr><td colspan="2">Consumidores organizacionales del mercado</td><td></td></tr>' : '';
		$ciom = $row_pcorg["ciom"]== 1 ? '<tr><td colspan="2">Consumidores individuales de otros mercados</td><td></td></tr>' : '';
		$coom = $row_pcorg["coom"]== 1 ? '<tr><td colspan="2">Consumidores organizacionales de otros mercados</td><td></td></tr>' : '';
		$otrosgreferencia = $row_pcorg["otrosgreferencia"];

		$greferencia = $asesores.$competidoras.$otrosmercados.$cindividuales.$corganizacionales.$ciom.$coom;

		$asgremial = $row_pcorg["asgremial"]== 1 ? '<tr><td colspan="2">Asociaciones del Sector Gremial</td><td></td></tr>' : '';
		$aspatronal = $row_pcorg["aspatronal"]== 1 ? '<tr><td colspan="2">Sus colegas (homologos profesionales o de oficio)</td><td></td></tr>' : '';
		$colegio = $row_pcorg["colegio"]== 1 ? '<tr><td colspan="2">Sus companeros gremiales</td><td></td></tr>' : '';
		$sindicatos = $row_pcorg["sindicatos"]== 1 ? '<tr><td colspan="2">Sus companeros patronales</td><td></td></tr>' : '';
		$cindustria = $row_pcorg["cindustria"]== 1 ? '<tr><td colspan="2">Sus companeros de partido politico</td><td></td></tr>' : '';
		$aliados = $row_pcorg["aliados"]== 1 ? '<tr><td colspan="2">Sus companeros de alguna asociacion o circulo al que pertenezca </td><td></td></tr>' : '';
		$gpertenencia = $asgremial.$aspatronal.$colegio.$sindicatos.$cindustria.$aliados;



		$frecuenciacompra = array('','diariamente','semanalmente','quincenalmente','mensualmente','bimestralmente','trimestralmente','semestralmente','anualmente');
		$vacescolares = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvaces"].'</td></tr>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvaces"].'</td>');
		$vacverano = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacve"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacve"].'</td>');		
		$vacinvierno = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacna"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacna"].'</td>');		
		$vachalloween = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacha"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacha"].'</td>');		
		$vacfinano = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacfa"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacfa"].'</td>');
		$vaccarnaval = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacca"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacca"].'</td>');
		$vacacciongracias = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacag"].'</td>','<td>Reduce el consumo</td><td>'.$row_pcorg["pvacag"].'</td>');		
		$vacindependencia = array('','<td>Incrementa el consumo</td><td>'.$row_pcorg["pvacin"].'</td>','<tr><td>Reduce el consumo</td><td>'.$row_pcorg["pvacin"].'</td>');

		$frecuenciauso = array('','diariamente','semanalmente','quincenalmente','mensualmente','bimestralmente','trimestralmente','semestralmente','anualmente', $otrafuso);
		$lugar = array('','Tiendas especializadas','farmacias','supermercados','ferreterias','panaderias','despacho a destino','almacenes de la empresa','consecionario','proveedor exclusivo','expendio de licores','centros comerciales','boutiques','tiendas por departamentos');
		$unidad = array('','Total de Unidades','Total Libras','Total Kilogramos','Total Toneladas','Total Litros','Total Galones', $row_pcorg["otraunidad"]);
		$cantidad = $row_pcorg["cantidad"];

		$edad = array('','de 18 a 40','de 41 a 60','de 61 a 75','Mas de 75','No sabe / No contesta');
		$genero = array('','Hombre','Mujer','No sabe / No contesta');
		$rango = array('','Operador - Obrero','Asistente o auxiliar','Jefe o capataz','Supervisor','Coordinador','Subgerente','Gerente','Vice-Presidente','Presidente','No sabe / No contesta');
		$departamento = array('','Incrementa el consumo','Reduce el consumo');
		$fidelidad = array('','Son sumamente fieles a su marca de preferencia','Tienden a ser fieles a su marca en la mayoria de los casos','Tienden a probar varias marcas en la mayoria de los casos','Siempre prueban otras marcas','No sabe / no contesta');


		$tabla_org = '<table class="pconsumidor">
		<tr>
			<th colspan="3" class="mh">CONSUMIDOR ORGANIZACIONAL</th>
		</tr>
		<tr>
			<th colspan="3" class="pgh">Perfil geografico</th>
		</tr>
		<tr>
			<th>Tipo de Zona</th>
			<td colspan="2">'.$zona[$row_pcorg["zona"]].'</td>
		</tr>
		<tr>
			<th>Tipo de clima de la zona</th>
			<td colspan="2">'.$clima[$row_pcorg["clima"]].'</td>
		</tr>';
		if($row_pcorg["clima"] == 1){
			$tabla_org .= '<tr>
			<th>Primavera</th>
			<td colspan="2">'.$consumo[$row_pcorg["temp1"]].'</td>
			</tr>
			<tr>
				<th>Verano</th>
				<td>'.$consumo[$row_pcorg["temp2"]].'</td>
			</tr>
			<tr>
				<th>Otono</th>
				<td>'.$consumo[$row_pcorg["temp3"]].'</td>
			</tr>
			<tr>
				<th>Invierno</th>
				<td>'.$consumo[$row_pcorg["temp4"]].'</td>
			</tr>';
		}else if ($row_pcorg["clima"] == 2){
			$tabla_org .= '<tr>
			<th>Lluvias</th>
			<td colspan="2">'.$consumo[$row_pcorg["temp1"]].'</td>
			</tr>
			<tr>
				<th>Sequias</th>
				<td colspan="2">'.$consumo[$row_pcorg["temp2"]].'</td>
			</tr>';
		}
		$tabla_org .= '<tr>
			<th colspan="3" class="pdh">Perfil demografico</th>
		</tr>
		<tr>
			<th>Sector</th>
			<td colspan="2">'.$sector[$row_pcorg["sector"]].'</td>
		</tr>
		<tr>
			<th>Tamaño</th>
			<td colspan="2">'.$tamaño[$row_pcorg["tamaño"]].'</td>
		</tr>
		<tr>
			<th>Antigüedad</th>
			<td colspan="2">'.$antiguedad[$row_pcorg["antiguedad"]].'</td>
		</tr>
		<tr>
			<th>Calificacion Mano de obra</th>
			<td colspan="2">'.$calificacion[$row_pcorg["calificacion"]].'</td>
		</tr>';

		$tabla_org .= '<tr>
			<th colspan="3" class="pph">Perfil psicológico</th>
		</tr>
		<tr>
			<th>Necesidad</th>
			<td colspan="2">'.$necesidad[$row_pcorg["necesidad"]].'</td>
		</tr>
		<tr>
			<th>Motivación</th>
			<td colspan="2">'.$motivacion[$row_pcorg["motivacion"]].'</td>
		</tr>
		<tr>
			<th>Actitud</th>
			<td colspan="2">'.$actitud[$row_pcorg["actitud"]].'</td>
		</tr>
		<tr>
			<th>Actitud Competitiva</th>
			<td colspan="2">'.$acompetitiva[$row_pcorg["acompetitiva"]].'</td>
		</tr>
		<tr>
			<th>Personalidad</th>
			<td colspan="2">'.$rasgos.'</td>
		</tr>';	


		$tabla_org .= '<tr>
			<th colspan="3" class="psh">Perfil sociocultural</th>
		</tr>
		<tr>
			<th colspan="2">Factores culturales con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$fculturales.'
		<tr>
			<th colspan="2">Factores subculturales con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$fsubculturales.'
		<tr>
			<th colspan="2">Grupos de referencia con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$greferencia.'
		<tr>
			<th colspan="2">Grupos de pertenencia con mucha influencia</th>
			<th>Comentarios</th>
		</tr>
		'.$gpertenencia.'';

		$tabla_org .= '<tr>
			<th colspan="3" class="pch">Perfil conductual</th>
		</tr>
		<tr>
			<th>Frecuencia de compra</th>
			<td colspan="2">'.$frecuenciacompra[$row_pcorg["frecuenciacompra"]].'</td>
		</tr>
		<tr>
			<th>Frecuencia de uso</th>
			<td colspan="2">'.$frecuenciauso[$row_pcorg["frecuenciauso"]].'</td>
		</tr>
		<tr>
			<th>Lugar de compra</th>
			<td colspan="2">'.$lugar[$row_pcorg["lugar"]].'</td>
		</tr>
		<tr>
			<th>Numero de productos x compra</th>
			<td colspan="2">'.$unidades[$row_pcorg["unidades"]].'</td>
		</tr>
		<tr>
			<th>Temporadas</th>
			<th>Comportamiento de consumo</th>
			<th>Porcentaje de variación</th>
		</tr>'.$comp_consumo.'</table>
		<table>
		<tr><th colspan="5">Perfiles de consumo</th></tr>
		<tr>
			<th>Perfil según ROL de consumo	</th>
			<th>Edad</th>
			<th>Genero</th>
			<th>Cargo</th>
			<th>Departamento</th>
		</tr>
		<tr>
			<th>Usuario</th>
			<td>'.$edad[$row_pcorg["edadusuario"]].'</td>
			<td>'.$genero[$row_pcorg["generousuario"]].'</td>
			<td>'.$cargo[$row_pcorg["cargousuario"]].'</td>
			<td>'.$departamento[$row_pcorg["departamentouso"]].'</td>
		</tr>
		<tr>
			<th>Influenciador</th>
			<td>'.$edad[$row_pcorg["edadinfluencia"]].'</td>
			<td>'.$genero[$row_pcorg["generoinfluencia"]].'</td>
			<td>'.$cargo[$row_pcorg["cargoinfluencia"]].'</td>
			<td>'.$departamento[$row_pcorg["departamentoinfluencia"]].'</td>
		</tr>
		<tr>
			<th>Decisor</th>
			<td>'.$edad[$row_pcorg["edadcomprador"]].'</td>
			<td>'.$genero[$row_pcorg["generocomprador"]].'</td>
			<td>'.$cargo[$row_pcorg["cargocomprador"]].'</td>
			<td>'.$departamento[$row_pcorg["departamentocompra"]].'</td>
		</tr>
		<tr>
			<th colspan="1">Fidelidad</th>
			<td colspan="4">'.$fidelidad[$row_pcorg["fidelidad"]].'</td>
		</tr>
		</table>';

	}

	if($_SESSION["t_consumidor"] == 1){
		$tablas = $tabla_ind;
	} else if($_SESSION["t_consumidor"] == 2){
		$tablas = $tabla_org;
	}if($_SESSION["t_consumidor"] == 3){
		$tablas = $tabla_ind.$tabla_org;
	}

?>

<?php get_header(); ?>

	<!-- Section -->
	<section class="reporte mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>

		<?php get_template_part('heading-reportes'); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>
		
			<?php echo $tablas; ?>
			
			<br class="clear">
			
		</article>
		<!-- /Article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
	
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>