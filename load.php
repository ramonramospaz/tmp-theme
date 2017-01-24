<?php
	session_start();
	include("config/conexion.php");  
	$tabla = $_POST["tabla"];
	switch($tabla){
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
			$array = array();
			$tabla = "cdcompetencia";
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "cdc_".$row_consulta["pregunta_id"];
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			$tabla = "cdcompetenciaeccs";
			$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND cuestionario = '".$tablaTemp."'";
			$query_consulta = mysqli_query($conexion, $Query);
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "cdc_".$row_consulta["pregunta_id"]."E";
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			$tabla = "cdproducto";
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "cds_".$row_consulta["pregunta_id"];
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			$tabla = "cdproductoeccs";
			$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND cuestionario = '".$tablaTemp."'";
			$query_consulta = mysqli_query($conexion, $Query);
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "cds_".$row_consulta["pregunta_id"]."E";
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			$tabla = "vcproducto";
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "vc_".$row_consulta["pregunta_id"];
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			$tabla = "vcproductoeccs";
			$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND cuestionario = '".$tablaTemp."'";
			$query_consulta = mysqli_query($conexion, $Query);
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				do{
					$pregunta_id = "vc_".$row_consulta["pregunta_id"]."E";
					$respuesta = $row_consulta["respuesta"];
					$key = $pregunta_id;
					$array[$key] = $respuesta;
				} while($row_consulta = mysqli_fetch_assoc($query_consulta));
			}
			if(count($array) > 0){
				echo json_encode($array);
			}else{
				echo "1";
			}
			break;
		default:
			$query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
			$row_consulta = mysqli_fetch_assoc($query_consulta);
			if(mysqli_num_rows($query_consulta) > 0){
				switch($tabla){
					case 'creaccion':
						do{
							$pregunta_id = $row_consulta["pregunta_id"];
							$creal = $row_consulta["creal"];
							$cmotivacional = $row_consulta["cmotivacional"];
							$key = $pregunta_id;
							$array["creal_".$key] = $creal;
							$array["cmotivacional_".$key] = $cmotivacional;
						} while($row_consulta = mysqli_fetch_assoc($query_consulta));
						break;
					default:
						do{
							$pregunta_id = $row_consulta["pregunta_id"];
							$respuesta = $row_consulta["respuesta"];
							$key = $pregunta_id;
							$array[$key] = $respuesta;
						} while($row_consulta = mysqli_fetch_assoc($query_consulta));
						break;
				}
				echo json_encode($array);	
			} else {
				echo '1';
			}
			break;
	}
?>