@extends('inc.layouts.auth')
@section('title', 'Sign in')


@section('heading-subtext')
Sign into your account or <a href="{{route('register')}}" class="link">create a new one</a>.
@endsection

@section('auth-content')

<form action="{{route('login')}}" method="POST" class="form">
    @csrf

    @include('inc.alerts.simple')

    <div class="group">
        <label for="email" class="label">
            Email Address
        </label>
        <input type="text" name="email" id="email" class="input" placeholder="jsmith23@email.com" value="{{old('email')}}" required>
    </div>

    <div class="group relative">
        <div class="absolute top-0 right-0">
            <a href="/forgot-password" class="link text-xs">
                Reset Password
            </a>
        </div>
        <label for="password" class="label">
            Password
        </label>
        <input type="password" name="password" id="password" class="input" placeholder="••••••••••••" required>
    </div>

    <div class="group flex justify-between">
        <label class="checkbox-group">
            <input type="checkbox" class="form-checkbox focus:shadow-none" checked>
            <span>Stay signed in</span>
        </label>
        <button type="submit" class="button primary">Sign in</button>
    </div>

</form>

@endsection