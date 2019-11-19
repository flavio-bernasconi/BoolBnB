@extends('layouts.app')

@section('content')
  <div class="registrazione">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- campi name surname  --}}
                            <div class="form-group row">

                                <div class="col-md-6">
                                  <label for="name" class="col-form-label ">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name"  autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                  <label for="surname" class="col-form-label ">{{ __('Surname') }}</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Surname"  autocomplete="surname" autofocus>
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- fine campi name surname  --}}


                            {{-- campi email birthday --}}
                            <div class="form-group row">

                                <div class="col-md-6">
                                  <label for="email" class="col-form-label">{{ __('E-Mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-Mail" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Birthday" class=" col-form-label">{{ __('Birthday') }}</label>

                                    <input id="" type="date" class="form-control" placeholder="Birthday" name="birthday">
                                </div>


                            </div>
                            {{-- fine campi email birthday --}}


                            {{-- campi password - confirm password --}}
                            <div class="form-group row">

                              <div class="col-md-6">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                                <div class="col-md-6">
                                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- fine campi password - confirm password --}}


                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn-send">
                                        Go
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
