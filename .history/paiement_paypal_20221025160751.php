<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>
<body>
    

<h1>
    Paiement paypal
</h1>

<div id="paypal-button-container">

</div>

<!--Button Paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=test"></script>
<script>paypal.Buttons().render('#paypal-button-container');</script>


</body>
</html>