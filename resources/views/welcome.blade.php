<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <title>EvoluTI - Encurtador de Links</title>
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="app"></div>
        <script src="js/app.js"></script>
    </body>
</html>
