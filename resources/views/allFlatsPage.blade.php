<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <title></title>
    <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>

    <link href="{{ asset('sdk/poi.css') }}" rel="stylesheet">
    <link href="{{ asset('sdk/map.css') }}" rel="stylesheet">
    <link href="{{ asset('sdk/search-markers.css') }}" rel="stylesheet">

    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/1.0.6/SearchBox.css'>

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/allFlats.css') }}" rel="stylesheet">

    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

  </head>
  <body>

    @include('layouts.menu2')

    @yield('menu')


    <div class="centrone">
      <div class="barra">
        <div class="cerca">
          <div class="" id="map2">
          </div>
        </div>
        <div class="search-bar prima">
          <div class="services">
              @foreach ($services as $service)
                <div class="">
                  <input type="checkbox" class="checkbox" name="checkboxvar[]"  value="{{ $service -> name}}"><p>{{ $service -> name}}</p>
                </div>
              @endforeach
              <input type="hidden" id="centerx"  name="latin" value="{{$latin}}">
              <input type="hidden" id="centery"  name="lonin" value="{{$lonin}}">
              <input type="hidden" id="centery"  name="city" value="{{$city}}">

              <button type="" class="getFilters" name="button">invia</button>

          </div>
        </div>
      </div>
      <div class="barra seconda">
        <div class="search-bar ">
          <div class="services ">
              @foreach ($services as $service)
                <div class="">
                  <input type="checkbox" class="checkbox" name="checkboxvar[]"  value="{{ $service -> name}}"><p>{{ $service -> name}}</p>
                </div>
              @endforeach
              <input type="hidden" id="centerx"  name="latin" value="{{$latin}}">
              <input type="hidden" id="centery"  name="lonin" value="{{$lonin}}">
              <input type="hidden" id="centery"  name="city" value="{{$city}}">

              <button type="" class="getFilters" name="button">invia</button>

          </div>
        </div>
      </div>


      <div class="sidebar">
        <div class="results">
          <div class="flats-list">

              @if (empty($flats))
                <h2>No apartments in this place</h2>
              @else
              @foreach ($flats as $flat)
              <a href="{{route ('showFlat', $flat ->id)}}" class="box filtrato" ref="">
                  <img src="../img/{{$flat ->detail -> img}}" >

                <div class="box-sections">
                    <h1 class="flat-title">{{$flat -> detail -> title}}</h1>
                    <div class="address-section">
                      <h3>{{$flat -> address -> city}}</h3>
                    </div>
                    <div class="details">
                      <p>rooms : {{$flat -> detail -> num_room}}</p>
                      <p>bed : {{$flat -> detail -> bed}}</p>
                    </div>
                    <div class="services-section">
                      @foreach ($flat->services as $service)
                        <p>{{$service -> name}}</p>
                      @endforeach
                    </div>
                    <div class="rate">
                      <p>{{$flat -> rate }}</p>
                    </div>
                </div>


                <div class="flats2">
                  <div class="valflat"style="display:none" rif="{{$flat->id}}">
                    <input id=titleflat type="hidden" value="{{$flat ->detail ->title}}"></input>
                    <input id="latval"type="hidden" value="{{$flat -> address ->lat}}"></input>
                    <input id="lonval"type="hidden" value="{{$flat -> address ->lon}}"></input>
                  </div>
                </div>

              </a>
                @endforeach
            @endif

          </div>
          <div class="paginate">
            {{-- {{ $flats -> links()}} --}}
          </div>
        </div>
      </div>


      <div class="flats">
        @foreach ($flats as $flat)
        <div class="valflat"style="display:none" rif="{{$flat->id}}">
          <input id=titleflat type="hidden" value="{{$flat ->detail ->title}}"></input>
          <input id="latval"type="hidden" value="{{$flat -> address ->lat}}"></input>
          <input id="lonval"type="hidden" value="{{$flat -> address ->lon}}"></input>
        </div>
        @endforeach
      </div>


      <div class="mappa2" id="map"></div>


      <script type="text/javascript">
        function setheightwidthmap2(x){
          x.style['width']='300px';
          x.style['height']='239px';
        }
      </script>

      <form  action="{{ route('getCity')}}" id="formparametri" method="get"  accept-charset="UTF-8">
        @csrf
        @method('GET')
      <input type="hidden" class="place" name="place" value="">
      <input type="hidden" name="latinput" id="latinput" value="">
      <input type="hidden" name="loninput" id="loninput" value="">
      <button type="submit" id="bottone-invia" style="display:none">invia</button>


      </form>



    </div>


    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/maps/maps-web.min.js"></script>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/1.0.6/SearchBox-web.js"></script>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('sdk/marker.js')}}"></script>

    <script type="text/javascript" src="{{ asset('sdk/marker-manager.js')}}"></script>

    <style media="screen">
      .mapboxgl-control-container, .tt-search-box{
        width: 100%
      }
      .mapboxgl-canvas{
        display: none;
      }
      .mapboxgl-ctrl-top-right{
        display: none;
      }
      .mapboxgl-ctrl-bottom-right{
        display: none;
      }
      .tt-search-box-result-list-container{
        z-index: 999;
        width:100%;
        max-height:188px !important;
      }
      .tt-search-box-search-icon{
        padding-right:20px;
      }
      .tt-search-box-result-list:hover{
       background:rgb(228, 228, 228);
       cursor: pointer;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

        $("div#map2").click(function(e){
          let valInput = $('div#map2 .tt-search-box-input').val();
          console.log(valInput);
          $('input.place').val(valInput) ;
            $.ajax({
                url: 'https://api.tomtom.com/search/2/search/' + $('.tt-search-box-input').val() + '.json?key=i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy&typeahead=true&language=en-GB&lat=0&lon=0&minFuzzyLevel=1&maxFuzzyLevel=2&limit=1',
                method : 'GET',
                success : function(data){
                  if(data){
                    var inputlat = $('input#latinput').val(data.results[0].position.lat);
                    var inputlon =$('input#loninput').val(data.results[0].position.lon);
                    if (inputlat != "" && inputlon != "" ){
                      document.getElementById('bottone-invia').click();
                    }
                  }
                }
              })
            });

        var posto = $('#city').val();
        var centerx=$('#centerx').val();
        var centery=$('#centery').val();
        if(centerx ==="" || centery ===""){//set default values ​​without location search for map
          centerx = 45.46362;
          centery = 9.18812;
        };

        createmapmarker();


        $('.getFilters').click(function(e){
          
          $('.box').show();
          e.preventDefault();

          var selected = [];
          var arr = [];

          $('a.box').each(function(){
            if ($('a').hasClass('filtrato')) {
              $(this).removeClass('filtrato');
            }
            if ($('a').hasClass('nascosto')) {
              $(this).removeClass('nascosto');
            }
          })

          $('.checkbox:checked').each(function(){
              selected.push($(this).val());
          })

          $('.box .services-section').each(function(index){
            arr[index] = [];
            $(this).find('p').each(function(num){
              arr[index][num] =  $(this).text() ;
            })
            $(this).parents(".box").attr("rif",index);
          });

          // console.log(arr);
          // console.log(selected);

          for (var j= 0; j < selected.length; j++) {
            for(var i=0;i<arr.length;i++){

              if (arr[i].includes(selected[j])) {
                //ha i filtri selezionati
                // console.log(i,"match",j);
                $('.box[rif="' + i +'"]').addClass('filtrato');
              }else {
                  console.log("non corrisponde",arr[i]);
                  $('.box[rif="' + i +'"]').hide();
                  $('.box[rif="' + i +'"]').addClass('nascosto');
                  console.log($('.box-section[rif=0]'));
              }
            }
          }
        })


        function createmapmarker(){
          var divflats = $('.filtrato .flats2 >div').length;
          var divflatselement = $('.filtrato .flats2 > div');
          var map = tomtom.L.map('map', {
          key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy",
          basePath: 'sdk/',
          zoom: 13,
          center: [centerx,centery],
          });
          var map2 = tt.map({
           key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy',
           container: 'map2',
           style: 'tomtom://vector/1/basic-main',
           options : {
             showZoom: false,
             showPitch: false,
             defaultPrevented : false
           }
          });
          var ttSearchBox = new tt.plugins.SearchBox(tt.services.fuzzySearch, {
            searchOptions: {
              key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy'
            }
          });
          map2.addControl(ttSearchBox, 'top-left');
          for (var i = 0; i < divflats; i++) {
            let title = divflatselement[i].children[0].value;//titleflat
            let lat = divflatselement[i].children[1].value;//lat
            let lon = divflatselement[i].children[2].value;//long
            var marker = tomtom.L.marker([lat,lon]).addTo(map);
            marker.bindPopup(title);
          }
        }

      });//end jquery
    </script>

  </body>
</html>
