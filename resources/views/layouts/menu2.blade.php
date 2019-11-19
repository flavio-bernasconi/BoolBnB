@section('menu')
  <div class="menu">
    @if (Route::has('login'))
        <div class="nav">

            @auth
              <a href="/" class="logo">
                <img  src={{asset('img/logo.png')}} alt="">
              </a>


              <div class="menu-links">
                {{-- link menu nella home se sei loggato  --}}
                  <a  class="{{ (request()->is('homepage')) ? 'active' : '' }}"  href="{{ url('/') }}">Home</a>
                  <a class="{{ (request()->is('flats')) ? 'active' : '' }}" href="{{ url('/flats') }}">Flats</a>
                  <a class="{{ (request()->is('profile/*')) ? 'active' : '' }}" href="{{ route('profile', Auth::user()->id ) }}">Profile</a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                    {{-- fine logout button --}}
                  {{-- fine link menu nella home se sei loggato  --}}
              </div>
            @else
              <a href="/" class="logo">
                <img  src={{asset('img/logo.png')}} alt="">
              </a>

                <div class="menu-links">
                  {{-- link menu nella home se NON sei loggato  --}}
                    <a class="{{ (request()->is('homepage')) ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    <a class="{{ (request()->is('flats')) ? 'active' : '' }}"href="{{ url('/flats') }}">Flats</a>
                    <a class="{{ (request()->is('login')) ? 'active' : '' }}"href="{{ route('login') }}">Login</a>
                    <a class="{{ (request()->is('register')) ? 'active' : '' }}"href="{{ route('register') }}">Register</a>

                    {{-- fine link menu nella home se NON sei loggato  --}}
                </div>
            @endauth
        </div>
    @endif
  </div>

@endsection
