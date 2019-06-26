<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">

        {{-- <a class="navbar-brand" href="javascript:void(0)">
            {{ config('app.name', 'Dental Booking System') }}
        </a> --}}

        <a class="navbar-brand" href="javascript:void(0)">
            <i class="fas fa-tooth"></i> DentalBookingSystem
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            {{-- <ul class="navbar-nav mr-auto">
                <h4 class="heding">Dental Booking System</h4>
            </ul> --}}

{{-- <div class="navbar-header">
          <h3 class="heding">Dental clinic reservation system</h3>
        </div> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <li>


                      <a class="nav-link" href="{{url('admin-login')}}"><i class="fas fa-user-lock"></i> Admin</a>

                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @if(Auth()->user()->type == 'standard')
                          <a class="dropdown-item" href="{{url('user-profile')}}">
                          Profile
                          </a>
                        @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
                <li>
                  <a class="nav-link" href="{{url('services')}}">Services</a>
                </li>
                <li>
                  <div id="google_translate_element"></div>
                </div>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }

        function clearFunction() {
           document.getElementById("myForm").reset();
        }
        </script>


    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</nav>
