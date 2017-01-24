<?php

session_start();

include("config/conexion.php");  

	$correo = $_POST['email'];

	$contrasena = md5($_POST['clave']);

	$query_login = mysqli_query($conexion, "SELECT bssid, bssuser, bssemail FROM wp_tmp_bssadmin WHERE bssemail = '". $correo ."' AND bsspassword = '". md5($contrasena) ."'");

	if(mysqli_num_rows($query_login) > 0){

		$row_login = mysqli_fetch_assoc($query_login);

		$_SESSION["tmp_admin_id_bss"] = $row_login["bssid"];

		$_SESSION["tmp_admin_user_bss"] = $row_login["bssuser"];

		$_SESSION["tmp_admin_email_bss"] = $row_login["bssemail"];

		echo '1';

	} else {

		echo '0';

	}

?>