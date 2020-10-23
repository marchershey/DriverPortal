@extends('inc.layouts.app')

@section('header')
<header class="bg-white border-b border-gray-400">
    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
        <h1 class="text-2xl font-bold leading-tight text-gray-700">New Dispatch</h1>
        <div class=""></div>
    </div>
</header>
@endsection

@section('content')

@livewire('dispatch.start-form')

@endsection