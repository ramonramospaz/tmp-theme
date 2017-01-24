<?php /* Template Name: Paypal Pay */
	session_start();
	require('Paypal/constants.php');
	require('Paypal/Functions.php');

	$url = "https://api-3t.sandbox.paypal.com/nvp";
	$nvps = 
		"&USER=$user"
		."&PWD=$password"
		."&SIGNATURE=$signature";

	if(!isset($_REQUEST)) {
		$token = $_REQUEST['token'];
	}

	//If there's no token call SetEC
	if(!isset($token)) {  
		$nvpset= $nvps
		."&returnurl=http://www.themarketingplanner.com/paypal-return"
		."&cancelurl=http://www.themarketingplanner.com/servicios"
		."&localecode=US"
		."&SOLUTIONTYPE=Sole"
		."&method=SetExpressCheckout"
		."&version=76.0"	
		."&paymentrequest_0_currencycode=USD"
		."&paymentrequest_0_amt=".trim($_SESSION['payment_amount'])
		."&paymentrequest_0_custom=wc_order_5359dcc2eee4f"
		."&paymentrequest_0_desc=".trim($_SESSION['payment_nombre_servicio'])
		."&paymentrequest_0_paymentaction=Sale"
		."&L_PAYMENTREQUEST_0_NAME0=".trim($_SESSION['payment_nombre_servicio'])
		."&L_PAYMENTREQUEST_0_QTY0=1"
		."&L_PAYMENTREQUEST_0_AMT0=".trim($_SESSION['payment_amount']);

		$response = RunAPICall($nvpset); 
		$tok = $response['TOKEN'];
		$payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$tok;
		header("Location:".$payPalURL);
	}
?>