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
          <a href="../profile/{{Auth::user()->id}}" class="mb-5">Back</a>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <form  action="{{ route('updateFlat', $singleFlat->id)}}"  method="post" id="form-flat" accept-charset="UTF-8"
        enctype="multipart/form-data" >
            @csrf
            @method('POST')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Title</label>
                  <input type="text" class="form-control" value="{{ $singleFlat-> detail->title}}" name="title"  required placeholder="title">
                </div>

                <div class="form-group col-md-6">
                  <label>rooms</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$singleFlat-> detail->num_room}}" name="num_room" required  placeholder="room number">
                </div>

                <div class="form-group col-md-6">
                  <label>beds</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$singleFlat-> detail->bed}}" name="bed" required  placeholder="beds">
                </div>

                <div class="form-group col-md-6">
                  <label>bathroom</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$singleFlat-> detail->bathroom}}" name="bathroom" required  placeholder="bathroom">
                </div>


                <div class="form-group col-md-6">
                  <label>space area</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$singleFlat-> detail->mq}}" name="mq" required  placeholder="space area">
                </div>


                <div class="form-group col-md-6">
                  <label>img</label>
                  <input type="file" name="img"  accept="image/*" value="{{$singleFlat-> detail->img}}">
                </div>

                <div class="form-group col-md-6 d-none">
                  <label>user_id</label>
                  <input type="text" class="form-control"  name="user_id" required  value="{{Auth::user()->id}}">
                </div>

                {{-- Address section  --}}
                <div class="form-group col-md-12 mt-5">
                  <h4>Address</h4>
                </div>

                <div class="form-group col-md-6">
                  <label>state</label>
                  <input type="text" id="state" class="form-control" value="{{$singleFlat-> address->state}}" name="state" required  placeholder="State">
                </div>

                <div class="form-group col-md-6">
                  <label>city</label>
                  <input type="text" id="city" class="form-control" value="{{$singleFlat-> address->city}}" name="city" required  placeholder="city">
                </div>

                <div class="form-group col-md-6">
                  <label>CAP</label>
                  <input type="number" id="cap" class="form-control" value="{{$singleFlat-> address->cap}}" name="cap" required  placeholder="CAP">
                </div>

                <div class="form-group col-md-6">
                  <label>road</label>
                  <input type="text" id="road" class="form-control" value="{{$singleFlat-> address->road}}" name="road" required  placeholder="road">
                </div>

                <div class="form-group col-md-6">
                  <label>civic number</label>
                  <input type="text" id="civ_num" class="form-control" value="{{$singleFlat-> address->civ_num}}" name="civ_num" required  placeholder="civic number">
                </div>

                <div class="form-group d-none col-md-6">
                  <label>latitudine</label>
                  <input type="text" id="lat" class="form-control" value="{{$singleFlat-> address->lat}}" name="lat"  value="">
                </div>
                <div class="form-group d-none col-md-6">
                  <label>longitudine</label>
                  <input type="text" id="lon" class="form-control" value="{{$singleFlat-> address->lon}}" name="lon"  value="">
                </div>

                <div class="form-group col-md-12 mt-5">
                  <h4>Services</h4>
                </div>
                <div class="service-control col-md-12">
                  @foreach($services as $service)
                   <label for="{{$service -> name}}">{{$service ->name}}</label>

                   @if (in_array($service -> id, $servicesassoc))
                     <input type="checkbox"   name="checkboxvar[]" value="{{$service ->id}}"checked>
                   @else
                     <input type="checkbox"   name="checkboxvar[]" value="{{$service ->id}}">
                   @endif

                 @endforeach

                </div>


              </div>

              <button id="bottone" type="submit"  class="btn btn-add mt-2">Update Flat</button>
          </form>
        </div>
      </div>
    </div>




  </body>
</html>
