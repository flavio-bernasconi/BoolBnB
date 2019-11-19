<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sponsorizzazioni</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/menu.css')}}">

</head>

<body>
  @include('layouts.menu2')


  @yield('menu')


  <div style="max-width:1140px;margin:auto;margin-top:40px">
    <h3>Stai mettendo in evidenza l'appartamento "{{$title}}" per {{$ore}} al costo di {{$costo}} €</h3>
  </div>
  <input type="hidden"  id="flatid"name="flatid" value="{{$flat_id}}">
  <input type="hidden" id="costo"name="costo" value="{{$costo}}">
  <div class="container">
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
         <div id="dropin-container"></div>
         <button id="submit-button">Paga ora</button>
       </div>
     </div>
  </div>

  <script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{ Braintree_ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {

          $.get('{{ route('paymentMake') }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
              window.setTimeout(function () {
                var costo =document.getElementById('costo').value;
                var flatid=document.getElementById('flatid').value;
                location.href = "/paymentStore/"+flatid+"/"+costo;
              }, 100);
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });
  </script>
</body>
</html>
