<?php /* Template Name: Ver Reporte */
	session_start();
	ob_start();
	include("config/conexion.php");
	if(isset($_GET["sol"]) && !empty($_GET["sol"])){
		if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"])){
			$query_solicitud = mysqli_query($conexion, "SELECT servicio_id, status, tipop, tbase FROM wp_tmp_solicitud INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE wp_tmp_solicitud.id_solicitud = '".$_GET["sol"]."'") or die(mysqli_error($conexion));
			if(mysqli_num_rows($query_solicitud) > 0){
				$row_solicitud = mysqli_fetch_assoc($query_solicitud);
				$_SESSION["tmp_id_solicitud"] = $_GET["sol"];
				$_SESSION["tmp_id_servicio"] = $row_solicitud["servicio_id"];
				$_SESSION["sid"] = $row_solicitud["servicio_id"];
				$_SESSION["tmp_status"] = $row_solicitud["status"];
				$_SESSION["tmp_t_producto"] = $row_solicitud["tipop"];
				$_SESSION["tmp_t_consumidor"] = $row_solicitud["tbase"];
				if(($_SESSION["tmp_id_servicio"] != 49) || ($_SESSION["tmp_id_servicio"] != 141)){
					$_SESSION["disable"] = 0;
				} else {		
					$_SESSION["disable"] = 1;
				}
				if($_SESSION["tmp_id_servicio"] == 37){
					$_SESSION["disablecon"] = 1;
				} else {		
					$_SESSION["disablecon"] = 0;
				}
				$query_reporte = mysqli_query($conexion, "select * from wp_tmp_serviciosreportes where servicio_id='".$_SESSION["tmp_id_servicio"]."'") or die(mysqli_error($conexion));
                if(mysqli_num_rows($query_reporte) > 0){
                    $row_reporte = mysqli_fetch_assoc($query_reporte);
                    header("Location: ../".$row_reporte["reporte"]);
                }
			} else{
				$query_solicitud = mysqli_query($conexion, "SELECT servicio_id, status FROM wp_tmp_solicitud INNER JOIN wp_tmp_briefing ON wp_tmp_solicitud.id_solicitud = wp_tmp_briefing.solicitud_id WHERE wp_tmp_solicitud.id_solicitud = '".$_GET["sol"]."'") or die(mysqli_error($conexion));
			}
		}
	} 
	ob_end_flush();
?>