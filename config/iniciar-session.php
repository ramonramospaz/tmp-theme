<?php session_start();
	if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"]) && isset($_SESSION["tmp_user_status"])){ 

	} else {
		header("Location: ../login");
	}
?>