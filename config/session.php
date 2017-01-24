<?php 
	session_start();

	if(isset($_SESSION["tmp_admin_id_bss"]) && isset($_SESSION["tmp_admin_user_bss"]) && isset($_SESSION["tmp_admin_email_bss"])){ 

	} else {

		header("Location: ../reportes");

	}

?>