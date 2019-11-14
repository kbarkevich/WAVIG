<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WAVIG</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="main-block text-center position-ref">
            <div class="title m-b-md text-primary">WAVIG</div>
            <div class="subtitle m-b-md text-dark mb-5">Waterborne Vessel Identification Generator</div>
            <button type="button" class="btn btn-primary">Generate New Boat Name</button>
        </div>
    </body>
</html>
