<?php

	session_start();

	include("config/conexion.php"); 

	$nombre = $_POST['Nombre'];

	$apellido = $_POST['Apellido'];

	$correo = $_POST['Correo'];

	$contrasena = md5($_POST['Contrasena']);

	$query_verificar = mysqli_query($conexion, "SELECT tmp_nombre  FROM wp_tmp_users WHERE tmp_email = '". $correo ."'");

	if(mysqli_num_rows($query_verificar) > 0){
		echo "0";
	} else {

	$query_login = mysqli_query($conexion, "INSERT INTO wp_tmp_users(tmp_nombre, tmp_apellido, tmp_email, password) VALUES('". $nombre ."','". $apellido ."','". $correo ."','". $contrasena ."')");

		//$errno = mysqli_errno($conexion);

		$Query = "select * from wp_tmp_users where tmp_email = '".$correo."'";

		$query_user = mysqli_query($conexion,$Query);

		//if($errno == 0){
		if(mysqli_num_rows($query_user) > 0){


			$_SESSION["tmp_id_user"] = mysqli_insert_id($conexion);

			$_SESSION["tmp_user_nombre"] = $nombre;

			$_SESSION["tmp_user_apellido"] = $apellido; 

			$_SESSION["tmp_user_email"] = $correo;

			$_SESSION["tmp_user_status"] = "0";



			$_SESSION["sid"] = !empty($_SESSION["sid"]) ? $_SESSION["sid"] : 0;


			if($_SESSION["sid"] > 0){
				
				$query_nueva_solicitud = mysqli_query($conexion, "INSERT INTO wp_tmp_solicitud (usuario_id, servicio_id) VALUES ('".$_SESSION["tmp_id_user"]."','".$_SESSION["sid"]."')");

				$_SESSION["tmp_id_solicitud"] = mysqli_insert_id($conexion);

				$_SESSION["tmp_id_servicio"] = $_SESSION["sid"];

				$_SESSION["tmp_status"] = 0;

				echo "1";

			}else{
				echo "3";
			}
		}else {
			echo "2";
		}
	}



?>