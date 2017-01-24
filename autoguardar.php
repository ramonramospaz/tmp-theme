<?php
	session_start();
	$aditionalTime=strtotime("+20 minute");
	$_SESSION['BusyTime'] = date("h:i:s", $aditionalTime);
	include("config/conexion.php");	
	$find = array("'",'"','/','[',']','/*','*/','//','´');
	$tabla = str_replace($find, '', $_POST["tabla"]);
	$campo = str_replace($find, '', $_POST["campo"]);
	$valor = str_replace($find, '', $_POST["valor"]);
	$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."'";
	$query_consulta = mysqli_query($conexion, $Query);
	if(mysqli_num_rows($query_consulta) > 0){
		//echo "UPDATE wp_tmp_". $tabla ." SET ". $campo ." = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."'";
		$query_guardar = mysqli_query($conexion, "UPDATE wp_tmp_". $tabla ." SET ". $campo ." = '". $valor ."' WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."'");
	} else {
		//echo "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, ". $campo .") VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $valor ."')";
		$query_guardar = mysqli_query($conexion, "INSERT INTO wp_tmp_". $tabla ." (solicitud_id, ". $campo .") VALUES('". $_SESSION["tmp_id_solicitud"] ."', '". $valor ."')");
	}
?>