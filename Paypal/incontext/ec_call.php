<?php /* Template Name: Paypal Pay */
	require('constants.php');
	require('Functions.php');
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
		."&returnurl=http://www.themarketingplanner.com/wp-content/themes/tmp-theme/Paypal/incontext/ec_return.php"
		."&cancelurl=http://www.themarketingplanner.com/wp-content/themes/tmp-theme/Paypal/incontext/ec_incontext.php"
		."&localecode=US"
		."&SOLUTIONTYPE=Sole"
		."&method=SetExpressCheckout"
		."&version=76.0"	
		."&paymentrequest_0_currencycode=USD"
		."&paymentrequest_0_amt=34"
		."&paymentrequest_0_custom=wc_order_5359dcc2eee4f"
		."&paymentrequest_0_desc=Payment for Order #888"
		."&paymentrequest_0_paymentaction=Sale"
		."&L_PAYMENTREQUEST_0_NAME0=dsadsad "
		."&L_PAYMENTREQUEST_0_QTY0=1"
		."&L_PAYMENTREQUEST_0_AMT0=34";
		$response = RunAPICall($nvpset); 
		$tok = $response['TOKEN'];
		$payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$tok;
		header("Location:".$payPalURL);
	}
?>
