<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WAVIG @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('style')
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">WAVIG</a>
        </nav>
        @if (@session('errors'))
            <ul style="text-align: center; list-style-type:none;">
            @foreach (@session('errors') as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        @yield('content')
    </body>
</html>