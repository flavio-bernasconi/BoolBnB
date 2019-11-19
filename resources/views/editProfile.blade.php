@extends('layouts.app')

@section('content')
  <div class="registrazione">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">

                    <div class="card-body">
                        <form method="POST" action="{{ route('update', $user -> id) }}">
                            @csrf
                            @method('POST')

                            {{-- edit name surname  --}}
                            <div class="form-group row">

                                <div class="col-md-6">
                                  <label for="name" class="col-form-label ">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user -> name }}" placeholder="Name"  autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                  <label for="surname" class="col-form-label ">{{ __('Surname') }}</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user -> surname }}" placeholder="Surname"  autocomplete="surname" autofocus>
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- edit email --}}
                            <div class="form-group row">

                                <div class="col-md-6">
                                  <label for="email" class="col-form-label">{{ __('E-Mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-Mail" value="{{ $user -> email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Birthday" class=" col-form-label">{{ __('Birthday') }}</label>
                                    <input id="" type="date" class="form-control" placeholder="Birthday" name="birthday" value="{{ $user -> birthday }}" required>
                                </div>
                            </div>

                            {{-- button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn-send">
                                        Conferma modifiche
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
