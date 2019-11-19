<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sponsorizzazioni</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/menu.css')}}">

</head>

<body>

  @include('layouts.menu2')


  @yield('menu')

  <div  style="max-width:1140px;margin:auto;margin-top:40px;">
    <h1>Metti in mostra il tuo appartamento "{{$detail -> title}}"!</h1>
    <h3>Sponsorizzazione per 24 ore: costo € 2,99</p>
    <h3>Sponsorizzazione per 72 ore: costo € 5,99</p>
    <h3>Sponsorizzazione per 144 ore: costo € 9,99</h3>

    <br><br>

    <form action="{{Route('pagamento')}}" method="post">
        @csrf
        @method('POST')

        <label for="costo" style="font-size:24px">Scegli per quante ore vuoi mettere in evidenza l'appartamento</label>
          <select name="costo" style="font-size:24px">
            <option value="2.99">24 ore</option>
            <option value="5.99">72 ore</option>
            <option value="9.99">144 ore</option>
          </select>

        <label for="name"></label>
        <input type="hidden" name="name" required value="{{$user -> name}}">

        <label for="id"></label>
        <input type="hidden" name="id" required value="{{$user -> id}}">

        <label for="title"></label>
        <input type="hidden" name="title" required value="{{$detail -> title}}">
        <input type="hidden" name="flatid" value="{{$id}}">
        <button type="submit">Prosegui col pagamento</button>
    </form>

  </div>

</body>
</html>
