<?php /* Template Name: Solicitar */ 
	session_start();
	ob_start();
	//$conexion = mysqli_connect("localhost","i1380332_wp1","E@s9P*DJy&63^[0","i1380332_wp1");
	include("config/conexion.php");	
	if(is_numeric($_GET["serv"])){ 		
		if(isset($_GET["serv"]) && !empty($_GET["serv"])){
			$_SESSION["sid"] = $_GET["serv"]; 
			$_SESSION["tmp_id_servicio"] = $_GET["serv"];
			$Query = "select * from wp_tmp_solicitud where servicio_id='".$_SESSION["tmp_id_servicio"]."' and usuario_id='".$_SESSION["tmp_id_user"]."' and status <> '99'";
			$query_solicitud = mysqli_query($conexion,$Query);
			if(mysqli_num_rows($query_solicitud) > 0){
				$row = mysqli_fetch_assoc($query_solicitud);
				$_SESSION["tmp_id_solicitud"] = $row['id_solicitud'];
				unset($_SESSION['payment_solicitud_id']);
				unset($_SESSION['payment_servicio_id']);
				unset($_SESSION['payment_user_id']);
				unset($_SESSION['payment_nombre_servicio']);
				unset($_SESSION['payment_precio_servicio']);
				unset($_SESSION['payment_promo_cod']);
				unset($_SESSION['payment_promo_discount']);
				unset($_SESSION['payment_amount']);	
			}else{
				if(isset($_SESSION["tmp_id_user"]) && isset($_SESSION["tmp_user_nombre"]) && isset($_SESSION["tmp_user_email"])){
					$p = 'p='.$_SESSION["tmp_id_servicio"];
					query_posts($p);
						if (have_posts()): while (have_posts()) : the_post();
							$_SESSION['payment_solicitud_id'] = $_SESSION["tmp_id_solicitud"];
							$_SESSION['payment_servicio_id'] = $_SESSION["tmp_id_servicio"];
							$_SESSION['payment_user_id'] = $_SESSION["tmp_id_user"];
							$_SESSION['payment_nombre_servicio'] = get_the_title();
							$_SESSION['payment_precio_servicio'] = get_field('precio');
							$_SESSION['payment_promo_cod'] = "";
							$_SESSION['payment_promo_discount'] = "0";
							$_SESSION['payment_amount'] = $_SESSION['payment_precio_servicio'];
						endwhile;
					endif;
				} 
			}
		} else {
			$_SESSION["sid"] = 0;
		}
		if(($_SESSION["sid"] != 49) && ($_SESSION["sid"] != 141)){
			$_SESSION["disable"] = 0;
		} else {		
			$_SESSION["disable"] = 1;
		}
		if($_SESSION["sid"] == 37){
			$_SESSION["disablecon"] = 1;
		} else {		
			$_SESSION["disablecon"] = 0;
		}
		header("Location: ../login");
	} else {
		header("Location: ../inicio"); 
		$_SESSION["Si"] = 'SI';
	}
	ob_end_flush();
?>