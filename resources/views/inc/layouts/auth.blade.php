@extends('inc.layouts.app')

@section('content')
<div id="" class="mt-16 md:mt-0 md:flex md:items-center md:justify-center md:min-h-screen max-w-xs mx-auto">
    <div class="w-full">
        <h1 class="heading text-center">{{config('app.name')}}</h1>
        <h2 class="heading sub text-center">
            @yield('heading-subtext')
        </h2>
        <div class="box shadow-lg">
            @yield('auth-content')
        </div>

        <div class="grid">
            <div class="text text-center">{{config('app.name')}} {{date('Y')}} - Version {{config('app.version')}} </div>
            <div class="text text-center">{{config('app.name')}} was created by Marc Hershey</div>
            <div class="text text-center">FirstFleet&trade; is not affiliated, associated, or in any way officially connected with {{config('app.name')}}.</div>
        </div>
    </div>
</div>
@endsection