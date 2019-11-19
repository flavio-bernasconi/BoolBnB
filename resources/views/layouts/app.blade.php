<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/menu.css')}}">
  </head>
  <body>
    @include('layouts.menu2')
    @yield('menu')
      <main class="">
          @yield('content')
      </main>
  </body>
</html>
