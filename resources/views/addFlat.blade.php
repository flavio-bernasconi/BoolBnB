<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <a href="{{ URL::previous() }}" class="mb-5">Back</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <form  action="{{ route('storeFlat')}}"  method="post" id="form-flat"  accept-charset="UTF-8"
        enctype="multipart/form-data" >
            @csrf
            @method('POST')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Title</label>
                  <input type="text" class="form-control check" id="title" id="" name="title"   placeholder="title">
                </div>
                <div class="form-group col-md-6">
                  <label>rooms</label>
                  <input type="number" min="0" step="1" class="form-control check" id="num_room" name="num_room"   placeholder="room number">
                </div>
                <div class="form-group col-md-6">
                  <label>beds</label>
                  <input type="number" min="0" step="1" class="form-control check" id="bed" name="bed"   placeholder="beds">
                </div>
                <div class="form-group col-md-6">
                  <label>bathroom</label>
                  <input type="number" min="0" step="1" class="form-control check" id="bathroom" name="bathroom"   placeholder="bathroom">
                </div>
                <div class="form-group col-md-6">
                  <label>space area</label>
                  <input type="number" min="0" step="1" class="form-control check" id="mq" name="mq"   placeholder="space area">
                </div>
                <div class="form-group col-md-6">
                  <label>img</label>
                  <input type="file" contenteditable="check" id="img" name="img" accept="image/*">
                </div>
                <div class="form-group col-md-6 d-none">
                  <label>user_id</label>
                  <input type="text" class="form-control check" name="user_id"   value="{{Auth::user()->id}}">
                </div>
                {{-- Address section  --}}
                <div class="form-group col-md-12 mt-5">
                  <h4>Address</h4>
                </div>
                <div class="form-group col-md-6">
                  <label>state</label>
                  <input type="text" id="state" class="form-control check" name="state"   placeholder="State">
                </div>
                <div class="form-group col-md-6">
                  <label>city</label>
                  <input type="text" id="city" class="form-control check" name="city"   placeholder="city">
                </div>
                <div class="form-group col-md-6">
                  <label>CAP</label>
                  <input type="number" id="cap" class="form-control check" name="cap"   placeholder="CAP">
                </div>
                <div class="form-group col-md-6">
                  <label>road</label>
                  <input type="text" id="road" class="form-control check" name="road"   placeholder="road">
                </div>
                <div class="form-group col-md-6">
                  <label>civic number</label>
                  <input type="text" id="civ_num" class="form-control check" name="civ_num"   placeholder="civic number">
                </div>
                <div class="form-group  col-md-6" style="display:none">
                  <label>latitudine</label>
                  <input type="text" id="latitudeflat" class="form-control" name="lat"  value="">
                </div>
                <div class="form-group  col-md-6" style="display:none">
                  <label>longitudine</label>
                  <input type="text" id="longitudeflat" class="form-control" name="lon"  value="">
                </div>
                <div class="form-group col-md-12 mt-5">
                  <h4>Services</h4>
                </div>
                <div class="service-control col-md-12">
                @foreach($services as $service)
                  <label for="{{$service -> name}}">{{$service ->name}}</label>
                  <input type="checkbox"   name="checkboxvar[]" value="{{$service ->id}}">
                @endforeach
                </div>
              </div>
              <button id="bottone" type="submit"  class="btn btn-add mt-2" disabled>Add Flat</button>
          </form>
        </div>
      </div>
    </div>

    <h1 class="warning"></h1>


    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('input').focusout(check);
      $('input').focusin(check);
      $('btn').hover(check);


      function check(){
        if ($("input.check").filter(function () {
            return $.trim($(this).val()).length == 0
        }).length == 0) {
          console.log('tutti pieni');
          $('.btn').prop('disabled',false)
        }
      }

    })

    </script>
  </body>
  </html>
