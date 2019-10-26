<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($section)? $section.'-': '' }}{{ config('app.name', 'CLOUD-ENSP') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('add-css')
</head>
<body>
    <section>
        @yield('header')
    </section>

    <section id="content-section" class="mb-5">
        <div>
            @yield('second_header')
        </div>
        @yield('content')
    </section>

    <section>
        <div class="fixed-bottom bg-dark m-0 text-center text-white h6">
            Developpé par <b>L&eacute;quipe</b> de l'ENSP.<br>
            <a href="mailto:lequipe.enspy@gmail.com?Subject=CLOUD%20ENSP" target="_blank">Contacter Nous</a>
        </div>
    </section>

    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('add-js')
</body>
</html>
