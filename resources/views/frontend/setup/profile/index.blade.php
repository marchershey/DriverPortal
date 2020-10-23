@extends('inc.layouts.auth')
@section('title', 'Sign in')


@section('heading-subtext', 'Let\'s setup your '.config('app.name').' Profile')

@section('auth-content')
@livewire('setup.profile')
@endsection