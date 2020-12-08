@extends('layout.dashboard.app')

@section('dashboard-body')

<div class="mx-auto w-full max-w-xl">
    <div class="py-6">
        <!-- Tabs -->
        <div class="mx-auto w-full text-right sm:hidden">
            <div x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false" class="relative inline-block text-left w-full">
                <div>
                    <span class="rounded-md shadow-sm">
                        <button @click="open = !open" type="button" class="inline-flex justify-between w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150 capitalize" id="options-menu" aria-haspopup="true" aria-expanded="true" x-bind:aria-expanded="open">
                            Menu
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                </div>

                <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 left-0 mt-2 w-full rounded-md shadow-lg">
                    <div class="rounded-md bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="{{ route('user.account') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Account Settings</a>
                            <a href="{{ route('user.password') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Change Password</a>
                            <a href{{ route('user.notifications') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Email Notifcations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex overflow-x-auto scrolling-touch no-scrollbar scroll-x">
                    <a href="{{ route('user.account') }}" class="whitespace-no-wrap py-4 px-1 border-b-2 font-medium text-sm leading-5 focus:outline-none {{ (request()->segment(2) == 'account') ? 'text-purple-600 focus:text-purple-800 focus:border-purple-700 border-purple-500' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 border-transparent' }}">
                        Your Account
                    </a>
                    <a href="{{ route('user.password') }}" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 font-medium text-sm leading-5 focus:outline-none {{ (request()->segment(2) == 'password') ? 'text-purple-600 focus:text-purple-800 focus:border-purple-700 border-purple-500' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 border-transparent' }}">
                        Change Password
                    </a>
                    <a href="{{ route('user.notifications') }}" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 font-medium text-sm leading-5 focus:outline-none {{ (request()->segment(2) == 'notifications') ? 'text-purple-600 focus:text-purple-800 focus:border-purple-700 border-purple-500' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 border-transparent' }}">
                        Email Notifications
                    </a>
                </nav>
            </div>
        </div>

        @include('layout.alerts')

        <div class="mt-10 bg-white rounded-lg shadow-lg p-4">
            @yield('user-body')
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const target = document.querySelector(".scroll-x");

    target.addEventListener("wheel", event => {
        const toLeft = event.deltaY < 0 && target.scrollLeft > 0;
        const toRight =
            event.deltaY > 0 &&
            target.scrollLeft < target.scrollWidth - target.clientWidth;

        if (toLeft || toRight) {
            event.preventDefault();
            target.scrollLeft += event.deltaY * 40;
        }
    });

</script>
@endpush
