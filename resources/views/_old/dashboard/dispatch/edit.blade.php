@extends('inc.layouts.app')

@section('header')
<header class="bg-white border-b border-gray-400">
    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-2xl font-bold leading-tight text-gray-700">
            Edit Dispatch
            <span class="text-base text-gray-600">#{{ $dispatch->reference_number }}</span>
        </h1>
        <a href="/dispatch/{{ $dispatch->reference_number }}" class="text-white font-bold text-sm bg-gray-500 border border-gray-600 rounded px-2 py-1">Back</a>
    </div>
</header>
@endsection

@section('content')

@include('inc.layouts.alerts.local')

@livewire('dispatch.edit-form', ['dispatch' => $dispatch])

@endsection