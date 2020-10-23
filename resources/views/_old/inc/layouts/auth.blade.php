<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
    <title>@yield('title') - {{config('app.name')}}</title>
    @else
    <title>{{config('app.name')}}</title>
    @endif

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-200 min-h-screen font-base">
    <div id="app">
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>