<?php
	session_start();
	$aditionalTime=strtotime("+20 minute");
	$_SESSION['BusyTime'] = date("h:i:s", $aditionalTime);
	include("config/conexion.php");
	$find = array("'",'"','/','[',']','/*','*/','//','´');
	$tabla = str_replace($find, '', $_POST["tabla"]);
	$pregunta = str_replace($find, '', $_POST["campo"]);
	$valor = str_replace($find, '', $_POST["valor"]);
	switch($tabla){
		case 'creaccion':
			$Column = "";
			$PreguntaSplit = explode('_',$pregunta);
			$pregunta = $PreguntaSplit[1];
			switch($valor[0]){
				case '1':
					$Column = "creal";
					break;
				case '2':
					$Column = "cmotivacional";
					break;
			}
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '".$pregunta."'");
			if(mysqli_num_rows($query_consulta) > 0){	
				$query_guardar = mysqli_query($conexion, "UPDATE wp_tmp_". $tabla ." SET ".$Column." = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '". $pregunta ."'");
			} else {
				$query_guardar = mysqli_query($conexion, "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, pregunta_id, ".$Column.") VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $pregunta ."', '". $valor ."')");
			}
			break;
		case 'eccs':
			$row = $_POST['row'];
			$Query = "SELECT * FROM wp_tmp_preguntasusuarios WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND row = '".$row."'AND usuario_id='".$_SESSION["tmp_id_user"]."'";
			$query_consulta = mysqli_query($conexion,$Query);
			if(mysqli_num_rows($query_consulta) > 0){	
				switch($pregunta){
					case 'eccs':
						$Query = "UPDATE wp_tmp_preguntasusuarios SET pregunta = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND row = '". $row."' AND usuario_id='".$_SESSION["tmp_id_user"]."'";
						$query_guardar = mysqli_query($conexion, $Query);
						echo "1";
						break;
					default:
						$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND row = '".$row."'";
						$query_consulta = mysqli_query($conexion,$Query);
						if(mysqli_num_rows($query_consulta) > 0){
							$Query = "UPDATE wp_tmp_". $tabla ." SET respuesta = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND row = '". $row."'";
							$query_guardar = mysqli_query($conexion, $Query);
							echo "1";
						}else{
							$Query = "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, row, pregunta_id, respuesta) VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $row."', '".$pregunta."', '". $valor."')";
							$query_guardar = mysqli_query($conexion, $Query);
							echo "1";
						}
						break;
				}
			} else {
				switch($pregunta){
					case 'eccs':
						$Query = "INSERT INTO wp_tmp_preguntasusuarios (solicitud_id, usuario_id, cuestionario, row, pregunta) VALUES('". $_SESSION["tmp_id_solicitud"] ."', '".$_SESSION["tmp_id_user"]."', '0', '". $row."', '". $valor."')";
						$query_guardar = mysqli_query($conexion, $Query);
						$array["Result"] = "1";
						$array["pregunta"] = mysqli_insert_id($conexion);
						$array["rowActual"] = $row;
						$array["nextRow"] = $row + 1;
						echo json_encode($array);
						break;
					default:
						echo "0";
						break;
				}
			}
			break;
		case 'confiabilidad':
		case 'tangibilidad':
		case 'cortesia':
		case 'empatia':
		case 'excepciones':
		case 'informacion':
		case 'consultoria':
		case 'capacidadrespuesta':
		case 'competencias':
		case 'credibilidad':
		case 'custodia':
		case 'garantias':
		case 'proximidad':
		case 'tiempoespera':
		case 'localizacion':
		case 'horarios':
			$tablaTemp = $tabla;
			$CuestionarioCampo = "";
			$CuestionarioValor = "";
			$CuestionarioWhere = "";
			$eccs = $_POST['eccs'];
			$ArrayPregunta = explode("_",$pregunta);
			$pregunta = $ArrayPregunta[1];
			switch($eccs){
				case 'eccs':
					switch($ArrayPregunta[0]){
						case 'cds':
							$tabla = "cdproductoeccs";
							break;
						case 'cdc':
							$tabla = "cdcompetenciaeccs";
							break;
						case 'vc':
							$tabla = "vcproductoeccs";
							break;
					}
					$pregunta = substr($pregunta,0,strlen($pregunta) - 1);
					$CuestionarioCampo = ", cuestionario";
					$CuestionarioValor = ",'".$tablaTemp."'";
					$CuestionarioWhere = "AND cuestionario = '".$tablaTemp."'";
					break;
				default:
					switch($ArrayPregunta[0]){
						case 'cds':
							$tabla = "cdproducto";
							break;
						case 'cdc':
							$tabla = "cdcompetencia";
							break;
						case 'vc':
							$tabla = "vcproducto";
							break;
					}
					break;
			}
			$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '".$pregunta."' ".$CuestionarioWhere;
			$query_consulta = mysqli_query($conexion,$Query);
			if(mysqli_num_rows($query_consulta) > 0){	
				$Query = "UPDATE wp_tmp_". $tabla ." SET respuesta = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '". $pregunta ."' ".$CuestionarioWhere;
				$query_guardar = mysqli_query($conexion, $Query);
			} else {
				$Query = "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, pregunta_id, respuesta".$CuestionarioCampo.") VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $pregunta ."', '". $valor ."'".$CuestionarioValor.")";
				$query_guardar = mysqli_query($conexion, $Query);
			}
			break;
		default:
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '".$pregunta."'");
			if(mysqli_num_rows($query_consulta) > 0){	
				$query_guardar = mysqli_query($conexion, "UPDATE wp_tmp_". $tabla ." SET respuesta = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."' AND pregunta_id = '". $pregunta ."'");
			} else {
				$query_guardar = mysqli_query($conexion, "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, pregunta_id, respuesta) VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $pregunta ."', '". $valor ."')");
			}
			break;
	}
	
?>