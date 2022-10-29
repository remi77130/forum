paypal.Buttons({ 
    createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '77.44' // Can also reference a variable or function
            }
          }]
        });
      }
}).render('#paypal-button-container');