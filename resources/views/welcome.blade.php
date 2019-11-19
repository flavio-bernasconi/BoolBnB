<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>

        <link href="{{ asset('sdk/SearchBox.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/menu.css')}}">
        <link rel="stylesheet" href="{{asset('css/12bool.css')}}">
        <link rel="stylesheet" href="{{asset('css/homepage.css')}}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
      @include('layouts.menu2')

      @yield('menu')


      <div class="mainhomepage">

        <div class="container search "id="background-1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11 ">
                  <div class="searchbox" style="position:relative">
                    <h1 >Cerca alloggi unici al mondo</h1>
                    <div class="cerca">
                      <div class="searchform" id="map" style="height: 200px;width:100%"></div>

                    </div>
                    <form  action="{{ route('getCity')}}" id="formparametri" method="get"  accept-charset="UTF-8">
                      @csrf
                      @method('GET')
                    <input type="hidden" class="place" name="place" value="">
                    <input type="hidden" name="latinput" id="latinput" value="">
                    <input type="hidden" name="loninput" id="loninput" value="">
                    <button type="submit" id="bottone-invia" style="display:none">invia</button>


                  </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--fine container search-->

        <div class="container showflats">
          <div class="centrone">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="linkallflats">
                  <a href="#">Alloggi in evidenza</a>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 someflats">
                <div class="row">
                @foreach ($flats as $flat)
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="flat">
                      <a href="{{route('showFlat',$flat -> id)}}">
                        <img src="../img/{{$flat ->detail -> img}}" alt="">
                        <div class="flex-rate">
                            <h3>{{$flat -> address -> city}}</h3>
                            <p>Appartamento - {{$flat -> detail -> bed}}
                              @if ($flat -> detail -> bed === 1)
                                letto
                              @else
                                letti
                              @endif
                            </p>
                        </div>
                        <div class="rate">
                          <p>{{$flat -> rate }}</p>
                        </div>
                      </a>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container showflats">
          <div class="centrone">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="flatsratetitle">
                  <h3 href="#">Alloggi Con Le Migliori Valutazioni</h3>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 someflats">
                <div class="row">
                @foreach ($flatsrates as $flat)
                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="flat">
                      <a href="{{route('showFlat',$flat -> id)}}">
                        <img src="../img/{{$flat ->detail -> img}}" alt="">
                        <div class="flex-rate">
                          <p>{{$flat -> address -> city}}</p>
                        </div>
                        <div class="rate">
                          <p>{{$flat -> rate }}</p>
                        </div>
                      </a>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>




    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/maps/maps-web.min.js"></script> 

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/1.0.6/SearchBox-web.js"></script>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>



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
        z-index: 10;
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
      console.log("ok funziono");
      $(document).ready(function(){
        $(".tt-search-box-result-list-container").click(function(e){
          let valInput = $('.tt-search-box-input').val();
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
          });
          var map = tt.map({
            key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy',
            container: 'map',
            style: 'tomtom://vector/1/basic-main',
            options : {
              showZoom: false,
              showPitch: false
            }
          });
          var ttSearchBox = new tt.plugins.SearchBox(tt.services.fuzzySearch, {
            searchOptions: {
              key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy'
            }
          });
          map.addControl(ttSearchBox, 'top-left');
        </script>
      </body>
</html>
