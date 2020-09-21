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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>


<body style="background-image:url({{asset('svg/bg_2.jpg')}});background-repeat:no-repeat; background-size:cover; background-attachement:fixed;">
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark bg-dark border-bottom shadow-sm" style="font-family: Viner Hand ITC; font-weight: bold;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: Monotype Corsiva">
                <img src="{{asset('svg/image2.png')}}" width="55px" class="pr-3" style="border-right: solid 3px #FFF;">
                    <span class="pl-2"> EEPT </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                                    <a class="nav-link active" href="/">Accueil</a>
                        </li>

                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('agent.agents.index')}}">Recrutement</a>
                        </li>

                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('deploiement.deploiement.index')}}">Affectation</a>
                        </li>
                            
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('deploiement.deploiement.mutation')}}">Mutation</a>
                        </li>
                            
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('home')}}">Panel</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @can('manage-users')
                                <a class="dropdown-item" href="{{route('admin.users.index')}}">Liste des utilisateurs</a>
                                @endcan 
                                
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @if (session()->has('message'))
                <div class="alert alert-dark" role="alert">
                    {{ session()->get('message')}}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

<footer class="footer mt-auto py-3">
        <div class="container">
          <span style="font-family: Monotype Corsiva; font-weight: bold; display: flex; justify-content: center; color:#000"> Copyright &copy; 2020 - realisé par Dave Saa - Tous droits reserves.</span>
        </div>
</footer>

</body>
</html>
