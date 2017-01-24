window.paypalCheckoutReady = function() {
    paypal.checkout.setup('T8USCJG8M2MG8', {
        environment: 'sandbox',
        container: 'myContainer'
    });
};