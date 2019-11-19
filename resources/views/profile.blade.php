<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">


  </head>
  <body>
    @include('layouts.menu2')

    @yield('menu')

    <div class="profile-container">

      <div class="content">
        <div class="user">
            <h1>Your flats</h1>
            <div class="btn">
              <a class="btn-add" href="{{ route('addFlat')}}">Add Flat</a><br>
              <a class="btn-add" href="{{ route('edit', $user -> id) }}">Edit Profile</a><br>
              <a class="btn-add" href="{{ route('destroy', $user -> id) }}">Delete Profile</a><br>
              <a class="btn-add" href="{{ route('messageshow', $user -> id) }}">Message</a><br>
            </div>
        </div>

        <div class="flats-list">
          @foreach ($userFlat as $flat)
            <a href="{{route ('showFlat', $flat ->id)}}" class="box">
              <img src="../img/{{$flat ->detail -> img}}">
              <div class="box-sections">
                  {{-- $arrDetail = array con dentro un oggetto --}}
                      {{-- <h1>flat_id : {{$details[0] ->flat_id}}</h1> --}}
                      <h1 class="flat-title">{{$flat -> detail ->title}}</h1>
                      <div class="details">
                        <p>rooms : {{$flat -> detail ->num_room}}</p>
                        <p>bed : {{$flat -> detail ->bed}}</p>
                      </div>
                  {{-- $arrDetail = array con dentro un oggetto --}}

                  <div class="address-section">
                        <p>{{$flat -> address ->city}}</p>
                  </div>
              </div>
              <div class="rate">
                <p>{{$flat -> rate }}</p>
              </div>
            </a>
          @endforeach
        </div>
        <div class="paginate">
          {{ $userFlat -> links()}}
        </div>
      </div>
    </div>




  </body>
</html>
