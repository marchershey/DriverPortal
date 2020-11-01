@extends('inc.layouts.app')
@section('title', $pageTitle)

@section('content')

{{-- Flex Container --}}
<div class="flex overflow-hidden min-h-screen relative" x-data="{ sidebar: false }">
    {{-- Sidebar --}}
    <div class="lg:flex border-r" x-show="sidebar" style="display: none">
        <div class="bg-gray-800 text-gray-200 h-full w-64 p-4">
            {{-- Logo --}}
            <div class="text-white text-xl font-bold text-center">
                {{ config('app.name') }}
            </div>

            <div class="relative mt-4" x-data="{ userPanelOpen: false }">
                <button type="button" class="group w-full flex items-center text-left rounded p-2 hover:bg-gray-700 focus:bg-gray-200 focus:outline-none" @click="userPanelOpen = true">
                    {{-- Profile Photo --}}
                    <div class="w-8 h-8 rounded flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name={{ $user->first_name }}+{{ $user->last_name }}&background=5a67d8&color=fff" alt="" class="rounded-full">
                    </div>

                    {{-- Name --}}
                    <div class="w-full px-3 overflow-hidden leading-4">
                        <div class="font-semibold text-sm group-focus:text-gray-800">
                            {{ $user->fullName() }}
                        </div>
                        <div class="italic text-gray-500 group-focus:text-gray-600 text-xs truncate">
                            {{ $user->email }}
                        </div>
                    </div>
                    {{-- Dropdown icon --}}
                    <div class="">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </button>
                <div class="z-10 absolute right-0 left-0 mt-1 rounded-md shadow-lg" x-show="userPanelOpen" @click.away="userPanelOpen = false" style="display: none">
                    <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Notifications</a>
                        </div>
                        <div class="border-t border-gray-300"></div>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Tutorial</a>
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Support</a>
                        </div>
                        <div class="border-t border-gray-300"></div>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-red-500 hover:bg-gray-100 hover:text-red-600" role="menuitem">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Search --}}
            <div class="mt-4 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input id="email" class="input bg-gray-700 focus:bg-gray-100 focus:text-gray-700 border-gray-700 pl-10" placeholder="Search...">
            </div>

            {{-- Navigation --}}
            <nav class="mt-4">
                <div>
                    <a href="/dashboard" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-900 rounded-md bg-gray-100 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150" aria-current="page">
                        <span class="truncate">
                            Dashboard
                        </span>
                        <span class="ml-auto inline-block py-0.5 px-2 text-xs leading-4 rounded-full bg-red-300 transition ease-in-out duration-150">
                            5
                        </span>
                    </a>
                    <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                        <span class="truncate">
                            Dispatch
                        </span>
                    </a>
                    <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                        <span class="truncate">
                            Reports
                        </span>
                    </a>
                </div>
                <div class="mt-8">
                    <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider" id="projects-headline">
                        Support
                    </h3>
                    <div class="mt-1" role="group" aria-labelledby="projects-headline">
                        <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                            <span class="truncate">
                                Contact Support
                            </span>
                        </a>
                        <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                            <span class="truncate">
                                Documentation
                            </span>
                        </a>
                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                            <span class="truncate">
                                FAQ
                            </span>
                        </a>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    {{-- Main --}}
    <div class="flex-none lg:flex-auto  flex flex-col w-full overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button x-on:click="sidebar = !sidebar" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 lg:hidden" aria-label="Open sidebar">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                    <form class="w-full flex md:ml-0" action="#" method="GET">
                        <label for="search_field" class="sr-only">Search</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                                </svg>
                            </div>
                            <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
                        </div>
                    </form>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <button class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500" aria-label="Notifications">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <main class="flex-1 relative overflow-y-auto focus:outline-none max-w-screen-lg" tabindex="0" x-data="" x-init="$el.focus()">
            <div class="px-6 mt-6">
                <h1 class="text-2xl font-semibold">{{ $pageTitle }}</h1>
            </div>
            <div class="px-6 mt-6">
                <!-- Replace with your content -->
                @yield('dashboard-content')
                <!-- /End replace -->
            </div>
        </main>
    </div>
</div>

@endsection