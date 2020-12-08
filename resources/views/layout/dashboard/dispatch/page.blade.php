@extends('layout.dashboard.app')
@section('site_title', $page_title)

@section('dashboard-body')

<div class="mx-auto w-full max-w-xl">
    <div class="bg-white rounded-lg shadow-lg p-4 my-6">
        @yield('dispatch-body')
    </div>
</div>

@endsection
