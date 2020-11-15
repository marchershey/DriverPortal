@extends('layout.dashboard.app')
@section('site_title', $page_title)

@section('dashboard-body')

<div class="mx-auto w-full max-w-xl">
    <div class="bg-white rounded-lg shadow-lg p-4 my-6 space-y-4">
        <div class="">
            <h2 class="text-lg leading-6 font-semibold text-gray-700">{{ $page_title }}</h2>
            <p class="mt-1 text-sm leading-5 text-gray-500">Fill out the form below to create a new dispatch.</p>
        </div>

        <div class="border-b border-gray-200"></div>

        @include('layout.alerts')

        <div class="my-6">
            @yield('dispatch-body')
        </div>
    </div>
</div>

@endsection
