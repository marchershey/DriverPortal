@extends('layout.app')

@section('body')
<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/v1/workflow-mark-on-white.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Create an account
        </h2>
        <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
            or
            <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                sign into your existing account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form action="/register" method="POST">
                @csrf

                @if(count($errors) > 0 )
                <div class="text-center text-xs font-semibold p-2 rounded bg-red-100 text-red-500 mb-4">
                    {!!$errors->first()!!}
                </div>
                @endif

                <div class="flex flex-col">
                    <label for="first_name" class="w-full text-sm text-gray-800 font-semibold">
                        Name
                    </label>
                    <div class="flex gap-5 mt-2">
                        <div class="rounded-md shadow-sm">
                            <input name="first_name" id="first_name" type="text" required placeholder="First Name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 capitalize">
                        </div>
                        <div class="rounded-md shadow-sm">
                            <input name="last_name" id="last_name" type="text" required placeholder="Last Name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 capitalize">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-5">
                    <label for="email" class="text-sm text-gray-800 font-semibold">
                        Email Address
                    </label>
                    <div class="mt-2 rounded-md shadow-sm">
                        <input name="email" id="email" type="email" required placeholder="Email Address" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="flex flex-col mt-5">
                    <label for="password" class="text-sm text-gray-800 font-semibold">
                        Password
                    </label>
                    <div class="flex gap-5 mt-2">
                        <div class="rounded-md shadow-sm">
                            <input name="password" id="password" type="password" required placeholder="Password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                        <div class="rounded-md shadow-sm">
                            <input name="password_confirmation" id="password_confirmation" type="password" required placeholder="Password again..." class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>
                </div>

                <div class="flex items-center mt-5">
                    <input name="agree" id="agree" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" required>
                    <label for="agree" class="ml-2 block text-sm leading-5 text-gray-900">
                        I agree to the <a href="#" class="font-semibold text-indigo-500">Terms of Service</a>
                    </label>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Create account
                        </button>
                    </span>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
