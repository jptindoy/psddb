<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Play:700&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>

        @yield('content')

    </body>

    <script src="{{asset('js/app.js')}}"></script>
</html>
