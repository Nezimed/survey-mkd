<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="ui menu">
    @auth
        <a class="item"  href="{{ route('clients.index') }}">Clientes</a>
        <a class="item"  href="{{ route('projects.index') }}">Projectos</a>
        <a class="item"  href="{{ route('reports.index') }}">Relatórios</a>
    @endauth
    <div class="right menu">
        @guest
            <a class="item" href="{{ route('login') }}">{{ __('Login') }}</a>
        @else
            <a class="item" href="#">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <a class="item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</div>

    <div class="ui container">
        @foreach (['danger', 'warning', 'success', 'info'] as $type)
            @if (session('status-'.$type))
                <p class="ui {{$type}} message">{{ session('status-'.$type) }}</p>
            @endif
        @endforeach
    </div>


    <main class="py-4">
        @yield('content')
    </main>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>
