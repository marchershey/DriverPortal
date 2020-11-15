@extends('layout.app')

@section('body')

<div class="flex full-screen overflow-hidden" x-data="{ mobilemenu: false }">

    {{-- sidebar --}}
    <div class="hidden md:block">
        <div class="flex flex-shrink-0 h-full">
            <div class="flex flex-col w-64 border-r border-gray-900 pt-5 pb-4 bg-gray-800">

                <div class="flex ml-5 items-center flex-shrink-0 px-6">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/v1/workflow-logo-on-dark.svg" alt="Workflow">
                </div>

                <div class="h-0 flex-1 flex flex-col overflow-y-auto mt-5">
                    <!-- User account dropdown -->
                    <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" class="px-3 relative inline-block text-left">
                        <div x-description="Dropdown menu toggle, controlling the show/hide state of dropdown menu.">
                            <button @click="open = !open" type="button" class="group w-full rounded-md px-3.5 py-2 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-500 focus:outline-none focus:bg-gray-200 focus:border-blue-300 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150" id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                <div class="flex w-full justify-between items-center">
                                    <div class="flex min-w-0 items-center justify-between space-x-3">
                                        <img class="w-10 h-10 rounded-full flex-shrink-0" src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name }}+{{ Auth::user()->last_name }}&background=5850ec&color=ffffff&font-size=0.4" alt="">
                                        <div class="flex-1 min-w-0">
                                            <h2 class="text-white group-hover:text-gray-900 group-focus:text-gray-900 text-sm leading-5 font-medium truncate">Jessy Schwarz</h2>
                                            <p class="text-gray-500 text-sm leading-5 truncate">@jessyschwarz</p>
                                        </div>
                                    </div>
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg" style="display: none;">
                            <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="py-1">
                                    <a href="{{ route('user.account') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Your Account</a>
                                    <a href="{{ route('user.notifications') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Notifications</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Settings</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Get desktop app</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Support</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Search -->
                    <div class="px-3 mt-5">
                        <label for="search" class="sr-only">Search</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="mr-3 h-4 w-4 text-gray-400" x-description="Heroicon name: search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="search" class="form-input bg-gray-700 border-gray-600 text-white focus:text-gray-900 focus:bg-white focus:outline-none focus:shadow-none block w-full pl-9 sm:text-sm sm:leading-5" placeholder="Search">
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="px-3 mt-6">
                        <div class="space-y-1">
                            <nav>
                                <div>
                                    <a href="{{ route('dashboard.index') }}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-white rounded-md bg-indigo-500 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150" aria-current="page">
                                        <!-- Heroicon name: home -->
                                        <svg class="flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-white group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="truncate">
                                            Dashboard
                                        </span>
                                    </a>
                                    <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-400 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                                        <!-- Heroicon name: users -->
                                        <svg class="flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <span class="truncate">
                                            Team
                                        </span>
                                    </a>
                                </div>

                                <div class="mt-8">
                                    <h3 class="px-3 text-xs leading-4 font-semibold text-white uppercase tracking-wider" id="projects-headline">
                                        Support
                                    </h3>
                                    <div class="mt-1" role="group" aria-labelledby="projects-headline">
                                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-400 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                                            <span class="truncate">
                                                Get Support
                                            </span>
                                        </a>
                                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-400 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                                            <span class="truncate">
                                                Report a bug
                                            </span>
                                        </a>
                                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-400 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                                            <span class="truncate">
                                                Documentation
                                            </span>
                                        </a>
                                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-400 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                                            <span class="truncate">
                                                Changelog
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- app --}}
    <div class="w-full overflow-hidden">
        <div class="flex flex-col h-full w-full">

            {{-- top bar --}}
            <div class="flex-none">
                <div class="flex justify-between items-center w-full bg-gray-800 md:hidden">
                    {{-- menu button --}}
                    <button class="p-4 text-white focus:outline-none" x-on:click="mobilemenu = !mobilemenu">
                        <!-- Heroicon name: menu -->
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>

                    {{-- logo --}}
                    <a href="{{ route('dashboard.index') }}">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/v1/workflow-logo-on-dark.svg" alt="Workflow">
                    </a>

                    {{-- user icon --}}
                    <div class="relative" x-data="{ user: false }">
                        <button class="px-4 py-2 focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true" x-on:click="user = !user">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name }}+{{ Auth::user()->last_name }}&background=5850ec&color=ffffff&font-size=0.4" alt="">
                        </button>

                        <div class="z-20 origin-top-right absolute right-4 top-12 w-auto rounded-md shadow-xl" x-show="user" x-on:click.away="user = false" style="display:none">
                            <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="px-4 py-3 text-sm leading-5">
                                    <p class="font-semibold">
                                        Signed in as
                                    </p>
                                    <p class="text-gray-400 italic truncate">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="/user/account" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Your Account</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Settings</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="/logout" class="block w-full text-left px-4 py-2 text-sm leading-5 text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- mobile menu --}}
                <div class="relative z-10" x-show.transition.opacity="mobilemenu" x-on:click.away="mobilemenu = false" style="display:none;">
                    <nav class="absolute w-full bg-white shadow-xl font-semibold">
                        <a href="{{ route('dashboard.index') }}" class="block px-5 py-4 border-b border-gray-200">
                            <span class="truncate">
                                Dashboard
                            </span>
                        </a>
                    </nav>
                </div>
            </div>

            {{-- content --}}
            <div id="content" class="bg-gray-100 h-full overflow-x-auto">
                <div class="max-w-screen-md p-4 sm:p-10">
                    @yield('dashboard-body')
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
