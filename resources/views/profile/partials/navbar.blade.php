<nav class="navbar navbar-expand-md navbar-secondary bg-secondary shadow-sm  p-0">
    <div class="container-fluid px-md-5 d-flex align-items-md-end">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

            <div class="logo pt-2 {{-- all'espansione del burger deve allargarsi e avvicinarsi alle voci del menu --}}">
                {{-- Keller-logo --}}
                <svg class="keller-logo" width="112" height="111" viewBox="0 0 1426 1419" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="712.84" cy="709.469" rx="393.5" ry="368" fill="" />
                    <path d="M964.462 946.311L834.962 769.311L896.462 709.311L1069.46 946.311H964.462Z" fill="#D9D9D9"
                        stroke="black" />
                    <path d="M637.84 818.469L589.84 942.469L395.34 565.469H504.84L637.84 818.469Z" fill="#D9D9D9"
                        stroke="black" />
                    <path
                        d="M502.34 946.469H331.34C349.007 936.302 390.74 900.269 416.34 837.469C440.74 897.869 483.84 935.302 502.34 946.469Z"
                        fill="#D9D9D9" stroke="black" />
                    <path d="M1046.46 563.811L948.462 660.311C941.662 603.911 902.296 572.478 883.462 563.811H1046.46Z"
                        fill="#D9D9D9" stroke="black" />
                    <rect x="713.841" y="167.969" width="66" height="1073" fill="#D9D9D9" stroke="black" />
                </svg>
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <div class="flex-fill ps-3 pe-2 pe-lg-3 text-end">

            {{-- hamburger-menu --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            {{-- funzione per recuperare il nome della rotta ----------------!!!!!!}}
            {{--   @dump(Route::getCurrentRoute()) --}}


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav  me-md-auto align-items-end">
                    <li class="nav-item  d-flex flex-column align-items-center">
                        <a class="nav-link fs-5  py-md-4 px-2     
                        {{ Route::currentRouteName() === null ? 'active' : '' }}"
                            href="{{ url('/') }}">{{-- WTF?! ______??? --}}
                            {{ __('Home') }}</a>
                        <div class="link-underline m-3 mb-0"></div>
                    </li>
                    <li class="nav-item  d-flex flex-column align-items-center">
                        <a class="nav-link fs-5  py-md-4 px-2" href="{{ url('admin/projects') }}">
                            {{ __('Progetti') }}</a>
                        <div class="link-underline m-3 mb-0"></div>
                    </li>
                    <li class="nav-item  d-flex flex-column align-items-center">
                        <a class="nav-link fs-5  py-md-4 px-2" href="{{ url('/') }}">
                            {{ __('link') }}</a>
                        <div class="link-underline m-3 mb-0"></div>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto align-items-end">
                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item  d-flex flex-column align-items-center">
                            <a class="nav-link fs-5  py-md-4 px-2
                            {{ Route::currentRouteName() === 'login' ? 'active' : '' }}"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                            <div class="link-underline m-3 mb-0"></div>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item   d-flex flex-column align-items-center">
                                <a class="nav-link fs-5 py-md-4 px-2
                                {{ Route::currentRouteName() === 'register' ? 'active' : '' }}"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                <div class="link-underline m-3 mb-0"></div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item  dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle fs-5" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item fs-5" href="{{ url('/admin') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item fs-5" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
