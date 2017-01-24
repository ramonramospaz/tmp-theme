 <!DOCTYPE HTML>
    <html>
    <head>
    
    </head>
    <body>
     <form id="myContainer" method="post" action="/paypal-pay" accept-charset="UTF-8"></form>
         <script>
            window.paypalCheckoutReady = function() {
                paypal.checkout.setup('T8USCJG8M2MG8', {
                    container: 'myContainer', 
                    environment: 'sandbox'
                    // button: 'incontext_id'
                });
            }
        </script>
    </body>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
</html>



<?php
session_start();
    $nvpset= $nvps
		."&returnurl=http://www.themarketingplanner.com/paypal-return"
		."&cancelurl=http://www.themarketingplanner.com/wp-content/themes/tmp-theme/Paypal/incontext/ec_incontext.php"
		."&localecode=US"
		."&SOLUTIONTYPE=Sole"
		."&method=SetExpressCheckout"
		."&version=76.0"	
		."&paymentrequest_0_currencycode=USD"
		."&paymentrequest_0_amt=".trim($_SESSION['payment_precio_servicio'])
		."&paymentrequest_0_custom=wc_order_5359dcc2eee4f"
		."&paymentrequest_0_desc=".trim($_SESSION['payment_nombre_servicio'])
		."&paymentrequest_0_paymentaction=Sale"
		."&L_PAYMENTREQUEST_0_NAME0=".trim($_SESSION['payment_nombre_servicio'])
		."&L_PAYMENTREQUEST_0_QTY0=1"
		."&L_PAYMENTREQUEST_0_AMT0=".trim($_SESSION['payment_precio_servicio']);
$file = fopen("archivo.txt", "w");
fwrite($file, $nvpset);
fclose($file);
?>