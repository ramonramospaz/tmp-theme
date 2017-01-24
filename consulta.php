<?php
	session_start();
	include("config/conexion.php");	
	$tabla = $_POST["tabla"];
	$Query = "SELECT * FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'";
	$query_consulta = mysqli_query($conexion, $Query);
	if(mysqli_num_rows($query_consulta) > 0){

		$row_consulta = mysqli_fetch_assoc($query_consulta);
		echo json_encode($row_consulta);

	} else {

		echo "1";

	}
?>