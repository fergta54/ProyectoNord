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
        window.location.replace(
          'http://localhost/ProyectoNord/gestionVentas/placeOrder.php'
        );
      });
    },
    onCancel: function (data) {
      window.location.replace(
        'http://localhost/ProyectoNord/gestionVentas/Oncancel.php'
      );
    },
  })
  .render('#paypal-payment-button');
