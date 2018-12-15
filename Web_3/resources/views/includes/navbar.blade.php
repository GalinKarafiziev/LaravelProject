<!--
<nav class="navbar navbar-expand-lg navbar-light bg-inverse">
    <a class="navbar-brand" href="/"><img width="50" height="40"src="
https://static.thenounproject.com/png/38800-200.png
"></a>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"  href="/">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link float-right"  href="/dogs/create">Add</a>
            </li>
            <li class="nav-item" id="login">
                <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item"><a class="nav-link">|</a></li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </div>
</nav>

            <li class="nav-item">
                <a class="nav-link float-right" style="font-size:25px;font-weight: bold;" href="/about">About</a>
            </li>
-->

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img width="50" height="40"src="https://static.thenounproject.com/png/38800-200.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"  href="/"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link float-right"  href="/dogs/create"></a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/storage/avatar/{{ Auth::user()->avatar }}" style="border-radius:50%!important;width:32px;height:32px;margin-right: 5px;">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: black!important;" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" style="color: black!important;" href="/home">Dashboard</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
