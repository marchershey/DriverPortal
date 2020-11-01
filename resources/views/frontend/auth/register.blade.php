@extends('inc.layouts.auth')
@section('title', 'Create an account')


@section('heading-subtext')
Create your new account or <a href="{{route('login')}}" class="link">sign in</a> instead.
@endsection

@section('auth-content')
<form action="{{route('register')}}" method="POST" class="form">
    @csrf

    @if(count($errors) > 0 )
    <div class="text-center text-xs font-semibold p-2 rounded --  bg-red-100 text-red-500">
        {!!$errors->first()!!}
    </div>
    @endif

    <div class="group">
        <label for="email" class="label">
            Email Address
        </label>
        <input type="text" name="email" id="email" class="input" placeholder="jsmith23@email.com" value="{{old('email')}}" required>
    </div>

    <div class="group">
        <label for="password" class="label">
            Password
        </label>
        <input type="password" name="password" id="password" class="input" placeholder="••••••••••••" required>
    </div>

    <div class="group">
        <label for="password_confirmation" class="label">
            Retype Password
        </label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="••••••••••••" required>
    </div>

    <div class="group">
        <label class="checkbox-group">
            <input type="checkbox" class="form-checkbox focus:shadow-none" required>
            <span>I agree to the <a href="#" class="link">Terms of Service</a> & <a href="#" class="link">Site Policies</a></span>
        </label>
    </div>

    <div class="group">
        <label class="checkbox-group">
            <input type="checkbox" class="form-checkbox focus:shadow-none" required>
            <span>I understand that <strong>FirstFleet&trade; is not affiliated, associated, or in any way officially connected with {{config('app.name')}}</strong>. <a href="#" class="link">Learn more</a></span>
        </label>
    </div>

    <div class="group">
        <button type="submit" class="button primary w-full">Create Account</button>
    </div>

</form>
@endsection