<?php /* Template Name: Checked */
	session_start();

	ob_start();

	include("config/conexion.php");

	if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"])){

		$query_solicitud = mysqli_query($conexion, "UPDATE wp_tmp_solicitud SET status = '1' WHERE id_solicitud = '".$_SESSION["tmp_id_solicitud"]."'");

		$_SESSION["tmp_status"] = 1;
        $Query = "insert into wp_tmp_briefing (solicitud_id) values('".$_SESSION["tmp_id_solicitud"]."')";
        $query_briefing = mysqli_query($conexion,$Query);
		header("Location: ../briefing");

	} else {
		header("Location: ../login");
	}
	
	ob_end_flush();

?>