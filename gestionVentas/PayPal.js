paypal
  .Buttons({
    style: {
      color: 'blue',
      shape: 'pill',
      //align: center,
    },
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: '0.1',
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        console.log(details);
        window.location.href('./menuProd.php');
      });
    },
    onCancel: function (data) {
      window.location.href('./menuProd.php');
    },
  })
  .render('#paypal-payment-button');
