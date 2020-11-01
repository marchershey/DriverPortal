<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif

    <link rel="stylesheet" href="{{ mix('css/app.css') }}?{{ rand() }}">
    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    {{-- Content --}}
    @yield('body')

    {{-- Scripts --}}
    @livewireScripts
    @stack('scripts')

    {{-- Logout Form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</body>

</html>