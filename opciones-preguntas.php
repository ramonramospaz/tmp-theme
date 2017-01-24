<?php
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
?>