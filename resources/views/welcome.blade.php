<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <title>EvoluTI - Encurtador de Links</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Noto+Sans&display=swap" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ant-design-vue/2.1.3/antd.dark.min.css" integrity="sha512-WfKgUK6Xi/WM2QylDlt1rm6h9YAFGBvgoyZL/1sRRjcJ/D/vYQlJVijnl/J+QhV+tg0NXN/HNAP3MZ22mSIuOQ==" crossorigin="anonymous" />
    </head>
    <body>
        <div id="app"></div>
        <script src="js/app.js"></script>
    </body>
</html>
