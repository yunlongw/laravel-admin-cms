<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link href="{{ asset('css/app.css')  }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <example-component></example-component>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>