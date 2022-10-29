paypal.Buttons({
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: '10.00' // Can also reference a variable or function
        }
      }]
    });
  },
}).render('#paypal-button-container');