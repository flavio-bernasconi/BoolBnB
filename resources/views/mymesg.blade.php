<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/menu.css')}}">

    <title></title>
  </head>
  <body>
    @include('layouts.menu2')


    @yield('menu')
    <div style="max-width:1140px;margin:auto;margin-top:40px;">
      <h1>Your Messages</h1>
    </div>
    <div class="list-message" style="display:flex;flex-wrap:wrap;padding-top:20px !important">

        @if (count($flat))
            @for ($i=0; $i < count($flat); $i++)
              <div class="single-message"style="margin:10px;">
              <h3>Message N.{{$i +1}}</h3>
              <p>For Flat:<span>{{$flat[$i]->detail ->title}}</span></p>
              @for ($j=$i; $j<=$i ; $j++)
                <p>Email: {{$messages [$j] -> email}}</p>
                <p>Messaggio: {{$messages[$j] -> msg}}</p>
              @endfor
              </div>
            @endfor

          @else
        <h1>No message</h1>
        @endif



    </div>


  </body>
</html>
