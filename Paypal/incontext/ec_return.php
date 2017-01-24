<?php
	require('constants.php');
	require('Functions.php');
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
		."&paymentrequest_0_amt=34"
		."&paymentrequest_0_custom=wc_order_5359dcc2eee4f"
		."&paymentrequest_0_desc=Payment for Order #888"
		."&paymentrequest_0_paymentaction=Sale"
		."&L_PAYMENTREQUEST_0_NAME0=dsadsadad "
		."&L_PAYMENTREQUEST_0_QTY0=1"
		."&PAYMENTREQUEST_0_SHIPTOPHONENUM=317-533-4877"
		."&L_PAYMENTREQUEST_0_AMT0=34";

	$response = RunAPICall($nvpset); 
	echo '<pre>';
	print_r($response);
	exit;
?>