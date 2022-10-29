paypal.Buttons({ 
    createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '10.0' // Can also reference a variable or function
            }
          }]
        });
      },onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          // Successful capture! For dev/demo purposes:  
          alert('Transaction completed by ' + details.payer.name.given_name);
}).render('#paypal-button-container');