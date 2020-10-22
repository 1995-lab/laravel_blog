<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> 
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}} 

     <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" style="color:white;">
                    Home
                </a>
                 @if(Auth::check())
                    @if(Auth::user()->is_admin==0)
                        <a class="nav-link" href="{{route('users.create')}}" style="color:white;">{{ __('Ajout article') }}</a>
                @endif
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 0;">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('se connecter') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('s\'enregistrer') }}</a>
                                </li>
                            @endif
                        @else
                          @if(Auth::check())
                                @if(Auth::user()->is_admin)
                         <a class="navbar-brand" href="{{route('home.admin')}}" style="color:white;">
                                        Administration
                                </a>
                                @endif
                                @endif
                      
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
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
        </nav>

        <div class="container">
    
            @yield('content')
        </div>
   
    <footer class="fixed-bottom">
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto"> 
            <p class="copyright text-muted">Copyright &copy; Mon blog 2020</p>
        </div>
        </div>
    </div>
</footer>
 </div>
</body>
</html>
