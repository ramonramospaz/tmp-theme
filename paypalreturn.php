<?php /* Template Name: Paypal Return */
	session_start();
	require('Paypal/constants.php');
	require('Paypal/Functions.php');
	require('config/conexion.php');

	$url = "https://api-3t.sandbox.paypal.com/nvp";
	$nvps = 
        "&USER=$user"
        ."&PWD=$password"
        ."&SIGNATURE=$signature";


	$token = $_GET['token'];
	$PayerID = $_GET['PayerID'];

	$nvpset= $nvps."&localecode=US"
		."&SOLUTIONTYPE=Sole"
		."&method=DoExpressCheckoutPayment"
		."&token=$token"
		."&payerid=$PayerID"
		."&version=76.0"	
		."&paymentrequest_0_currencycode=USD"
		."&paymentrequest_0_amt=".$_SESSION['payment_amount']
		//."&paymentrequest_0_custom=wc_order_5359dcc2eee4f"
		."&paymentrequest_0_desc=".$_SESSION['payment_nombre_servicio']
		."&paymentrequest_0_paymentaction=Sale"
		."&L_PAYMENTREQUEST_0_NAME0=".$_SESSION['payment_nombre_servicio']
		."&L_PAYMENTREQUEST_0_QTY0=1"
		//."&PAYMENTREQUEST_0_SHIPTOPHONENUM=317-533-4877"
		."&L_PAYMENTREQUEST_0_AMT0=".$_SESSION['payment_amount'];

	$response = RunAPICall($nvpset); 
	/*echo '<pre>';
	print_r($response);
	exit;*/

	if(($response["ACK"] == "SUCCESS") && ($response["PAYMENTINFO_0_ACK"] == "SUCCESS")){
		
		$Query = "insert into wp_tmp_solicitud (servicio_id, usuario_id, status) values('".$_SESSION["tmp_id_servicio"]."','".$_SESSION["tmp_id_user"]."', 2)";
		$query_solicitud = mysqli_query($conexion, $Query);
		$_SESSION["tmp_id_solicitud"] = mysqli_insert_id($conexion);

		$Query = "insert into wp_tmp_briefing (solicitud_id) values('".$_SESSION["tmp_id_solicitud"]."')";
		$query_solicitud = mysqli_query($conexion, $Query);

		if($_SESSION['payment_promo_discount'] > 0){
			$Query = "update wp_tmp_codpromo set status='1' where codigo = '".$_SESSION['payment_promo_cod']."'";
			$query_codpromo = mysqli_query($conexion, $Query);
		}

		$_SESSION["tmp_id_servicio"] = $_SESSION['payment_servicio_id'];

		unset($_SESSION['payment_solicitud_id']);
		unset($_SESSION['payment_servicio_id']);
		unset($_SESSION['payment_user_id']);
		unset($_SESSION['payment_nombre_servicio']);
		unset($_SESSION['payment_precio_servicio']);
		unset($_SESSION['payment_promo_cod']);
		unset($_SESSION['payment_promo_discount']);
		unset($_SESSION['payment_amount']);

		header("Location: ../solicitud-actual");
	}

?>