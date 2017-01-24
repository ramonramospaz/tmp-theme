<?php

session_start();

include("config/conexion.php");  

$correo = $_POST['email'];

$contrasena = md5($_POST['clave']);

$query_login = mysqli_query($conexion, "SELECT id_tmp_user, tmp_nombre, tmp_apellido, tmp_email, status FROM wp_tmp_users WHERE tmp_email = '". $correo ."' AND password = '". $contrasena ."'");

if(mysqli_num_rows($query_login) > 0){

		$row_login = mysqli_fetch_assoc($query_login);

		$_SESSION["tmp_id_user"] = $row_login["id_tmp_user"];

		$_SESSION["tmp_user_nombre"] = $row_login["tmp_nombre"];

		$_SESSION["tmp_user_apellido"] = $row_login["tmp_apellido"]; 

		$_SESSION["tmp_user_email"] = $row_login["tmp_email"];

		$_SESSION["tmp_user_status"] = $row_login["status"];

		$query_solicitud = mysqli_query($conexion, "SELECT id_solicitud, servicio_id, status FROM wp_tmp_solicitud WHERE usuario_id = '". $_SESSION["tmp_id_user"] ."' AND status < 99");

	if(mysqli_num_rows($query_solicitud) > 0){

		$row_solicitud = mysqli_fetch_assoc($query_solicitud);

		$_SESSION["tmp_id_solicitud"] = $row_solicitud["id_solicitud"];

		$_SESSION["tmp_id_servicio"] = $row_solicitud["servicio_id"];

		$_SESSION["tmp_status"] = $row_solicitud["status"];

		$query_tipos = mysqli_query($conexion, "SELECT tipop, tbase FROM wp_tmp_briefing WHERE solicitud_id = '". $_SESSION["tmp_id_solicitud"] ."'");

		if(mysqli_num_rows($query_tipos) > 0){

			$row_tipos = mysqli_fetch_assoc($query_tipos);

			$_SESSION["tmp_t_producto"] = $row_tipos["tipop"];

			$_SESSION["tmp_t_consumidor"] = $row_tipos["tbase"];

		}

	} else {

		// No entiendo el objetivo de colocar un registro en blanco

		/*
		$_SESSION["sid"] = !empty($_SESSION["sid"]) ? $_SESSION["sid"] : 0;

		$query_nueva_solicitud = mysqli_query($conexion, "INSERT INTO wp_tmp_solicitud (usuario_id, servicio_id) VALUES ('".$_SESSION["tmp_id_user"]."','".$_SESSION["sid"]."')");
		
		$_SESSION["tmp_id_solicitud"] = mysqli_insert_id($conexion);
		*/
		$_SESSION["tmp_id_solicitud"]=0;
		
		$_SESSION["tmp_id_servicio"] = $_SESSION["sid"];

		$_SESSION["tmp_status"] = 0;
		

	}

	if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"])){

		if($_SESSION["tmp_id_servicio"] != 0){



			if($_SESSION["tmp_status"] == 0){

				echo "1";		

			} else {

				echo "2";

			}

		} else {

			echo "3";

		}



	}



} else {

	echo "0";

}



?>