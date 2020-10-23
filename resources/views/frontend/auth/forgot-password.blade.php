@extends('inc.layouts.auth')
@section('title', 'Password Reset')


@section('heading-subtext', 'Enter your email address to reset your password.')

@section('auth-content')
<form action="{{route('password.email')}}" method="POST" class="form">
    @csrf

    @include('inc.alerts.simple')

    <div class="group">
        <label for="email" class="label">
            Email Address
        </label>
        <input type="text" name="email" id="email" class="input" placeholder="jsmith23@email.com" value="{{old('email')}}" required>
    </div>

    <div class="group">
        <button type="submit" class="button primary w-full">Continue</button>
        <div class="text-center mt-4">
            <a href="/login" class="link text-sm">Go back</a>
        </div>
    </div>

</form>
@endsection