<?php
session_start();
ob_start();

require("config/conexion.php");
	unset($_SESSION["tmp_id_solicitud"]);
	unset($_SESSION["tmp_id_servicio"]);

	$_SESSION["tmp_status"] = 0;

	/*$query_nueva_solicitud = mysqli_query($conexion, "INSERT INTO wp_tmp_solicitud (usuario_id, servicio_id) VALUES ('".$_SESSION["tmp_id_user"]."','0')");

	$_SESSION["tmp_id_solicitud"] = mysqli_insert_id($conexion);*/
	echo '1';
?>