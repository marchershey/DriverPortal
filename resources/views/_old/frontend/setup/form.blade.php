@extends('inc.layouts.auth')

@section('content')
<div class="min-h-screen flex items-center">
    <div class="w-full max-w-sm rounded-lg overflow-hidden mx-auto">
        <div class="py-4 px-6">
            <div class="font-bold text-gray-700 text-xl">{{config('app.name')}}</div>
            <div class="mt-1 font-bold text-gray-600">Let's get to know each other...</div>
            <div class="mt-3 font-semibold text-xs text-gray-500">To personalize your dashboard and give you the correct rates, we need a little more info.</div>

            @livewire('setup.form')

            <hr class="mt-4">
            <div class="mt-6 text-xs text-gray-500 text-center">
                <p class="mt-4 text-gray-400">@lang('global.copyright')</p>
            </div>
        </div>
    </div>
</div>
@endsection