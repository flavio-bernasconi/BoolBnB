<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('sdk/map.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">


    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/singleFlat.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>

  </head>
  <body>
    @include('layouts.menu2')

    @yield('menu')


    <div class="profile-container">
      @auth
        @if ($singleFlat -> user_id === Auth::user()->id)
          <div class="sidebar">
                <a class="btn" href="{{ route('indexPayment', $singleFlat -> id)}}">Sponsor Flat</a><br>
                <a class="btn-update" href="{{ route('editFlat', $singleFlat -> id)}}">Update Flat</a><br>
                <a class="btn-delete" href="{{ route('deleteFlat', $singleFlat -> id)}}">Delete Flat</a><br>
              <a href="../profile/{{Auth::user()->id}}" class="mb-5">Back</a>
          </div>
        @endif

      @endauth


      <div class="content single-flat">
        <div class="hero" style="background-image:url('../img/{{$singleFlat -> detail -> img}}')">
            {{-- <img src="../img/{{$singleFlat -> detail -> img}}"> --}}
        </div>
        <div class="flats-list">
          <div class="">
            <div class="intro">
                <h1>{{$singleFlat -> detail -> title}}</h1>
                <input type="hidden"  id="titlemarker" name="" value="{{$singleFlat ->detail ->title}}">
                <p>{{$singleFlat -> address -> city}}</p>
            </div>
            <h3 class="section-title">Details</h3>
            <ul class="details">
              <li>
                <p>rooms</p>
                <p>{{$singleFlat -> detail -> num_room}}</p>
              </li>
              <li>
                <p>bed</p>
                <p>{{$singleFlat -> detail -> bed}}</p>
              </li>
              <li>
                <p>bathroom</p>
                <p>{{$singleFlat -> detail -> bathroom}}</p>
              </li>
              <li>
                <p>Area</p>
                <p>{{$singleFlat -> detail ->mq}} <span>m2</span></p>
              </li>
            </ul>

            <h3 class="section-title">Address</h3>
            <ul class="address">
              <li>
                <h2>City</h2>
                <p>{{$singleFlat -> address ->city}}</p>
              </li>
              <li>
                <h2>Road</h2>
                <p>{{$singleFlat -> address ->road}}</p>
              </li>
              <!--input text for get value for script js style=display:none-->
              <input type="text" id="lat" value="{{$singleFlat -> address ->lat}}"style="display:none">
              <input type="text" id="lon" value="{{$singleFlat -> address ->lon}}"style="display:none">
              <input type="text"id="addrss" value="{{$singleFlat -> address->road}}"style="display:none">
              <input type="text"id="city" value="{{$singleFlat -> address->city}}"style="display:none">
              <input type="text"id="civ_num"value="{{$singleFlat -> address->civ_num}}"style="display:none">
            </ul>
          </div>


          @include('layouts.msgform')

          <div id="map" class="mappa map"></div>



        </div>




      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>

    <script type="text/javascript">

      $(document).ready(function(){
        console.log("init");
        //get value for marker info
        var latiVal = $("#lat").val();
        var longVal = $("#lon").val();
        var address= $("#addrss").val();
        var city = $("#city").val();
        var civ_num = $("#civ_num").val();
        var title = document.getElementById('titlemarker').value;


        //create a map
        var map = tomtom.L.map('map', {
        key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy",
        basePath: 'sdk/',
        zoom: 40,
        center: [latiVal, longVal]
        });
        //add marker in position[latiVal,longVal]

        var marker = tomtom.L.marker([latiVal,longVal]).addTo(map);
        marker.bindPopup(title + " " + city + " " + address + " " +
        "N." + civ_num );

      });
    </script>


  </body>
</html>
